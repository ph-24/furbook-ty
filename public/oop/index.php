<?php 
	include 'a1.php';
	include 'a2.php';
	use OOP\A2 as A2;//khai bao namespace -> A1
	
	$ob=new A2();
	$ob->getName();
	// //anymousfuncion
	// function getanymousFuncion($funcionName){
	// 	return  $funcionName();
	// }
	// getanymousFuncion(function (){
	// 	echo 'this is anonymous funcion';
	// });
	// $name='PHP';
	// $anonymousFuncion= funcion() use ($name){
	// 	echo 'this is eninymous function'.$name;
	// };
	?>