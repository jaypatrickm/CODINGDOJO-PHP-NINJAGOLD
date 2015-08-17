<?php
session_start();
//Current Gold and Earned Gold are never really different
//we can save space and reduce code by using one variable instead of separate.

if (!empty($_SESSION)){
	var_dump($_SESSION);
} else if (empty($_SESSION)) {
	$gold = 0;
	$_SESSION['current_gold'] = $gold;
	$_SESSION['log'] = '<li>A wild ninja appears...</li>';
	var_dump($_SESSION);
}

if (isset($_SESSION['earned_gold'])) {
	$currentGold = $_SESSION['current_gold'];
	$earnedGold = $_SESSION['earned_gold'];
	echo $currentGold . ' ' . $earnedGold;
	$gold = ($currentGold + $earnedGold);
	$_SESSION['current_gold'] = $gold; 
} else {
	$gold = 0;
	$_SESSION['current_gold'] = $gold;
	$_SESSION['log'] = '<li>A wild ninja appears...</li>';
}

if (isset($_SESSION['action'])){
	$_SESSION['log'] = $_SESSION['action'] . $_SESSION['log'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ninja GOLD!!</title>
	<style>
		form {
			width: 350px;
			height: 350px;
			border: 1px solid red;
			display: inline-block;
		}
		form#start-over {
			width: 70px;
			height: 18px;
			display: block;
		}
		ul {
			height: 128px;
			overflow: scroll;
			list-style-type: none;
			border: 1px solid red;
			width: 1378px;
		}
		ul li {
			color: green;
		}
		ul li.red {
			color: red;
		}
	</style>
</head>
<body>
	<h2>Your Gold : 
		<?= $_SESSION['current_gold']?>
	</h2>
	<form action="process.php" method="post">
		<input type="hidden" name="farm" value="farm">
		<h3>Farm</h3>
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="process.php" method="post">
		<input type="hidden" name="cave" value="cave">
		<h3>Cave</h3>
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="process.php" method="post">
		<input type="hidden" name="house" value="house">
		<h3>House</h3>
		<input type="submit" value="Find Gold!"/>
	</form>
	<form action="process.php" method="post">
		<input type="hidden" name="casino" value="casino">
		<h3>Casino</h3>
		<input type="submit" value="Find Gold!"/>
	</form>
	<ul>
		<?php
			if (isset($_SESSION['log']) && !empty($_SESSION['log']))
			{
				echo $_SESSION['log']; 	
			} 
		?>
	</ul>
	<form id="start-over" action="process.php" method="post">
		<input type="hidden" name="unset" value="unset">
		<input type="submit" value="start over!"/>
	</form>
</body>
</html>