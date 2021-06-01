<?php

return [

    'index' => [
        'title' => 'User Management',
    ],

    'create' => [
        'title' => 'User Create',
    ],

    'edit' => [
        'title' => 'User Edit',
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
        'officer_id'        => 'Officer ID',
        'image'             => 'Image',
        'upload_image'      => 'Upload Image',
        'change_image'      => 'Change Image',
        'name'              => 'Name',
        'email'             => 'Email',
        'password'          => 'Password',
        'mobile'            => 'Mobile',
        'division'          => 'Division',
        'district'          => 'District',
        'sub_district'      => 'Upazila',
        'address'           => 'Address',
        'password-confirm'  => 'Confirm Password',
        'role'              => 'Role',
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
            'password' => [
                'required'  => 'The password field is required!',
                'same'      => 'The password and confirm-password must match.',
            ],
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
            'mobile' => [
                'required'  => 'The mobile field is required!',
            ],
            'district' => [
                'required'  => 'The district field is required!',
            ],
            'sub_district' => [
                'required'  => 'The sub_district field is required!',
            ],
            'address' => [
                'required'  => 'The address field is required!',
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
            'success'   => 'User added successfully!',
            'error'     => 'There is an error! Please try later!',
        ],

        'update' => [
            'success'   => 'User updated successfully!',
            'error'     => 'There is an error! Please try later!',
        ],

        'destroy' => [
            'success'   => 'User deleted successfully!',
            'error'     => 'There is an error! Please try later!',
            'warning_last_user' => 'Last user can not be deleted!',
        ],
    ]

];