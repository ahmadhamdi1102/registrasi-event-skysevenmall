<?php 


	defined('BASEPATH') OR exit ("No direct script access allowed");



	class Utama extends CI_Controller{

		function __construct(){
		parent::__construct();
			//cek login
			// if($this->session->userdata('status') != "login"){
			// 	redirect(base_url().'welcome?pesan=belumlogin');
			// }
		}
			
		public function index(){
				$this->load->view('header');
				$this->load->view('navbar');
				$this->load->view('tampilan-utama');
				$this->load->view('footer');
		}

	}



 ?>