<?php

use Illuminate\Database\Seeder;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scurentTime= date('Y-m-d H:i:s');
        DB::table('cats')->insert([
        	[
        		'id'=>1,
        		'name'=> 'Meo Ba Tu Long Dai',
        		'date_of_birth'=>date('Y-m-d'),
        		'breed_id'=>1,
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	],
        	[
        		'id'=>2,
        		'name'=> 'Meo Tam The Duoi Ngan',
        		'date_of_birth'=>date('Y-m-d'),
        		'breed_id'=>2,
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	],
        	[
        		'id'=>3,
        		'name'=> 'Meo Rung repal',
        		'date_of_birth'=>date('Y-m-d'),
        		'breed_id'=>3,
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	]
        ]);
    }
}
