<?php
// koneksi ke db
require_once('../config/koneksi.php');
header('Content-Type: application/json');
if (empty($_GET)) {
    $query = mysqli_query($conn, "SELECT * FROM mahasiswa");

    $data = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push($data, array(
            'id' => $row['id'],
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            'kelas' => $row['kelas'],
            'jurusan' => $row['jurusan']
        ));
    }

    echo json_encode(
        array('data' => $data)
    );
} else {
    $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=" . $_GET['id']);
    $data = array();
    while ($row = mysqli_fetch_array($query)) {
        $data = array(
            'id' => $row['id'],
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            'kelas' => $row['kelas'],
            'jurusan' => $row['jurusan']
        );
    }

    echo json_encode(
        $data
    );
}
