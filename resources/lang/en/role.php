<?php

return [

    'index' => [
        'title' => 'Role',
    ],

    'create' => [
        'title' => 'Role Create',
    ],

    'edit' => [
        'title' => 'Role Edit',
    ],

    'delete' => [
        'title' => 'Delete',
    ],

    'breadcrumb' => [
        'index' => 'Role',
        'create' => 'Create',
        'edit' => 'Edit',
    ],

    'form'  => [
        'id' => 'ID',
        'name' => 'Name',
        'code' => 'Code',
        'permission' => 'Permission',
        'add-button' => 'Add New Role',
        'save-button' => 'Save',
        'edit-button' => 'Edit',
        'update-button' => 'Update',
        'delete-button' => 'Delete',
        'action' => 'Action',
        'edit'              => 'Edit',
        'delete'            => 'Delete',
        'delete-message' => 'Are you sure?',


        'validation'    => [
            'name' => [
                'required'  => 'The name field is required!',
                'unique'  => 'Name already exists!',
            ],
            'code' => [
                'required'  => 'The Code field is required!',
                'unique'  => 'Code already exists!',
            ],
            'permission' => [
                'required'  => 'Please select atleast one option!',
            ],

        ],

    ],

    'message' => [

        'store' => [
            'success' => 'Role added successfully!',
            'error' => 'There is an error! Please try later!',
        ],

        'update' => [
            'success' => 'Role updated successfully!',
            'error' => 'There is an error! Please try later!',
        ],

        'destroy' => [
            'success' => 'Role deleted successfully!',
            'error' => 'There is an error! Please try later!',
            'warning_last_role' => 'Last Role Can not be deleted!',
        ],
    ]

];