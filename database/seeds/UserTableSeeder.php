<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
       $role_employee = Role::where('name', 'employee')->first();
       $role_manager  = Role::where('name', 'admin')->first();
       $role_member = Role::where('name', 'member')->first();
       $role_memberVip = Role::where('name', 'memberVip')->first();


       $employee = new User();
       $employee->name = 'Employee';
       $employee->email = 'employee@example.com';
       $employee->password = bcrypt('123456');
       $employee->phone ='03865431232';
       $employee->address='183/32/6 Nguyễn Hữu Cảnh,p22,Q.Bình Thạnh';
       $employee->save();
       $employee->roles()->attach($role_employee);

       $member = new User();
       $member->name = 'Member';
       $member->email = 'member@example.com';
       $member->password = bcrypt('123456');
       $member->phone ='0382321232';
       $member->address='183/4 Nguyễn Hữu Cảnh,p22,Q.Bình Thạnh';
       $member->photo='avatar1.jpg';
       $member->save();
       $member->roles()->attach($role_member);

       $memberVip = new User();
       $memberVip->name = 'Member Vip ';
       $memberVip->email = 'membervip@example.com';
       $memberVip->password = bcrypt('123456');
       $memberVip->isVip='Vip';
       $memberVip->save();
       $memberVip->roles()->attach($role_memberVip);

       $memberVip = new User();
       $memberVip->name = 'Member2 Vip ';
       $memberVip->email = 'membervip2@example.com';
       $memberVip->password = bcrypt('123456');
       $memberVip->isVip='Vip';
       $memberVip->save();
       $memberVip->roles()->attach($role_memberVip);

       $manager = new User();
       $manager->name = 'Admin';
       $manager->email = 'admin@example.com';
       $manager->password = bcrypt('123456');
       $manager->save();
       $manager->roles()->attach($role_manager);
   }
}