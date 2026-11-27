<?php
	include_once "koneks.php";

	header('Content-Type: application/json');

	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

	$stmt = mysqli_prepare($conn, "SELECT * FROM teman WHERE id = ?");
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);

	if ($row) {
		echo json_encode($row);
	} else {
		header('HTTP/1.1 404 Not Found');
		echo json_encode(['error' => 'Data tidak ditemukan']);
	}

	mysqli_close($conn);
?>
