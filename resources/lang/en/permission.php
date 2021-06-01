<?php

return [

    'index' => [
        'title' => 'Permission',
    ],

    'create' => [
        'title' => 'Permission Create',
    ],

    'edit' => [
        'title' => 'Permission Edit',
    ],

    'delete' => [
        'title' => 'Delete',
    ],

    'breadcrumb' => [
        'index' => 'Permission',
        'create' => 'Create',
        'edit' => 'Edit',
    ],

    'form'  => [
        'id' => 'ID',
        'name' => 'Name',
        'permission' => 'Permission',
        'add-button' => 'Add New Permission',
        'save-button' => 'Save',
        'edit-button' => 'Edit',
        'update-button' => 'Update',
        'delete-button' => 'Delete',
        'action' => 'Action',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'delete-message' => 'Are you sure?',


        'validation'    => [
            'name' => [
                'required'  => 'The name field is required!',
                'unique'  => 'Name already exists!',
            ],
            'permission' => [
                'required'  => 'Please select atleast one option!',
            ],

        ],
    ],

    'message' => [

        'store' => [
            'success' => 'Permission added successfully!',
            'error' => 'There is an error! Please try later!',
        ],

        'update' => [
            'success' => 'Permission updated successfully!',
            'error' => 'There is an error! Please try later!',
        ],

        'destroy' => [
            'success' => 'Permission deleted successfully!',
            'error' => 'There is an error! Please try later!',
            'warning_admin_delete' => 'Admin Can not be deleted!',
        ],
    ]

];