<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
        $SuperAdmin = Role::create(['name' => 'SuperAdmin']);
        $Admin = Role::create(['name' => 'Admin']);
        $Customer = Role::create(['name' => 'Customer']);
        $Resller = Role::create(['name' => 'Reseller']);
        $User = Role::create(['name' => 'User']);


        //PERMISSIONS
        //user_permissions
        $CreateUser = Permission::create(['name' => 'CreateUser']);
        $UpdateUser = Permission::create(['name' => 'UpdateUser']);
        $DeleteUser = Permission::create(['name' => 'DeleteUser']);

        //product_permissions
        $CreateProduct = Permission::create(['name' => 'CreateProduct']);
        $UpdateProduct = Permission::create(['name' => 'UpdateProduct']);
        $DeleteProduct = Permission::create(['name' => 'DeleteProduct']);

        //order_permissions
        $CreateOrder = Permission::create(['name' => 'CreateOrder']);
        $UpdateOrder = Permission::create(['name' => 'UpdateOrder']);
        $DeleteOrder = Permission::create(['name' => 'DeleteOrder']);

        //factor_permissions
        $CreateFactor = Permission::create(['name' => 'CreateFactor']);
        $UpdateFactor = Permission::create(['name' => 'UpdateFactor']);
        $DeleteFactor = Permission::create(['name' => 'DeleteFactor']);

        //label_permissions
        $CreateLabel = Permission::create(['name' => 'CreateLabel']);
        $UpdateLabel = Permission::create(['name' => 'UpdateLabel']);
        $DeleteLabel = Permission::create(['name' => 'DeleteLabel']);

        //team_permissions
        $CreateTeam = Permission::create(['name' => 'CreateTeam']);
        $UpdateTeam = Permission::create(['name' => 'UpdateTeam']);
        $DeleteTeam = Permission::create(['name' => 'DeleteTeam']);

        //task_permissions
        $CreateTask = Permission::create(['name' => 'CreateTask']);
        $UpdateTask = Permission::create(['name' => 'UpdateTask']);
        $DeleteTask = Permission::create(['name' => 'DeleteTask']);

        //warranty_permissions
        $CreateWarranty = Permission::create(['name' => 'CreateWarranty']);
        $UpdateWarranty = Permission::create(['name' => 'UpdateWarranty']);
        $DeleteWarranty = Permission::create(['name' => 'DeleteWarranty']);

        //note_permissions
        $CreateNote = Permission::create(['name' => 'CreateNote']);
        $UpdateNote = Permission::create(['name' => 'UpdateNote']);
        $DeleteNote = Permission::create(['name' => 'DeleteNote']);




        $SuperAdmin->givePermissionTo()->all();
        $Admin->givePermissionTo()->all();
        $User->givePermissionTo();
        $Customer->givePermissionTo();
    }
}
