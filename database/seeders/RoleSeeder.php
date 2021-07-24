<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_role = [
            [
                'name'       => 'Administrator',
                'guard_name' => 'web',
                'created_at' => \Carbon\Carbon::now(),
            ]
        ];
		$role = Role::insert(
			$data_role
		);

        $role_first = Role::first();

        $permissions = [
    		[
                'name'       => 'dashboard',
                'guard_name' => 'web',
                'action'     => ['view'],
            ],
            [
                'name'       => 'setting',
                'guard_name' => 'web',
                'action'     => ['view', 'add', 'edit', 'delete'],
            ],
    		[
                'name'       => 'role',
                'guard_name' => 'web',
                'action'     => ['view', 'add', 'edit', 'delete'],
            ],
            [
                'name'       => 'user',
                'guard_name' => 'web',
                'action'     => ['view', 'add', 'edit', 'delete'],
            ],
            [
                'name'       => 'kelas',
                'guard_name' => 'web',
                'action'     => ['view', 'add', 'edit', 'delete'],
            ],
            [
                'name'       => 'guru',
                'guard_name' => 'web',
                'action'     => ['view', 'add', 'edit', 'delete'],
            ],
            [
                'name'       => 'mapel',
                'guard_name' => 'web',
                'action'     => ['view', 'add', 'edit', 'delete'],
            ],
            [
                'name'       => 'jadwal',
                'guard_name' => 'web',
                'action'     => ['view', 'add', 'edit', 'delete'],
            ]
        ];

        foreach ($permissions as $row) {
            foreach ($row['action'] as $key => $val) {
                $temp = [
                    'name'       => $row['name'].'-'.$val,
                    'guard_name' => $row['guard_name']
    			];	
    			// create permission and assign to role
    			$perms = Permission::create($temp);
    			$role_first->givePermissionTo($perms);
    		}
    	}
    }
}
