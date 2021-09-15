<?php
/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function index(){
		$this->load->view('aksi_login');
	}

	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() != false){
			$where = array(
				'username' => $username,
				'password' => md5($password)			
			);
			$data = $this->M_give->tubah_data($where,'user');
			$d = $this->M_give->tubah_data($where,'user')->row();
			$cek = $data->num_rows();
			// if($cek > 0){
			// 	$session = array(
			// 		'nama'=> $d->username,
			// 		'status' => 'login'
			// 	);
			// 	$this->session->set_userdata($session);
				redirect(base_url().'Utama');
			// }else{
			// 	echo "<script type='text/javascript'>alert('Username atau password salah')</script>";		
			// }
		}else{
			redirect(base_url().'Utama');
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'Login');
	}


}

?>