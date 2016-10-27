<?php

use Illuminate\Database\Seeder;

class TasklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tasklist::class, 3)->create();
    }
}
