<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pembayaran extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table = "pendaftaran";
	}

	 function pendaftaran(){
        $query = $this->db->get('pendaftaran');
        return $query->result_array();
    }


	public function get_cetakfaktur($tabel)
	{
		$query = $this->db->get($tabel);
		return $query->result();
	}

    function select($where = null)
	{
		if ($where != null) {
			$this->db->where($where);
		}

		$query = $this->db->get("pendaftaran");

		return $query->result_array();
	}


	function tampil_pembayaran(){
        $hasil=$this->db->query("SELECT id_pendaftaran,nama_pelanggan,alamat,no_hp,harga
         FROM pendaftaran");
        return $hasil;
    }

  function ambildata(){
		$this->db->select('pendaftaran.Id_Pendaftaran ,pendaftaran.Nama_Pelanggan,pendaftaran.Alamat,pendaftaran.No_HP, paket.harga, tempat.Harga_Tempat, pembayaran_event.id_pembayaran ');
		$this->db->from('pendaftaran');
		$this->db->join('pembayaran_event', 'pendaftaran.Id_Pendaftaran=pembayaran_event.pendaftaran');
		$this->db->join('paket', 'paket.id_paket=pendaftaran.Paket');
		$this->db->join('tempat', 'tempat.Id_Tempat=pendaftaran.Tempat');
		$this->db->where("pembayaran_event.status='Belum Lunas'");
		$query = $this->db->get();	
		return $query->result_array();			
	}
 
 
}

?>