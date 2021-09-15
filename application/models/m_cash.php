<?php
defined('BASEPATH') OR exit('No direct script allowed');

class m_cash extends CI_Model
	{
	function __construct(){
		parent::__construct("pembayaran_event");
		$this->table = "pembayaran_event";
		
	}

	function select($where = null)
	{
		if ($where != null) {
			$this->db->where($where);
		}

		$query = $this->db->get("pembayaran_event");

		return $query->result_array();
	}

	 function edit_cash($id_pembayaran){
        $hasil=$this->db->query("UPDATE pembayaran_event SET status='Lunas' WHERE id_pembayaran=
        	'$id_pembayaran'");
        return $hasil;				
    }

    function ambildata(){
		$this->db->select('pendaftaran.Id_Pendaftaran ,pendaftaran.Nama_Pelanggan,pendaftaran.Alamat,pendaftaran.No_HP, paket.harga, tempat.Harga_Tempat');
		$this->db->from('pendaftaran');
		$this->db->join('paket', 'paket.id_paket=pendaftaran.Paket');
		$this->db->join('tempat', 'tempat.Id_Tempat=pendaftaran.Tempat');
		//$this->db->where("status='Belum Lunas'");
		$query = $this->db->get();	
		return $query->result_array();			
	}

	  function kode($kodepaket){
       $this->db->select('RIGHT(pembayaran_event.id_pembayaran,3) as kode', FALSE);
       $this->db->order_by('id_pembayaran','DESC');
       $this->db->limit(1);

       $query = $this->db->get($this->table);
       if ($query->num_rows() <> 0) {
       		$data =$query->row();
       	   $kode = intval($data->kode)+1;
       }
       else{
       	  $kode=1;
       }
       $kodemax = str_pad($kode,3, '0' , STR_PAD_LEFT);
       $kodepaket = "BY".$kodemax."";

       return $kodepaket;
    }
		

    function simpan_cash($id_pembayaran,$pendaftaran,$total_bayar,$tanggal_pembayaran,$status){
        $hasil=$this->db->query("INSERT INTO pembayaran_event (id_pembayaran,pendaftaran,total_bayar,tanggal_pembayaran,status) VALUES ('$id_pembayaran','$pendaftaran',
        	'$total_bayar','$tanggal_pembayaran','$status')");
        return $hasil;
    }

		function edit_cash2($table, $key, $id, $data){
        // $hasil=$this->db->query("UPDATE detail_paket SET id_barang='$id_barang', jumlah='$jumlah' WHERE id_detail_paket='$id_detail_paket'");
        // return $hasil;

        $this->db->where($key, $id);
        $this->db->update($table, $data);
    }

    function simpan_cash1($table, $key, $id, $data){
        // $hasil=$this->db->query("UPDATE detail_paket SET id_barang='$id_barang', jumlah='$jumlah' WHERE id_detail_paket='$id_detail_paket'");
        // return $hasil;

        $this->db->where($key, $id);
        $this->db->insert($table, $data);
    }


	function ambildata2($where) {
		$this->db->from('pendaftaran');
		$this->db->where($where);
		$query = $this->db->get();	
		return $query->result_array();	
	}
 	
 
 







}
