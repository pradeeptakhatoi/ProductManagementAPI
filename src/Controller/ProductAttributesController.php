<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductAttributes Controller
 *
 * @property \App\Model\Table\ProductAttributesTable $ProductAttributes
 *
 * @method \App\Model\Entity\ProductAttribute[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductAttributesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'ProductFormFields']
        ];
        $productAttributes = $this->paginate($this->ProductAttributes);

        $this->set(compact('productAttributes'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Attribute id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productAttribute = $this->ProductAttributes->get($id, [
            'contain' => ['Products', 'ProductFormFields']
        ]);

        $this->set('productAttribute', $productAttribute);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productAttribute = $this->ProductAttributes->newEntity();
        if ($this->request->is('post')) {
            $productAttribute = $this->ProductAttributes->patchEntity($productAttribute, $this->request->getData());
            if ($this->ProductAttributes->save($productAttribute)) {
                $this->Flash->success(__('The product attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product attribute could not be saved. Please, try again.'));
        }
        $products = $this->ProductAttributes->Products->find('list', ['limit' => 200]);
        $productFormFields = $this->ProductAttributes->ProductFormFields->find('list', ['limit' => 200]);
        $this->set(compact('productAttribute', 'products', 'productFormFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Attribute id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productAttribute = $this->ProductAttributes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productAttribute = $this->ProductAttributes->patchEntity($productAttribute, $this->request->getData());
            if ($this->ProductAttributes->save($productAttribute)) {
                $this->Flash->success(__('The product attribute has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product attribute could not be saved. Please, try again.'));
        }
        $products = $this->ProductAttributes->Products->find('list', ['limit' => 200]);
        $productFormFields = $this->ProductAttributes->ProductFormFields->find('list', ['limit' => 200]);
        $this->set(compact('productAttribute', 'products', 'productFormFields'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Attribute id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productAttribute = $this->ProductAttributes->get($id);
        if ($this->ProductAttributes->delete($productAttribute)) {
            $this->Flash->success(__('The product attribute has been deleted.'));
        } else {
            $this->Flash->error(__('The product attribute could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
