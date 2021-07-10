<?php

return [

    'index' => [
        'title' => 'Doctor Management',
    ],

    'create' => [
        'title' => 'Doctor Create',
    ],

    'edit' => [
        'title' => 'Doctor Edit',
    ],

    'delete' => [
        'title' => 'Delete',
    ],

    'profile' => [
        'title' => 'Profile',
    ],

    'breadcrumb' => [
        'index' => 'User',
        'create' => 'Create',
        'edit' => 'Edit',
    ],


    'form'  => [
        'id'                => 'ID',
        'image'             => 'Image',
        'upload_image'      => 'Upload Image',
        'change_image'      => 'Change Image',
        'name'              => 'Name',
        'email'             => 'Email',
        'description'       => 'Description',
        'role'              => 'Role',
        'department'        => 'Department',
        'role-current'      => 'Current Role',
        'add-button'        => 'Add New User',
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
            'email' => [
                'required'  => 'The email field is required!',
                'email'     => 'Please your email format!',
                'unique'    => 'Email already exists!',
            ],
            'roles' => [
                'required'  => 'The roles field is required!',
            ],
            'description' => [
                'required'  => 'The description field is required!',
            ],
            'image' => [
                'required'  => 'The image field is required!',
                'image'     => 'The uploaded file must be an image!',
                'mimes'     => 'Only jpeg,png,jpg formats are supported!',
                'max'       => 'File size must not be more than 10M!',
            ],
        ],
    ],

    'message' => [
        'profile' => [
            'success'   => 'Profile updated successfully',
            'error'     => 'There is an error!',
        ],

        'store' => [
            'success'   => 'Doctor added successfully!',
            'error'     => 'There is an error! Please try later!',
        ],

        'update' => [
            'success'   => 'Doctor updated successfully!',
            'error'     => 'There is an error! Please try later!',
        ],

        'destroy' => [
            'success'   => 'Doctor deleted successfully!',
            'error'     => 'There is an error! Please try later!',
            'warning_last_user' => 'Last user can not be deleted!',
        ],
    ]

];