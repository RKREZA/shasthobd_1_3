<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
			'user-list',
			'user-create',
			'user-edit',
			'user-delete',

			'profile-index',
			'profile-update',

			'role-list',
			'role-create',
			'role-edit',
			'role-delete',

			'permission-list',
			'permission-create',
			'permission-edit',
			'permission-delete',

			
			'file-manager',
			'log-list',
			'user-activity-list',
		];
		
		foreach ($permissions as $permission) {
			Permission::create(['name' => $permission]);
		}
    }
}