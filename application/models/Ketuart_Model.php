<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketuart_Model extends CI_Model {

	
	public function data_warga()
	{
		$query = "SELECT `data_warga`.* 
				 FROM `data_warga` 
				 ";
				 return $this->db->query($query);
	}

	public function data_surat_pengantar()
	{
		$query = "SELECT `surat_pengantar`.* , `data_warga`.`no_ktp`, `data_warga`.`nama_lengkap` 
				 FROM `surat_pengantar` JOIN `data_warga`
				 ON `surat_pengantar`.`id_data_warga` = `data_warga`.`id_data_warga`
				 ORDER BY `surat_pengantar`.`id_surat_pengantar` DESC
				 ";
				 return $this->db->query($query);
	}

	public function kode_surat()
	{
		$query = "SELECT MAX(id_surat_pengantar) as kode from surat_pengantar";
		return $this->db->query($query);
	}

	public function data_cetak($id_surat_pengantar)
	{
		$query = "SELECT `surat_pengantar`.* , `data_warga`.*
				 FROM `surat_pengantar` JOIN `data_warga`
				 ON `surat_pengantar`.`id_data_warga` = `data_warga`.`id_data_warga`
				 Where `surat_pengantar`.`id_surat_pengantar` = $id_surat_pengantar
				 ";
				 return $this->db->query($query);
	}

}

/* End of file Ketuart_Model.php */
/* Location: ./application/models/Ketuart_Model.php */