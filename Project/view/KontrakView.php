<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

interface KontrakView{
	public function tampil();
	public function add($data);
	public function edit($id, $data);
	public function delete($id);
}
?>