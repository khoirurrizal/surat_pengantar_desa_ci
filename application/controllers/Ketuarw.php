<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketuarw extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		if($this->session->userdata('jabatan') != 'RW'){
			redirect("auth/blocked");
		}
		$this->load->model('Ketuarw_Model', 'ketuarw');
	}	

	public function index()
	{
		$data['pengguna'] = $this->db->get_where('pengguna', ['nama_pengguna' => $this->session->userdata('nama_pengguna')])->row_array();
		$data['title'] = 'Kelola User';
		
		$data['data_pengguna'] = $this->ketuarw->data_pengguna()->result_array();
		
		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');



		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);		
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('ketuarw/data_pengguna',$data);
		$this->load->view('templates/footer');
		}else{
			$data=['nama_pengguna' => $this->input->post('nama_pengguna'),
					'password'		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'jabatan' => $this->input->post('jabatan')
					];
		$this->db->insert('pengguna', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
														Berhasil menambahkan data ! 
														</div>');
		redirect('ketuarw');
		}
	}

	public function edit_data_pengguna(){
		$data['pengguna'] = $this->db->get_where('pengguna', ['nama_pengguna' => $this->session->userdata('nama_pengguna')])->row_array();
		$id = $this->input->post('id');
		$password_sekarang = $this->input->post('password');

		if($password_sekarang == ''){
		$data=[		'nama_pengguna' => $this->input->post('nama_pengguna'),
					'jabatan' => $this->input->post('jabatan')
				];	
		} else {
			$data=[		'nama_pengguna' => $this->input->post('nama_pengguna'),
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						'jabatan' => $this->input->post('jabatan')
				];
		}
		
		$this->db->where('id', $id);			
		$this->db->update('pengguna', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
														Berhasil mengedit data ! 
														</div>');
		redirect('ketuarw');
		
	}

	public function delete_data_pengguna($id){
			$this->db->delete('pengguna',['id'=>$id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil menghapus data ! </div>');
				redirect('ketuarw');
		}
	
	public function data_surat_pengantar()
	{
		$data['pengguna'] = $this->db->get_where('pengguna', ['nama_pengguna' => $this->session->userdata('nama_pengguna')])->row_array();
		$data['pengantar'] = $this->ketuarw->data_surat_pengantar()->result_array();
		$data['title'] = 'Surat Pengantar';
		
		$this->load->view('templates/header',$data);		
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('ketuarw/data_surat_pengantar',$data);
		$this->load->view('templates/footer');
	}

}

/* End of file Ketuarw.php */
/* Location: ./application/controllers/Ketuarw.php */