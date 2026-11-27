<?php
	include_once "koneks.php";

	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

	$stmt = mysqli_prepare($conn, "DELETE FROM teman WHERE id = ?");
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);

	if (mysqli_stmt_affected_rows($stmt) > 0) {
		echo json_encode(['message' => 'Data berhasil dihapus']);
	} else {
		header('HTTP/1.1 404 Not Found');
		echo json_encode(['error' => 'Data tidak ditemukan']);
	}

	mysqli_close($conn);
?>
