<?php
// koneksi ke db
require_once('../config/koneksi.php');

// set header
header('Content-Type: application/json');

parse_str(file_get_contents('php://input'), $value);

$id = $value['id'];
$nama = $value['nama'];
$nim = $value['nim'];
$kelas = $value['kelas'];
$jurusan = $value['jurusan'];

$query = mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', nim='$nim', kelas='$kelas', jurusan='$jurusan' WHERE id='$id'");
if ($query) {
    echo json_encode(array(
        'message' => 'Data mahasiswa berhasil diubah!'
    ));
} else {
    echo json_encode(array(
        'message' => 'error'
    ));
}
