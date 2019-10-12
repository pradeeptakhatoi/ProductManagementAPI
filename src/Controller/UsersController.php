<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function initialize() {
        parent::initialize();

        // Load Models   
        $this->loadModel('Users');
  
        // Public Actions.   
        $this->Auth->allow(['login', 'logout']);
    }

    public function login() {
        $responseCode = FAILURE_RESPONSE_CODE;
        $responseData = [];

        if ($this->request->is('post')) {

            $data = $this->request->input('json_decode', true);
            $password = trim($data['password']);
            $email = trim($data['email']);
            $user = $this->Users->find()->where(['email' => $email])->first();

            if (empty($user) || (md5($password) != $user->password)) {
                //throw new UnauthorizedException('Invalid email or password');
                failureResponse("Invalid Login Credentails!");
            }

            $responseCode = SUCCESS_RESPONSE_CODE;
            $token = JWT::encode([
                        'sub' => $user['id'],
                        'exp' => time() + 3600 * 2, // 2 hours
                        'role' => $user['user_type']
                            ], Security::salt());

            $responseData = [
                'id' => $user['id'],
                'name' => $user['name'],                
                'email' => $user['email'],
                'role' => $user['role'],
                'token' => $token
            ];
        }
        sendResponse($responseCode, $responseData);
    } 

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $res = array();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                // Remove flash and redirections
                $res['status'] = 1;
                $res['msg'] = 'The user has been saved.';
            } else {
                $res['status'] = 0;
                $res['msg'] = 'The user could not be saved. Please, try again.';
            }
        }
        $this->set(compact('res'));
        $this->set('_serialize', ['res']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $res = array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $res['status'] = 1;
                $res['msg'] = 'User updated successfully';
            } else {
                $res['status'] = 0;
                $res['msg'] = 'The user could not be saved. Please, try again.';
            }
        }
        $this->set(compact('res'));
        $this->set('_serialize', ['res']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $res = array();
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $res['status'] = 1;
            $res['msg'] = 'The user has been deleted.';
        } else {
            $res['status'] = 0;
            $res['msg'] = 'The user could not be deleted. Please, try again.';
        }

        $this->set(compact('res'));
        $this->set('_serialize', ['res']);
    }
}
