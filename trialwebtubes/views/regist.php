<?php 
	
	require_once '../controler/config.php';
	if(isset($_POST['regis'])){
		if (regis($_POST) > 0) {
		    echo "<script>
		            alert('user baru berhasil ditambahkan');
		            document.location.href = 'login.php'
		          </script>"; 
		} else {
		    echo mysqli_error($koneksi);
		  
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN REGISTRASI</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style type="text/css">
	body{
		background: #D1D8EC;
	}
	.regist{
		position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
	}
	.regist{
			-webkit-border-radius: 30px;
			border-radius: 30px;
			background: #D1D8EC;
			border: 1px solid rgba(0,0,0, 0.2);
			-webkit-box-shadow: 12px 12px 24px #b2b8c9,
								-12px -12px 24px #f0f8ff;
			box-shadow: 12px 12px 24px #b2b8c9,
						-12px -12px 24px #f0f8ff;
			padding: 20px 33px;
			height: 80%;
		}
	h1{
		letter-spacing: 20px;
		font-weight: bolder !important;			
		text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;
		font-size: 50px;
		color: white;
		margin-bottom: 30px;

	}
	.tinggi input{
			height: 50px !important;
			border-radius: 10px !important;

	}
	.tinggi label{
			margin-top: -10px;

	}
	button{
			letter-spacing: 8px !important; 
			font-weight: bold !important; 
			font-size: 20px !important; 
			margin-top: 20px;
			border-radius: 10px !important;
			background: #a3a2a9 !important;
			color: white !important;
			margin-bottom: 20px;
			border: none !important;
	}
	button:hover{
		background: #6e6e6e !important;
	}

	.btn{
		width: 49% !important;
		letter-spacing: 8px !important;
		font-weight: bold !important; 
		font-size: 20px !important;  
		border-radius: 10px !important;
		border: none !important;
	}

</style>
<body>

	<div class="regist card container-fluid col-6" >
		<div class="mx-auto">
			<h1>REGISTRASI</h1>
		</div>
		<div>
			<form method="post">
				<div>
					<div class="tinggi">
						<div class="form-floating mb-4">
						  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nama_lengkap" required>
						  <label for="floatingInput">Nama Lengkap</label>
						</div>
						<div class="form-floating mb-4">
						  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
						  <label for="floatingInput">Email</label>
						</div>
						<div class="form-floating mb-4">
						  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
						  <label for="floatingPassword">Password</label>
						</div>
					</div>

					<div style="display: flex; flex-direction: row;">
						<div class="form-control mb-4 w-50 me-4" style="display: flex; flex-direction: row; justify-content: space-around;">
							<div class="form-check">
								<input type="radio" class="form-check-input" name="jk" id="laki" value="Laki-Laki">
								<label class="form-check-label" for="laki">Laki-Laki</label>
							</div>
							<div class="form-check ">
								<input type="radio" class="form-check-input" name="jk" id="cewe" value="Perempuan">
								<label class="form-check-label" for="cewe">Perempuan</label>
							</div>
						</div>
					<div class="form-control mb-4 w-50">
						<label for="date">
							Tanggal Lahir
						</label>
						<input type="date" name="tanggal" id="date" required>
					</div>
					</div>
					<div class="">
						<button class="btn " name="regis" type="submit">REGISTRASI</button>
                    	<a href="login.php" class="btn btn-danger" style="margin-left: 1%;">KEMBALI</a>			
					</div>
				</div>
			</form>
		</div>
	</div>

</body>
</html>