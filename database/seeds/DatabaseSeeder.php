<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
               // Role comes before User seeder here.
   	 $this->call(RoleTableSeeder::class);
   	 // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CityTableSeeder::class);
//         $this->call(UsersTableSeeder::class);    
        factory(App\Post::class,15)->create();
        // factory(App\Category::class,10)->create();
        factory(App\User::class,30)->create();
        factory(App\Message::class,100)->create();
 

    }
}
