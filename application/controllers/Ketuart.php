<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketuart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		if($this->session->userdata('jabatan') != 'RT'){
			redirect("auth/blocked");
		}
		$this->load->model('Ketuart_Model', 'ketuart');
	}	

	public function index()
	{
		$data['pengguna'] = $this->db->get_where('pengguna', ['nama_pengguna' => $this->session->userdata('nama_pengguna')])->row_array();
		$data['title'] = 'Kelola Data Warga';
		
		$data['warga'] = $this->ketuart->data_warga()->result_array();
		
		$this->form_validation->set_rules('no_kk', 'KK', 'required');
		$this->form_validation->set_rules('no_ktp', 'KTP', 'required|trim|is_unique[data_warga.no_ktp]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');



		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);		
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('ketuart/datawarga',$data);
		$this->load->view('templates/footer');
		}else{
			$data=['no_kk' => $this->input->post('no_kk'),
					'no_ktp' => $this->input->post('no_ktp'),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'jk' => $this->input->post('jk'),
					'tempat' => $this->input->post('tempat'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'agama' => $this->input->post('agama'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'alamat' => $this->input->post('alamat')];
		$this->db->insert('data_warga', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
														Berhasil menambahkan data ! 
														</div>');
		redirect('ketuart');
		}
	}

	public function edit_data_warga(){
		$data['pengguna'] = $this->db->get_where('pengguna', ['nama_pengguna' => $this->session->userdata('nama_pengguna')])->row_array();
		$id_data_warga = $this->input->post('id_data_warga');
		
		$data=[		'no_kk' => $this->input->post('no_kk'),
					'no_ktp' => $this->input->post('no_ktp'),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'jk' => $this->input->post('jk'),
					'tempat' => $this->input->post('tempat'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'agama' => $this->input->post('agama'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'alamat' => $this->input->post('alamat')];
		$this->db->where('id_data_warga', $id_data_warga);			
		$this->db->update('data_warga', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
														Berhasil mengedit data ! 
														</div>');
		redirect('ketuart');
		
	}

	public function delete_data_warga($id_data_warga){
			$this->db->delete('data_warga',['id_data_warga'=>$id_data_warga]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil menghapus data ! </div>');
				redirect('ketuart');
		}
	
	public function surat_pengantar()
	{
		$data['pengguna'] = $this->db->get_where('pengguna', ['nama_pengguna' => $this->session->userdata('nama_pengguna')])->row_array();
		$data['pengantar'] = $this->ketuart->data_surat_pengantar()->result_array();
		$data['title'] = 'Surat Pengantar';
		
		$this->load->view('templates/header',$data);		
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('ketuart/surat_pengantar',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_surat_pengantar()
	{
		$data['pengguna'] = $this->db->get_where('pengguna', ['nama_pengguna' => $this->session->userdata('nama_pengguna')])->row_array();
		$data['kodesurat'] = $this->ketuart->kode_surat()->row_array();
		$data['warga'] = $this->ketuart->data_warga()->result_array();
		$data['title'] = 'Pilih Data Warga';
		
		$this->load->view('templates/header',$data);		
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('ketuart/pilih_data',$data);
		$this->load->view('templates/footer');
	}

	public function kirim_data_warga()
	{
		$data['pengguna'] = $this->db->get_where('pengguna', ['nama_pengguna' => $this->session->userdata('nama_pengguna')])->row_array();
		
		
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required');

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);		
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('ketuart/datawarga',$data);
		$this->load->view('templates/footer');
		}else{
			$data=['id_data_warga' => $this->input->post('id_data_warga'),
					'tanggal_buat' => $this->input->post('tanggal_buat'),
					'no_surat' => $this->input->post('no_surat'),
					'keperluan' => $this->input->post('keperluan')
					];
		$this->db->insert('surat_pengantar', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
														Berhasil menambahkan data ! 
														</div>');
		redirect('ketuart/surat_pengantar');
		}
		
	}

	public function cetak_surat_pengantar($id_surat_pengantar)
	 {
	 	// load view yang akan digenerate atau diconvert
    $data = array(
      'record'  => $this->ketuart->data_cetak($id_surat_pengantar)
    );
   
    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "surat-pengantar.pdf";
    $this->pdf->load_view('ketuart/print_surat_pengantar',$data);
    
		}

}

/* End of file Ketuart.php */
/* Location: ./application/controllers/Ketuart.php */