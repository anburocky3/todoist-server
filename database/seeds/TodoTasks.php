<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TodoTasks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('todos')->insert(array(
            array(
                'title' => 'Start cooking',
                'completed' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            array(
                'title' => 'Call Ben!',
                'completed' => false,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            )
        ));
    }
}
