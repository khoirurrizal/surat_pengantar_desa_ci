<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			$data['title'] = 'Halaman Login';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			//validasi succes
			$this->_login();
		}
		
	}

	private function _login()
	{
		$nama_pengguna = $this->input->post('nama_pengguna');
		$password = $this->input->post('password');

		//cek database ada apa tidak
		$pengguna = $this->db->get_where('pengguna', ['nama_pengguna' => $nama_pengguna])->row_array();
		
		//usernya ada
		if($pengguna){
			if(password_verify($password, $pengguna['password'])){
				//jika pasword benar
				$data = [
							'nama_pengguna'	=> $pengguna['nama_pengguna'],
							'jabatan'		=> $pengguna['jabatan']
							];
							$this->session->set_userdata($data);
							if($pengguna['jabatan'] == 'RT'){
								redirect('ketuart');
							} else {
								redirect('ketuarw'); 
							}
							  
			}else {
				//jika password salah
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah! </div>');
				redirect('auth');
			}

		} else {
			//usernya tidak ada
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> User tidak terdaftar! </div>');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('nama_pengguna');
		$this->session->unset_userdata('jabatan');
		// $this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil logout! </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

	private function _sendEmail($token, $type)
	{
		$config = [
					'protocol'	=>'smtp',
					'smtp_host'	=>'ssl://smtp.googlemail.com',
					'smtp_user'	=>'codingerror404@gmail.com',
					'smtp_pass'	=>'jazosupra16z',
					'smtp_port'	=>465,
					'mailtype'	=>'html',
					'charset'	=>'utf-8',
					'newline'	=>"\r\n"
					];

					$this->email->initialize($config);

					$this->email->from('codingerror404@gmail.com','Coding Error');
					$this->email->to($this->input->post('email'));

					if($type == 'lupapassword') {
						$this->email->subject('Reset Password');
						$this->email->message('Click link untuk reset password :
						<a href="'.base_url().'auth/resetpassword?email='.$this->input->post('email').'&token='.urlencode($token).'">Reset Password</a>');
					}

					if($this->email->send()) {
						return true;
					}else {
						echo $this->email->print_debugger();
					}
	}

	public function lupapassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Lupa Password';

			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/lupa-password');
			$this->load->view('templates/auth_footer');
		}else{
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if($user){
				$token = base64_encode(random_bytes(32));
				$user_token = ['email'=> $email,
							   'token'=> $token,
								'date_create' => time()
							];
				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'lupapassword');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
														Cek email untuk reset password! 
														</div>');
				redirect('auth/lupapassword');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
														Email tidak terdaftar! 
														</div>');
				redirect('auth/lupapassword');
			}
		}
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if($user_token){
				$this->session->set_userdata('reset_email', $email);
				$this->gantipassword();

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
														Reset password gagal! Token salah 
														</div>');
				redirect('auth');
			}

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
														Reset password gagal! Email salah 
														</div>');
			redirect('auth');
		}
	}

	public function gantipassword()
	{
		if(!$this->session->userdata('reset_email')){
			redirect('auth');
		}
		
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulang Password', 'trim|required|min_length[4]|matches[password1]');


		if($this->form_validation->run() == false){
			$data['title'] = 'Ganti Password';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/ganti-password');
			$this->load->view('templates/auth_footer');
			
		} else {
			$password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
														Password sudah direset silahkan login!
														</div>');
			redirect('auth');
		}
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */