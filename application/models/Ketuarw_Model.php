<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketuarw_Model extends CI_Model {

	
	public function data_pengguna()
	{
		$query = "SELECT `pengguna`.* 
				 FROM `pengguna` 
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

/* End of file Ketuarw_Model.php */
/* Location: ./application/models/Ketuarw_Model.php */