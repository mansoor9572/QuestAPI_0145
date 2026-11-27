<?php
	include_once "koneks.php";

	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

	$json = file_get_contents('php://input');
	$data = json_decode($json, true);

	$nama   = $data['nama'] ?? '';
	$alamat = $data['alamat'] ?? '';
	$telpon = $data['telpon'] ?? '';

	if ($id <= 0 || empty($nama) || empty($alamat) || empty($telpon)) {
		header('HTTP/1.1 400 Bad Request');
		die(json_encode(['error' => 'Data tidak boleh kosong']));
	}

	$stmt = mysqli_prepare($conn, "UPDATE teman SET nama = ?, alamat = ?, telpon = ? WHERE id = ?");
	mysqli_stmt_bind_param($stmt, "sssi", $nama, $alamat, $telpon, $id);
	mysqli_stmt_execute($stmt);

	if (mysqli_stmt_errno($stmt) == 0) {
		echo json_encode(['message' => 'Data berhasil diubah']);
	} else {
		header('HTTP/1.1 500 Internal Server Error');
		echo json_encode(['error' => 'Gagal mengubah data']);
	}

	mysqli_close($conn);
?>
