<?php
use Illuminate\Support\Facades\Input;
// Route::get('/', function () {
// 	//C1: return view('cats/show')->with('number',10);
// 	//C2: $number=10;   	return view('cats/show',compact('number'));
//     //C3: return view('cats/show', array('number'=>10));
//     	return redirect('cats');
// });

// // Display cats
// Route::get('/cats', function () {
	
// });

// // Display breeds


// Display info cat

//Theo ten
// Route::get('/cats/{cat}', function (Furbook\Cat $cat) {
// 	return view('cats.show')->with('cat',$cat);
// })->where('id','[0-9]+');


Route::group(['middleware'=>'auth'],function (){
	Route::resource('cats','CatController');

	Route::get('/cats/breeds/{name}', function ($name) {
    	$breed=Furbook\Breed::with('cats')
    		->where('name',$name)
    		->first();
    		return view('cats.index')
    			->with('breed',$breed)
    			->with('cats',$breed->cats);
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
