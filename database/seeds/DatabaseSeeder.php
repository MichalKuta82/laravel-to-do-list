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
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	DB::table('users')->truncate();
    	DB::table('projects')->truncate();
    	DB::table('tasks')->truncate();

    	//factory(App\User::class, 10)->create()->each(function($user){
    	//	$user->projects()->save(factory(App\Project::class))->make();
    	//});
    	factory(App\User::class, 10)->create();
    	factory(App\Project::class, 10)->create();
    	factory(App\Task::class, 10)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
