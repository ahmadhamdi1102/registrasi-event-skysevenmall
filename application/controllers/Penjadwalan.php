<?php
defined('BASEPATH') OR exit ("No direct script access allowed");
/**
* 
*/
class Penjadwalan extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function lihat_penjadwalan(){
		$data['penjadwalan'] = $this->db->query("SELECT * FROM pendaftaran,tempat, pegawai, paket, pembayaran_event WHERE Tempat=Id_Tempat and Paket=id_paket and Pegawai=id_pegawai and Id_Pendaftaran=pendaftaran and pembayaran_event.status = 'Lunas'  ORDER BY pendaftaran.Tgl_Booking")->result();

		 // and pendaftaran.Status = 'Belum terlaksana'
		
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('Penjadwalan/penjadwalan', $data);
		$this->load->view('footer');
	}

	function filter(){					
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');		
							
		$data['filter'] = $this->db->query("SELECT * FROM pendaftaran,tempat, pegawai, paket, pembayaran_event WHERE Tempat=Id_Tempat and Paket=id_paket and Pegawai=id_pegawai and Id_Pendaftaran=pendaftaran and pembayaran_event.status = 'Lunas' and date(Tgl_Booking) >= '$dari' and date(Tgl_Booking) <= '$sampai'")->result();	

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('Penjadwalan/filter', $data);
		$this->load->view('footer');
		
	}

	function ubah_status(){		
		$Id_Pendaftaran = $this->input->post('Id_Pendaftaran');
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
		
	
			$data = array(
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

			$where = array(
			'Id_Pendaftaran' => $Id_Pendaftaran		
			);

			$this->M_give->ubah_data($where,$data,'pendaftaran');
			redirect(base_url().'Penjadwalan/lihat_penjadwalan');
		
	}


	function tampil_ubah($id){				
		$where = array(
			'Id_Pendaftaran' => $id		
		);
		$data['pelanggan'] = $this->M_give->tubah_data($where,'pendaftaran')->result();	
		$data['paket'] = $this->M_give->lihat_data('paket')->result();
		$data['tempat'] = $this->M_give->lihat_data('tempat')->result();
		$data['pegawai'] = $this->M_give->lihat_data('pegawai')->result();

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('Penjadwalan/ubah', $data);
		$this->load->view('footer');
	}





}


?>