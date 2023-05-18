<?php
// koneksi ke db
require_once('../config/koneksi.php');

// set header
header('Content-Type: application/json');

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

$query = mysqli_query($conn, "INSERT INTO mahasiswa(nama, nim, kelas, jurusan) VALUES ('$nama', '$nim', '$kelas', '$jurusan')");
if ($query) {
    echo json_encode(array(
        'message' => 'Data mahasiswa berhasil dibuat!'
    ));
} else {
    echo json_encode(array(
        'message' => 'error'
    ));
}
