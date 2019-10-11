<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductForms Controller
 *
 * @property \App\Model\Table\ProductFormsTable $ProductForms
 *
 * @method \App\Model\Entity\ProductForm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductFormsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $productForms = $this->paginate($this->ProductForms);

        $this->set(compact('productForms'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Form id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productForm = $this->ProductForms->get($id, [
            'contain' => ['ProductFormFields', 'Products']
        ]);

        $this->set('productForm', $productForm);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productForm = $this->ProductForms->newEntity();
        if ($this->request->is('post')) {
            $productForm = $this->ProductForms->patchEntity($productForm, $this->request->getData());
            if ($this->ProductForms->save($productForm)) {
                $this->Flash->success(__('The product form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product form could not be saved. Please, try again.'));
        }
        $this->set(compact('productForm'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Form id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productForm = $this->ProductForms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productForm = $this->ProductForms->patchEntity($productForm, $this->request->getData());
            if ($this->ProductForms->save($productForm)) {
                $this->Flash->success(__('The product form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product form could not be saved. Please, try again.'));
        }
        $this->set(compact('productForm'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productForm = $this->ProductForms->get($id);
        if ($this->ProductForms->delete($productForm)) {
            $this->Flash->success(__('The product form has been deleted.'));
        } else {
            $this->Flash->error(__('The product form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
