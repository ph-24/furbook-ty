<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $scurentTime= date('Y-m-d H:i:s');
        DB::table('users')->insert([
        	[
        		'id'=>1,
        		'name'=> 'user',
        		'email'=>'user@gmail.com',
        		'password'=>bcrypt('123456'),
                'is_admin'=>false,
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	],
        	[
        		'id'=>2,
        		'name'=> 'admin',
        		'email'=>'admin@gmail.com',
        		'password'=>bcrypt('123456'),
                'is_admin'=>true,
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	],
        	[
        		'id'=>3,
        		'name'=> 'super.admin',
        		'email'=>'super.admin@gmail.com',
        		'password'=>bcrypt('123456'),
                'is_admin'=>true,
        		'created_at'=>$scurentTime,
        		'updated_at'=>$scurentTime
        	]
        ]);
    }
}
