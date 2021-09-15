<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller{
   function __construct(){
        parent::__construct();
        $this->load->model('m_pembayaran');
        $this->load->library('cfpdf');
    }
    function index(){
            //$x['data']=$this->m_pembayaran->tampil_pembayaran();
            // $data['penjadwalan'] = $this->db->query("SELECT * FROM pendaftaran,tempat, pembayaran_event, paket WHERE Tempat=Id_Tempat and Paket=id_paket and pendaftaran=id_pendaftaran")->result();
           // $data['pembayaran'] = $this->db->query("SELECT * FROM pendaftaran,tempat, pembayaran_event, paket WHERE Tempat=Id_Tempat OR Paket=id_paket OR Id_Pendaftaran=pendaftaran")->result_array();
            $data['data3'] = $this->m_pembayaran->ambildata();
            
          //  $data['data'] = $this->m_pembayaran->select();
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('v_pembayaran',$data);
            $this->load->view('footer');
          

    }

    public function ambildata()
    {
       
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('v_pembayaran',$data);
            $this->load->view('footer');

    }

    function cetak()
    {

        $pdf = new FPDF('L','mm',array(90,110));
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(90,16,'Tiket Parkir Sky Seven Mall',0,1,'C');
        $pdf->SetFont('Arial','',12);

        $this->db->select('pendaftaran.Id_Pendaftaran ,pendaftaran.Nama_Pelanggan,pendaftaran.Alamat,pendaftaran.No_HP,pembayaran_event.total_bayar, pembayaran_event.tanggal_pembayaran,pembayaran_event.status,pembayaran_event.id_pembayaran');
        $this->db->from('pendaftaran');
        $this->db->join('pembayaran_event', 'pembayaran_event.pendaftaran=pendaftaran.Id_Pendaftaran');
        $this->db->where("id_pembayaran = 'BY001' ");
        $query = $this->db->get();  
        return $query->result_array();      

        foreach ($query->result() as $row)
        {
                $pdf->Cell(85,7,"Kode Parkir  :  $row->Nama_Pelanggan",2,1,"C");
         
        }

                $pdf->Output();
    }


function simpan(){
        date_default_timezone_set("Asia/Jakarta");
        $data = array (
                
                'tanggal_pembayaran' => date("Y-m-d"),
                
            );

        $kode = $data['id_pembayaran'];

       // $this->m_databaseparkir->simpan($data);
        $this->cetak($kode);
        
        //redirect('Kelola_Parkir_Masuk', 'refresh');
        
    }

    public function cetak1($id)
    {
        $data['database'] = $this->m_pembayaran->ambildata('v_pembayaran');
        
        $data['title'] = "Data Client Kontrak Iklan";

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('v_cetakfaktur', $data);
        $this->load->view('footer');
    }
}