<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
    $role_manager = new Role();
    $role_manager->name = 'admin';
    $role_manager->description = 'A Admin User';
    $role_manager->save();

       $role_employee = new Role();
       $role_employee->name = 'employee';
       $role_employee->description = 'A Employee User';
       $role_employee->save();

       $role_member = new Role();
       $role_member->name = 'member';
       $role_member->description = 'A Member User';
       $role_member->save();

       $role_memberVip = new Role();
       $role_memberVip->name = 'memberVip';
       $role_memberVip->description = 'A Member Vip User';
       $role_memberVip->save();
       

    
   }
}