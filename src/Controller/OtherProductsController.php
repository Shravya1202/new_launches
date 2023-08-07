<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OtherProducts Controller
 *
 * @property \App\Model\Table\OtherProductsTable $OtherProducts
 * @method \App\Model\Entity\OtherProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OtherProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $otherProducts = $this->paginate($this->OtherProducts);

        $this->set(compact('otherProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Other Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $otherProduct = $this->OtherProducts->get($id, [
            'contain' => ['Stores'] // Include the associated stores data
        ]);

        $this->set(compact('otherProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $otherProduct = $this->OtherProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $otherProduct = $this->OtherProducts->patchEntity($otherProduct, $this->request->getData());
            if ($this->OtherProducts->save($otherProduct)) {
                $this->Flash->success(__('The other product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The other product could not be saved. Please, try again.'));
        }
        $categories = $this->OtherProducts->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('otherProduct', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Other Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $otherProduct = $this->OtherProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $otherProduct = $this->OtherProducts->patchEntity($otherProduct, $this->request->getData());
            if ($this->OtherProducts->save($otherProduct)) {
                $this->Flash->success(__('The other product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The other product could not be saved. Please, try again.'));
        }
        $categories = $this->OtherProducts->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('otherProduct', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Other Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $otherProduct = $this->OtherProducts->get($id);
        if ($this->OtherProducts->delete($otherProduct)) {
            $this->Flash->success(__('The other product has been deleted.'));
        } else {
            $this->Flash->error(__('The other product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}