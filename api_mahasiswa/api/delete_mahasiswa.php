<?php
// koneksi ke db
require_once('../config/koneksi.php');

// set header
header('Content-Type: application/json');

parse_str(file_get_contents('php://input'), $value);

$id = $value['id'];

$query = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$id'");
if ($query) {
    echo json_encode(array(
        'message' => 'Data mahasiswa berhasil dihapus!'
    ));
} else {
    echo json_encode(array(
        'message' => 'error'
    ));
}
