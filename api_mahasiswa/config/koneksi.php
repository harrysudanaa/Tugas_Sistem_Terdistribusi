<?php
// Koneksi ke database
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'db_mahasiswa');

$conn = mysqli_connect(HOST, USER, PASS, DB) or die('Koneksi error: ' . mysqli_connect_error());
