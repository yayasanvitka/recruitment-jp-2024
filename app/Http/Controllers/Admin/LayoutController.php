<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\Widget;

class LayoutController extends CrudController
{
    // Class ini untuk melakukan setup yang bersifat global.
    public function setup()
    {
        Widget::add([
            'type' => 'view',
            'view' => 'head',
        ]);
    }
}
