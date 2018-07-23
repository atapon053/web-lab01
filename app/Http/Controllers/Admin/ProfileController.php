<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\ProfileRequest as StoreRequest;

class ProfileController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Profile");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/profile');
        $this->crud->setEntityNameStrings('profile', 'profile');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'label' => _i('User'),
            'type' => 'select',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "App\User",
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => _i('Name'),
        ]);
        $this->crud->addColumn([
            'name' => 'birthday',
            'label' => _i('Birthday'),
        ]);
        $this->crud->addColumn([
            'name' => 'age',
            'label' => _i('Age'),
        ]);
        $this->crud->addColumn([
            'name' => 'address',
            'label' => _i('Address')
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'label' => _i('User'),
            'type' => 'select2',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'name',
            'model' => "App\user",
        ]);

        $this->crud->addField([    // Image
            'name' => 'image',
            'label' => _i('Image'),
            'type' => 'browse',
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => _i('Name'),
            'type' => 'text',
            'hint' => _i('You full name'),
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([    // TEXT
            'name' => 'birthday',
            'label' => _i('Birthday'),
            'type' => 'date',
            'value' => date('Y-m-d'),
        ], 'create');
        $this->crud->addField([    // TEXT
            'name' => 'birthday',
            'label' => _i('Birthday'),
            'type' => 'date',
        ], 'update');

        $this->crud->addField([
            'name' => 'age',
            'label' => _i('Age'),
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'address',
            'label' => _i('Address'),
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'label' => _i('Special Interest'),
            'type' => 'ckeditor',
            'name' => 'special_interest',
        ]);

        $this->crud->enableAjaxTable();
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(StoreRequest $request)
    {
        return parent::updateCrud();
    }
}
