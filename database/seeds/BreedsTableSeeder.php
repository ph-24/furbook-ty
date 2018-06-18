<?php

use Illuminate\Database\Seeder;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$scurentTime= date('Y-m-d H:i:s');
        DB::table('breeds')->insert([
        	[
        		'id'=>1,
        		'name'=> 'Meo Ba Tu',
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	],
        	[
        		'id'=>2,
        		'name'=> 'Meo Tam The',
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	],
        	[
        		'id'=>3,
        		'name'=> 'Meo Rung',
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	]
        ]);
    }
}
