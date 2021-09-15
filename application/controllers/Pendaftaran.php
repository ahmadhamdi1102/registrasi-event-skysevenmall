<?php
defined('BASEPATH') OR exit ("No direct script access allowed");
/**
* 
*/
class Pendaftaran extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
	}

	function dua_tabel(){		
		$data['paket'] = $this->M_give->lihat_data('paket')->result();
		$data['tempat'] = $this->M_give->lihat_data('tempat')->result();
		$data['pegawai'] = $this->M_give->lihat_data('pegawai')->result();
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('Pendaftaran/pendaftaran', $data);
			$this->load->view('footer');
	}

	function simpan_pendaftaran(){
		// $Id_Pendaftaran = $this->input->post('Id_Pendaftaran');
		$No_KTP = $this->input->post('No_KTP');
		$Nama_Pelanggan = $this->input->post('Nama_Pelanggan');
		$Alamat = $this->input->post('Alamat');
		$No_HP = $this->input->post('No_HP');
		$Tgl_Pendaftaran = $this->input->post('Tgl_Pendaftaran');
		$Tgl_Booking = $this->input->post('Tgl_Booking');
		$Paket = $this->input->post('Paket');
		$Tempat = $this->input->post('Tempat');
		$Status = $this->input->post('Status');
		$Pegawai = $this->input->post('Pegawai');
		// $this->form_validation->set_rules('Id_Pendaftaran','Id Pendaftaran','required');
		$this->form_validation->set_rules('Nama_Pelanggan','Nama Pelanggan','required');
		$this->form_validation->set_rules('No_KTP','No. KTP ','required');
		$this->form_validation->set_rules('Alamat','Alamat ','required');
		$this->form_validation->set_rules('No_HP','No_HP ','required');
		$this->form_validation->set_rules('Tgl_Pendaftaran','Tanggal Pendaftaran','required');
		$this->form_validation->set_rules('Tgl_Booking','Tanggal Booking','required');
		$this->form_validation->set_rules('Paket','Pemilihan Paket','required');
		$this->form_validation->set_rules('Tempat','Pemilihan Tempat','required');
		$this->form_validation->set_rules('Pegawai','Pemilihan Pegawai','required');


		if($this->form_validation->run() != false){

			$b= '';
			
			$data = array(
				// 'Id_Pendaftaran' => $Id_Pendaftaran,
				'Id_Pendaftaran' => $this->M_give->kodeR($b),
				'No_KTP' => $No_KTP,
				'Nama_Pelanggan' => $Nama_Pelanggan,			
				'Alamat' => $Alamat,			
				'No_HP' => $No_HP,			
				'Tgl_Pendaftaran' => $Tgl_Pendaftaran,
				'Tgl_Booking' => $Tgl_Booking,
				'Paket' => $Paket,
				'Tempat' => $Tempat,
				'Status' => $Status,
				'Pegawai' => $Pegawai
			);
			
			

			$a = '';

			// $Id_Pendaftaran = $this->M_give->kodeR($b);

	        $data2 = array(
	        'id_pembayaran' => $this->M_give->kode($a),
	        'pendaftaran' => $this->M_give->kodeR($b),
	        'total_bayar' => '0',
	        'tanggal_pembayaran' => date("Y/m/d"),
	        'status' => 'Belum Lunas'

	      	 );

        	$this->M_give->insert('pendaftaran', 'pembayaran_event',$data, $data2);        
        	redirect(base_url().'Pendaftaran/dua_tabel');

		}else{
			$data['paket'] = $this->M_give->lihat_data('paket')->result();
			$data['tempat'] = $this->M_give->lihat_data('tempat')->result();
			$data['pegawai'] = $this->M_give->lihat_data('pegawai')->result();

			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('Pendaftaran/pendaftaran', $data);
			$this->load->view('footer');
		}


		
	}
}

?>