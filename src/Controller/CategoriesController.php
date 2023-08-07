<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\CategoriesTable;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $categoriesTable = new CategoriesTable();
        $categories = $categoriesTable->find('all')
            ->toArray();

        $this->set('categories', $categories);
    }

    public function product($category_id)
    {
        $this->loadModel('Products');

        if ($this->request->is('ajax')) {
            $this->autoRender = false; // Disable rendering of view template

            // Implement database query to fetch product details for the given category_id
            $category = $this->Categories->get($category_id, ['contain' => ['Products']]);
            $products = $category->products;

            $this->response = $this->response->withType('application/json');
            $this->set(compact('category', 'products'));
            $this->viewBuilder()->setLayout('ajax');
            $this->render('/Element/ajax_response'); // Render JSON response using an Element (ajax_response.ctp)
        }
    }

    public function viewAllProducts($category_id)
    {
        $this->loadModel('Products');
        $this->loadModel('OtherProducts');

        $products = $this->Products->find()
            ->where(['category_id' => $category_id])
            ->all();

        $otherProducts = $this->OtherProducts->find()
            ->where(['category_id' => $category_id])
            ->all();

        $this->set(compact('products', 'otherProducts', 'category_id'));
    }

    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('category'));
    }

}