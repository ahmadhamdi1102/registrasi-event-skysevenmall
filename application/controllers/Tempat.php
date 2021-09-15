<?php
defined('BASEPATH') OR exit ("No direct script access allowed");
/**
* 
*/
class Tempat extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		 
	}

	function lihat_tempat(){
		$data['tempat'] = $this->M_give->lihat_data('tempat')->result();
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('Tempat/lihat_tempat', $data);
		$this->load->view('footer');

	}

	function tambah_tempat(){

		// $Id_Tempat = $this->input->post('Id_Tempat');
		$Nama_Tempat = $this->input->post('Nama_Tempat');
		$Jenis_Tempat = $this->input->post('Jenis_Tempat');
		$Ukuran_Tempat = $this->input->post('Ukuran_Tempat');
		$Harga_Tempat = $this->input->post('Harga_Tempat');
		$Kapasitas_Tempat = $this->input->post('Kapasitas_Tempat');
		
		// $this->form_validation->set_rules('Id_Tempat','Id Tempat','required');
		$this->form_validation->set_rules('Nama_Tempat','Nama Tempat','required');
		$this->form_validation->set_rules('Jenis_Tempat','Jenis Tempat','required');
		$this->form_validation->set_rules('Ukuran_Tempat','Ukuran Tempat','required');
		$this->form_validation->set_rules('Harga_Tempat','Harga Tempat','required');
		$this->form_validation->set_rules('Kapasitas_Tempat','Kapasitas Tempat','required');

		if($this->form_validation->run() != false){
			$a = '';
			$data = array(
				// 'Id_Tempat' => $Id_Tempat,
				'Id_Tempat' => $this->M_give->kodeT($a),
				'Nama_Tempat' => $Nama_Tempat,
				'Jenis_Tempat' => $Jenis_Tempat,			
				'Ukuran_Tempat' => $Ukuran_Tempat,			
				'Harga_Tempat' => $Harga_Tempat,			
				'Kapasitas_Tempat' => $Kapasitas_Tempat
				
			);
			$this->M_give->simpan_data($data,'tempat');
			redirect(base_url().'Tempat/tambah_tempat');

			


		}else{
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('Tempat/tambah_tempat');
			$this->load->view('footer');
		}


		


	}

	function tampil_ubah($id){				
		$where = array(
			'Id_Tempat' => $id		
		);
		$data['tempat'] = $this->M_give->tubah_data($where,'tempat')->result();
		$data['pegawai'] = $this->M_give->lihat_data('pegawai')->result();	

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('Tempat/ubah_tempat', $data);
		$this->load->view('footer');
	}

	function ubah_tempat(){		
		$Id_Tempat = $this->input->post('Id_Tempat');
		$Nama_Tempat = $this->input->post('Nama_Tempat');
		$Jenis_Tempat = $this->input->post('Jenis_Tempat');
		$Ukuran_Tempat = $this->input->post('Ukuran_Tempat');
		$Harga_Tempat = $this->input->post('Harga_Tempat');
		$Kapasitas_Tempat = $this->input->post('Kapasitas_Tempat');
		
		
	
			$data = array(
				'Id_Tempat' => $Id_Tempat,
				'Nama_Tempat' => $Nama_Tempat,
				'Jenis_Tempat' => $Jenis_Tempat,			
				'Ukuran_Tempat' => $Ukuran_Tempat,			
				'Harga_Tempat' => $Harga_Tempat,			
				'Kapasitas_Tempat' => $Kapasitas_Tempat
			);

			$where = array(
			'Id_Tempat' => $Id_Tempat		
			);

			$this->M_give->ubah_data($where,$data,'tempat');
			redirect(base_url().'Tempat/lihat_tempat');
		
	}

	

	function hapus_tempat($id){				
		$where = array(
			'Id_Tempat' => $id		
		);
		$this->M_give->hapus_data($where,'tempat');		
		redirect(base_url().'Tempat/lihat_tempat');
	}

	
}

?>