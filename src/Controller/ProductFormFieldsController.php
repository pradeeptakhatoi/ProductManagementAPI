<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductFormFields Controller
 *
 * @property \App\Model\Table\ProductFormFieldsTable $ProductFormFields
 *
 * @method \App\Model\Entity\ProductFormField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductFormFieldsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductForms']
        ];
        $productFormFields = $this->paginate($this->ProductFormFields);

        $this->set(compact('productFormFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Form Field id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productFormField = $this->ProductFormFields->get($id, [
            'contain' => ['ProductForms', 'ProductAttributes', 'ProductFormFieldValues']
        ]);

        $this->set('productFormField', $productFormField);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productFormField = $this->ProductFormFields->newEntity();
        if ($this->request->is('post')) {
            $productFormField = $this->ProductFormFields->patchEntity($productFormField, $this->request->getData());
            if ($this->ProductFormFields->save($productFormField)) {
                $this->Flash->success(__('The product form field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product form field could not be saved. Please, try again.'));
        }
        $productForms = $this->ProductFormFields->ProductForms->find('list', ['limit' => 200]);
        $this->set(compact('productFormField', 'productForms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Form Field id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productFormField = $this->ProductFormFields->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productFormField = $this->ProductFormFields->patchEntity($productFormField, $this->request->getData());
            if ($this->ProductFormFields->save($productFormField)) {
                $this->Flash->success(__('The product form field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product form field could not be saved. Please, try again.'));
        }
        $productForms = $this->ProductFormFields->ProductForms->find('list', ['limit' => 200]);
        $this->set(compact('productFormField', 'productForms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Form Field id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productFormField = $this->ProductFormFields->get($id);
        if ($this->ProductFormFields->delete($productFormField)) {
            $this->Flash->success(__('The product form field has been deleted.'));
        } else {
            $this->Flash->error(__('The product form field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
