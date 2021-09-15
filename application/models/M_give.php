<?php
	/**
	* 
	*/
class M_give extends CI_Model
{
		
	function __construct()
	{
		# code...
		parent::__construct();
		
	}

	function tubah_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function lihat_data($table){
		return $this->db->get($table);
	}

	function simpan_data($data,$table){
		$this->db->insert($table,$data);
	}

	function ubah_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

// Login

	 function kode($kodepaket){
       $this->db->select('RIGHT(pembayaran_event.id_pembayaran,3) as kode', FALSE);
       $this->db->order_by('id_pembayaran','DESC');
       $this->db->limit(1);

       $query = $this->db->get('pembayaran_event');
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

    function kodeT($kodepaket){
       $this->db->select('RIGHT(tempat.Id_Tempat,3) as kode', FALSE);
       $this->db->order_by('Id_Tempat','DESC');
       $this->db->limit(1);

       $query = $this->db->get('tempat');
       if ($query->num_rows() <> 0) {
          $data =$query->row();
           $kode = intval($data->kode)+1;
       }
       else{
          $kode=1;
       }
       $kodemax = str_pad($kode,3, '0' , STR_PAD_LEFT);
       $kodepaket = "T".$kodemax."";

       return $kodepaket;
    }

    function kodeR($kodepaket){
       $this->db->select('RIGHT(pendaftaran.Id_Pendaftaran,3) as kode', FALSE);
       $this->db->order_by('Id_Pendaftaran','DESC');
       $this->db->limit(1);

       $query = $this->db->get('pendaftaran');
       if ($query->num_rows() <> 0) {
          $data =$query->row();
           $kode = intval($data->kode)+1;
       }
       else{
          $kode=1;
       }
       $kodemax = str_pad($kode,3, '0' , STR_PAD_LEFT);
       $kodepaket = "REGIS".$kodemax."";

       return $kodepaket;
    }

   //  function insert($data,$data2){
   //  return $this->db->insert('pendaftaran',$data);
   //  return $this->db->insert('pembayaran_event',$data2);
   // }

    
    function insert($table1, $table2,$data,$data2){
     $this->db->insert($table1,$data);
    return $this->db->insert($table2,$data2);
   }

	

	
}

?>