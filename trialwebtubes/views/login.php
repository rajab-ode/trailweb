<?php 

	require_once '../controler/config.php';
	global $koneksi;

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$result = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' ");
		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			if(password_verify($password, $row['password'])){
				$_SESSION['login'] = true;
				header('Location: content.php');
				exit;
			} else {
			echo "<script>
		            alert('Email atau Password Salah');
		            document.location.href = 'login.php'
		          </script>";
			}
		} 

		if (empty($email) && empty($password)) {
	      header("Location: login.php?email=ds&password=sd");
	    }else if (empty($email)) {
	      header("Location: login.php?email=");
	    }else if(empty($password)){
	      header("Location: login.php?password=");
	    }
	}
	if( isset($_SESSION['login']) ) {
	  header("location:javascript://history.go(-1)");
	  exit;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">
		body{
			background: #D1D8EC
		}
		.login{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
		}
		form{

		}
		input{
			height: 50px !important;
			border-radius: 10px !important;

		}
		label{
			margin-top: -10px;
		}
		button{
			letter-spacing: 10px !important; 
			font-weight: bold !important; 
			font-size: 20px !important; 
			margin-top: 35px;
			border-radius: 10px !important;
			background: #a3a2a9 !important;
			color: white !important;
		}
		button:hover{
			background: #6e6e6e !important;
		}
		.login2{
			-webkit-border-radius: 50px;
			border-radius: 50px;
			background: #D1D8EC;
			border: 1px solid rgba(0,0,0, 0.2);
			-webkit-box-shadow: 12px 12px 24px #b2b8c9,
								-12px -12px 24px #f0f8ff;
			box-shadow: 12px 12px 24px #b2b8c9,
						-12px -12px 24px #f0f8ff;
		}
		h1{
			letter-spacing: 20px;
			font-weight: bolder !important;			
			text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;
			font-size: 50px;
			
		}

	</style>

</head>
<body>

	<div class="login container-liquid mx-auto col-5">
		<div class=" login2 mx-auto w-100 p-5 card ">
			<div class="d-flex justify-content-center text-white mb-3">
				<h1 style="">LOGIN</h1>
			</div>
			<div class="mt-4">
				<form method="post">
					<?php if(isset($_GET['email'])) : ?>
						<p class="alert-danger" role="alert" style="margin-top: -10px; padding: 3px;">
                      	Harus Mengisi Email
                    	</p>
                    <?php endif; ?>
                    <?php if(isset($_GET['password'])) : ?>
						<p class="alert-danger" role="alert" style="margin-top: -10px; padding: 3px;">
                      	Harus Mengisi Password
                    	</p>
                    <?php endif; ?>
					<div class="form-floating mb-4">
					  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="<?php
                  if(isset($_POST['login'])){
                    echo($email); 
                  } ?>">
					  <label for="floatingInput">Email address</label>
					</div>
					<div class="form-floating">
					  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
					  <label for="floatingPassword">Password</label>
					</div>
					<button name="login" class="btn col-12 d-flex justify-content-center mx-auto mb-4" style="">LOGIN</button>
				</form>
			</div>
			<div class="mt-2" >
                <h6>Belum Punya Akun ? <a href="regist.php" class="text-danger">Registrasi disini</a> </h6>
            </div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>