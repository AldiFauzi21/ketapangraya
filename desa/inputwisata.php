<?php
	session_start();
	date_default_timezone_set('Asia/Singapore');
	$date=date("Y-m-d h:i:s");
	include '../plt/config.php';
	require '../plt/functions.php';
	if(isset($_POST['nama'])
		&&isset($_POST['jenis'])
		&&isset($_POST['telp'])
		&&isset($_POST['video'])
		&&isset($_POST['maps'])
		&&isset($_POST['isi'])
		&&isset($_POST['alamat'])
	){
		$nama=$_POST['nama'];
		$_SESSION['nama_wisata']=$nama;
		// $name = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
		// $_SESSION['nama']=$_POST['fullname'];
		$jenis=$_POST['jenis'];
		$_SESSION['jenis']=$jenis;
		$telp=$_POST['telp'];
		$_SESSION['telp']=$telp;
		$video=$_POST['video'];
		$_SESSION['video']=$video;
		$maps=$_POST['maps'];
		$_SESSION['maps']=$maps;
		// $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		// $_SESSION['useremail']=$_POST['email'];
		$isi=$_POST['isi'];
		$_SESSION['isi']=$isi;
		// $prov = filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);
		// $_SESSION['prov']=$_POST['prov'];
		$alamat=$_POST['alamat'];
		$_SESSION['alamat_wisata']=$alamat;
		$nik = $_SESSION['NIK'];
		// $almt = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
		// $_SESSION['alamat']=$_POST['alamat'];
		$sql = "INSERT INTO wisata (nama, jenis, youtube, kontak, koordinat, lokasi, tanggal, NIK) VALUES ('$nama', '$jenis', '$video', '$telp', '$maps', '$alamat', '$date', '$nik');";
		if (($nama!="")
			&&($jenis!="")
			&&($video!="")
			&&($telp!="")
			&&($maps!="")
			&&($isi!="")
			&&($alamat!="")
			&&($nik!="")
			// &&(strlen($password)>=5)&&(strlen($password)<=35)
			// &&(strlen($kota)>3)&&(strlen($prov)>3)
			// &&(strlen($phone)>9)&&(strlen($phone)<16)
		) {
			if ($conn->query($sql) === TRUE) {
				if(upload_bg($nama, $maps)>0){
					$infokom=fopen("../plt/iPortfolio/assets/text/descriptions/$nama.txt", 'w');

					//fwrite($infokom, "dibuat : ${tanggal}");

					fwrite($infokom, "${isi}");
					fclose($infokom);
					header("location:desa.php");
				} else {
					query("DELETE FROM admin WHERE nama = '$nama' AND koordinat = '$maps'");
					
					header("location:desa.php");
				}
			} else {
				echo "Error$ " . $sql . "<br>" . $conn->error;
			}
		}else{
			header("location:Upwisata.php");
		}
	}else{
	header("location: Upwisata.php");
}
?>