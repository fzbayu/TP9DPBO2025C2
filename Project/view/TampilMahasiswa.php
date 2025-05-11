<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$id = $this->prosesmahasiswa->getId($i);
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td> 
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td> 
			<td>" . $this->prosesmahasiswa->getTelp($i) . "</td> 
			<td>
				<a href='index.php?edit=" . $id . "' class='btn btn-sm btn-primary'>Edit</a>
				<a href='index.php?delete=" . $this->prosesmahasiswa->getId(i: $i) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin hapus data?\")'>Hapus</a>
			</td>
			</tr>";

		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function add($data)
	{
		$this->prosesmahasiswa->tambahMahasiswa($data);
		header("Location: index.php"); // redirect ke tampilan utama
		exit;
	}

	function getMahasiswaById($id)
	{
		return $this->prosesmahasiswa->getMahasiswaById($id);
	}

	function edit($id, $data = null)
	{
		// Jika $data kosong, berarti kita hanya ingin mengambil data
		if ($data === null) {
			return $this->prosesmahasiswa->getMahasiswaById($id);
		}
		
		// Jika $data tersedia, berarti kita ingin update data
		$id = $data['id'];
		$dataMhs = [
			'nim' => $data['nim'],
			'nama' => $data['nama'],
			'tempat' => $data['tempat'],
			'tl' => $data['tl'],
			'gender' => $data['gender'],
			'email' => $data['email'],
			'telp' => $data['telp']
		];
		
		$this->prosesmahasiswa->ubahMahasiswa($id, $dataMhs);
		header("Location: index.php");
		exit();
	}

	function delete($id)
	{
		$this->prosesmahasiswa->hapusMahasiswa($id);
		header("Location: index.php"); 
		exit;
	}
}
?>