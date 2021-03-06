<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
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
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'spot-list',
           'spot-create',
           'spot-edit',
           'spot-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'spot_type-list',
           'spot_type-create',
           'spot_type-edit',
           'spot_type-delete',
           'permission-list',
           'permission-create',
           'permission-edit',
           'permission-delete',
           'message-list',
           'message-create',
           'message-edit',
           'message-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}