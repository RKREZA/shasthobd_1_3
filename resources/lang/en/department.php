<?php

return [

    'index' => [
        'title' => 'Department Management',
    ],

    'create' => [
        'title' => 'Department Create',
    ],

    'edit' => [
        'title' => 'Department Edit',
    ],

    'delete' => [
        'title' => 'Delete',
    ],

    'profile' => [
        'title' => 'Profile',
    ],

    'breadcrumb' => [
        'index' => 'Department',
        'create' => 'Create',
        'edit' => 'Edit',
    ],


    'form'  => [
        'id'                => 'ID',
        'code'              => 'Code',
        'upload_image'      => 'Upload Image',
        'change_image'      => 'Change Image',
        'name'              => 'Name',
        'code'              => 'Code',
        'email'             => 'Email',
        'description'       => 'Description',
        'role'              => 'Role',
        'role-current'      => 'Current Role',
        'add-button'        => 'Add New Department',
        'save-button'       => 'Save',
        'edit-button'       => 'Edit',
        'update-button'     => 'Update',
        'delete-button'     => 'Delete',
        'user-since'        => 'User Since',
        'last-update'       => 'Last Update',
        'action'            => 'Action',
        'edit'              => 'Edit',
        'delete'            => 'Delete',
        'delete-message'    => 'Are you sure?',

        'validation'    => [
            'name' => [
                'required'  => 'The name field is required!',
            ],
            'code' => [
                'required'  => 'The code field is required!',
                'unique'    => 'Code already exists!',
            ],
            'description' => [
                'required'  => 'The description field is required!',
            ],
        ],
    ],

    'message' => [
        'profile' => [
            'success'   => 'Profile updated successfully',
            'error'     => 'There is an error!',
        ],

        'store' => [
            'success'   => 'Department added successfully!',
            'error'     => 'There is an error! Please try later!',
        ],

        'update' => [
            'success'   => 'Department updated successfully!',
            'error'     => 'There is an error! Please try later!',
        ],

        'destroy' => [
            'success'   => 'Department deleted successfully!',
            'error'     => 'There is an error! Please try later!',
            'warning_last_user' => 'Last user can not be deleted!',
        ],
    ]

];