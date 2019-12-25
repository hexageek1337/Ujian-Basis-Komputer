<?php
require 'config/autoload.php';

$query = $koneksi->query("SELECT * FROM kategori_soal");
$data = $query->fetch_object();

//var_dump($data);
if ($query->num_rows >= 1) {
	while ($data) {
		echo $data->kode_kategori."<br>";
		echo $data->nama_kategori."<br>";
		echo $data->durasi_soal."<br>";
	}
} else {
	die("Data tidak ditemukan");
}