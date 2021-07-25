<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'trailwebtubes';

$koneksi = mysqli_connect($host, $user, $pass, $db);

function query($query){
  global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
}

function regis($data){

	global $koneksi;

	$namaLengkap = htmlspecialchars($data['nama_lengkap']);
	$email = htmlspecialchars($data['email']);
	$password = mysqli_real_escape_string($koneksi, $data['password']);
	$jk = stripslashes($data['jk']);
	$tanggal = stripslashes($data['tanggal']);

	$result = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email' ");

	if(mysqli_fetch_assoc($result)){
		echo "
          <script>
          alert('username sudah terdaftar!');
          document.location.href = '../views/login.php';
          </script>
          ";
          return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);


	$query = "INSERT INTO users VALUES 
				('', '$namaLengkap', '$tanggal', '$email', '$password')
			";
	mysqli_query($koneksi, $query);
	return mysqli_fetch_assoc($koneksi);
}