<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 *
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::addColumns([
            [
                'name' => 'code',
                'label' => 'Code',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
            ],
            [
                'name' => 'category_id',
                'label' => 'Category',
                'type' => 'select_from_array',
                'options' => Category::pluck('name', 'id'),
            ],
            [
                'name' => 'supplier_id',
                'label' => 'Supplier',
                'type' => 'select_from_array',
                'attribute' => 'name',
                'options' => Supplier::pluck('name', 'id'),
            ],
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ProductRequest::class);
        CRUD::addFields([
            [
                'name' => 'code',
                'label' => 'Code',
                'type' => 'text',
            ],
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
            ],
            [
                'name' => 'category_id',
                'label' => "Category",
                'type' => 'select_from_array',
                'options' => Category::select('name', 'id')->pluck('name', 'id')->toArray(),
                'allows_null' => true,
            ],
            [
                'name' => 'supplier_id',
                'label' => "Supplier",
                'type' => 'select_from_array',
                'options' => Supplier::select('name', 'id')->pluck('name', 'id')->toArray(),
                'allows_null' => true,
            ]
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

}
