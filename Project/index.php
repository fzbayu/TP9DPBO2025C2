<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

if (isset($_GET['delete'])) {
    $tampil = new TampilMahasiswa();
    $tampil->delete($_GET['delete']);
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $tampil = new TampilMahasiswa();
    $tampil->edit($_POST['id'], $_POST);
    header("Location: index.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nim'])) {
    $tampil = new TampilMahasiswa();
    $tampil->add($_POST);
    header("Location: index.php");
    exit();
}

// Menampilkan Form Edit dengan membawa parameter id mahasiswa yang akan diedit
if (isset($_GET['edit'])) {
    $tampil = new TampilMahasiswa();
    $data = $tampil->getMahasiswaById($_GET['edit']); 
    include("view/EditMahasiswa.php");
    exit();
}

$tp = new TampilMahasiswa();
$tp->tampil();
?>

