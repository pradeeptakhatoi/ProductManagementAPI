<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductFormFieldValues Controller
 *
 * @property \App\Model\Table\ProductFormFieldValuesTable $ProductFormFieldValues
 *
 * @method \App\Model\Entity\ProductFormFieldValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductFormFieldValuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductFormFields']
        ];
        $productFormFieldValues = $this->paginate($this->ProductFormFieldValues);

        $this->set(compact('productFormFieldValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Form Field Value id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productFormFieldValue = $this->ProductFormFieldValues->get($id, [
            'contain' => ['ProductFormFields']
        ]);

        $this->set('productFormFieldValue', $productFormFieldValue);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productFormFieldValue = $this->ProductFormFieldValues->newEntity();
        if ($this->request->is('post')) {
            $productFormFieldValue = $this->ProductFormFieldValues->patchEntity($productFormFieldValue, $this->request->getData());
            if ($this->ProductFormFieldValues->save($productFormFieldValue)) {
                $this->Flash->success(__('The product form field value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product form field value could not be saved. Please, try again.'));
        }
        $productFormFields = $this->ProductFormFieldValues->ProductFormFields->find('list', ['limit' => 200]);
        $this->set(compact('productFormFieldValue', 'productFormFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Form Field Value id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productFormFieldValue = $this->ProductFormFieldValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productFormFieldValue = $this->ProductFormFieldValues->patchEntity($productFormFieldValue, $this->request->getData());
            if ($this->ProductFormFieldValues->save($productFormFieldValue)) {
                $this->Flash->success(__('The product form field value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product form field value could not be saved. Please, try again.'));
        }
        $productFormFields = $this->ProductFormFieldValues->ProductFormFields->find('list', ['limit' => 200]);
        $this->set(compact('productFormFieldValue', 'productFormFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Form Field Value id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productFormFieldValue = $this->ProductFormFieldValues->get($id);
        if ($this->ProductFormFieldValues->delete($productFormFieldValue)) {
            $this->Flash->success(__('The product form field value has been deleted.'));
        } else {
            $this->Flash->error(__('The product form field value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
