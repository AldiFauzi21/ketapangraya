<?php
	session_start();
	include '../plt/config.php';
	require '../plt/functions.php';
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$_SESSION['username']=$email;
		$sqluser=mysqli_query($conn,"SELECT * from admin where username='$email' and kata_sandi='$password'");
		if (($email!="")&&($password!="")&&isset($password)&&isset($email)){
			if(mysqli_num_rows($sqluser)>0){
				header("location:desa.php?masuk=berhasil");
			}
			else{
				$_SESSION['status']="";
				header("location:Login.php?pesan=gagal");
			}
		}else{
			header("location:Login.php");
		}

	}
?>