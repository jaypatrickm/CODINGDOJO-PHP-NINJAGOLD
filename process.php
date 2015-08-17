<?php
session_start();
//fix casino numbers
date_default_timezone_set('America/Los_Angeles');
//var_dump($_SESSION);
if(isset($_POST['unset']) && $_POST['unset'] == "unset"){ 
	session_destroy();
	$_SESSION = array();
	header('location: index.php');
}
if(isset($_POST['farm']) && $_POST['farm'] == "farm"){ 
	$_SESSION['earned_gold'] = floor(rand(10,20));
	//var_dump($_SESSION);
	$action = '<li>You entered a farm and earned ' . $_SESSION['earned_gold'] . ' gold(s). (' . date('F jS Y g:ia') . ')</li>';
	$_SESSION['action'] = $action;
	header('location: index.php');
}
if(isset($_POST['cave']) && $_POST['cave'] == "cave"){ 
	$_SESSION['earned_gold'] = floor(rand(5,10));
	//var_dump($_SESSION);
	$action = '<li>You entered a cave and earned ' . $_SESSION['earned_gold'] . ' gold(s). (' . date('F jS Y g:ia') . ')</li>';
	$_SESSION['action'] = $action;
	header('location: index.php');
}
if(isset($_POST['house']) && $_POST['house'] == "house"){ 
	$_SESSION['earned_gold'] = floor(rand(2,5));
	//var_dump($_SESSION);
	$action = '<li>You entered a house and earned ' . $_SESSION['earned_gold'] . ' gold(s). (' . date('F jS Y g:ia') . ')</li>';
	$_SESSION['action'] = $action;
	header('location: index.php');
}
if(isset($_POST['casino']) && $_POST['casino'] == "casino"){ 
	$luck = floor(rand(1,10));
	if ($luck == 1 || $luck == 2  || $luck == 3 || $luck == 4  || $luck == 5 || $luck == 6 || $luck == 7 ){
		$_SESSION['earned_gold'] = floor(rand(0,50)) * -1;
		//var_dump($_SESSION);
		$action = '<li class="red">You entered a casino and lossed ' . $_SESSION['earned_gold'] . ' gold(s). OUCH! (' . date('F jS Y g:ia') . ')</li>';
		$_SESSION['action'] = $action;
		header('location: index.php');
	} else {
		$_SESSION['earned_gold'] = floor(rand(25,50));
		//var_dump($_SESSION);
		$action = '<li>You entered a casino and earned ' . $_SESSION['earned_gold'] . ' gold(s). (' . date('F jS Y g:ia') . ')</li>';
		$_SESSION['action'] = $action;
		header('location: index.php');
	}
}

?>