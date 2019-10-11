<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller {

    public $user_id = 0, $user_type = 0, $company_id = 0;
    public $controller;
    public $action;

    public function initialize() {

        parent::initialize();
        
        // Load Auth Component
        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authenticate' => [
                'Form' => [
                    'scope' => ['Users.is_active' => 1],
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password',
                    ]                    
                ],
                'ADmad/JwtAuth.Jwt' => [
                    'parameter' => 'token',
                    'userModel' => 'Users',
                    'scope' => ['Users.is_active' => 1],
                    'fields' => [
                        'username' => 'id'
                    ],
                    'queryDatasource' => true
                ]
            ],
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize'
        ]);
               
 
        // Load Models        
        $this->loadModel('Users');

        // Initialize controller property
        $this->controller = $this->request->params['controller'];
        $this->action = $this->request->params['action'];

        // Assign frequently accessed session variables to class property for quick access.  
        if ($this->Auth->user('id')) {
            $this->user_id = $this->Auth->user('id');
            $this->unique_id = $this->Auth->user('unique_id');
            $this->user_type = $this->Auth->user('user_type');
        }
        
        // Set Layout
        $this->viewBuilder()->setLayout('ajax');
    }

    public function beforeRender(Event $event) {

        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event) {
        // Send json header if action url end with .json 
        // Ex: https://apps.syrreo.com/employees/listEmployee.json
        if ($this->request->params['_ext'] == 'json') {
            $this->viewBuilder()->setLayout('ajax');
            header('Content-type: application/json');
        }
    }

    public function allowUsers($userTypes = ['admin']) {
        if (in_array($this->Auth->user('user_type'), $userTypes)) {
            return true;
        }
        sendResponse(UNAUTHORIZED_RESPONSE_CODE, "Unauthorized Access!!");
    }

}
