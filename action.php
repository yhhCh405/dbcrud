<?php
include('yhh-oop-lib.php');

$dbop = new DatabaseOperation;


	if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
		if($dbop->isDataExist('auth_sys','username|password',$_POST['username'].'|'.$_POST['password'],2)){
			session_start();
			$_SESSION['sessid'] = $dbop->select('auth_sys','username',$_POST['username'],1,'id');
			$_SESSION['pp'] = $dbop->select('auth_sys','username',$_POST['username'],1,'pp');
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['phone'] = $dbop->select('auth_sys','username',$_POST['username'],1,'phone');
			$_SESSION['email'] = $dbop->select('auth_sys','username',$_POST['username'],1,'email');
			$_SESSION['age'] = $dbop->select('auth_sys','username',$_POST['username'],1,'age');
			$_SESSION['address'] = $dbop->select('auth_sys','username',$_POST['username'],1,'address');

			echo "<script>location.replace('home.php');</script>";

		}else{
			echo "<script>$('#login-warning').text('Invalid username or password!').attr('class','alert alert-danger');$('#login-warning').show(150);</script>";
		}
	}

	if (isset($_POST['signup']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['country']) && isset($_POST['age']) && isset($_POST['address']) && isset($_POST['pp_name'])) {


		if($dbop->insertData('auth_sys','username|password|phone|email|pp|country|age|address',$_POST['username'].'|'.$_POST['password'].'|'.$_POST['phone'].'|'.$_POST['email'].'|'.$_POST['pp_name'].'|'.$_POST['country'].'|'.$_POST['age'].'|'.$_POST['address'],8)){
			echo true;
		}
	}



	if (isset($_POST['username']) && isset($_POST['checkuname'])) {
		if ($dbop->isDataExist("auth_sys","username",$_POST['username'],1)) {
			echo true;
		}
	}

	

?>