<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cash extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_cash');
         $this->load->library('pdf');
      
    }

    public function index()
    {
        $id_pendaftaran = $this->input->get('id_pendaftaran');
        $data['data3'] = $this->m_cash->ambildata();
       // $harga = $this->input->get('harga');
        //$bayar = $this->input->get('bayar');
        $where = array('id_pendaftaran' => $id_pendaftaran );
        $data['data2'] = $this->m_cash->ambildata2($where);
        //$data['data3'] = $this->m_cash->ambildata($where);
        $data['data'] = $this->m_cash->select($where);
         $data['id_pembayaran'] = $id_pembayaran;

         $data['pendaftaran'] = $this->input->post('pendaftaran');
         $pendaftaran = $this->input->post('pendaftaran'); 
       
            $this->load->view('header');
            $this->load->view('navbar');
            $this->load->view('v_pembayaran',$data);
            $this->load->view('footer');
    }




    function hitung(){
        //$harga=$_POST['harga'];
                       // $bayar=$_POST['bayar'];
                        //$hasil = $harga-$bayar;
        $harga = $this->input->post('harga');
        $bayar = $this->input->post('bayar');
        $hasil = $harga-$bayar;

        
    }

     function edit_cash2($id=null){
        //$uri = $this->input->post('uri');
        $id_pembayaran = $this->input->post('id_pembayaran');
        $data = array(
                'status' => 'Lunas',
                'total_bayar'=>$this->input->post('total_bayar'),
                'tanggal_pembayaran' => date("Y/m/d") 
                //'jumlah' => $this->input->post('jumlah')
                );
        $this->m_cash->edit_cash2("pembayaran_event", "id_pembayaran", $id_pembayaran, $data);
        
        redirect('cash/laporan_filter');
    }


    function simpan_cash(){
        $a = '';
        $id_pembayaran=$this->m_cash->kode($a);

        $pendaftaran=$this->input->post('pendaftaran');
        $total_bayar=$this->input->post('total_bayar');

        $tanggal_pembayaran = date('Y/m/d');
        $status ='Lunas';
        $this->m_cash->simpan_cash($id_pembayaran,$pendaftaran,$total_bayar,$tanggal_pembayaran,$status);
        redirect('pembayaran');
    }
   


     function edit_cash(){
        $id_pembayaran=$this->input->get('id_pembayaran');
        $this->m_cash->edit_cash($id_pembayaran);
        redirect('pembayaran');
    }

   
function laporan_filter(){
    $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'LAPORAN TRANSAKSI EVENT 1',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        //$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
       /// $pdf->Cell(15,6,'ID',1,0);
        //$pdf->Cell(32,6,'Nama',1,0);
        //$pdf->Cell(25,6,'Alamat',1,0);
        //$pdf->Cell(25,6,'No Hp',1,0);
        //$pdf->Cell(20,6,'Harga',1,0);
        //$pdf->Cell(25,6,'Telp',1,1);
        $pdf->Cell(25,6,'Tgl Bayar',1,1);

        //$pdf->Cell(25,6,'Status',1,1);
        $pdf->SetFont('Arial','',10);
         // $dari = $this->input->post('dari1');
         // $sampai = $this->input->post('sampai1'); 

            $daftar = $this->input->post('pendaftaran'); 
         // $pdf->Cell(25,6,$dari,1,1);
           // $this->m_laporan->filter($dari, $sampai); 
                            
          $this->db->select('pendaftaran.Id_Pendaftaran ,pendaftaran.Nama_Pelanggan,pendaftaran.Alamat,pendaftaran.No_HP,pembayaran_event.total_bayar, pembayaran_event.tanggal_pembayaran,pembayaran_event.status,pembayaran_event.id_pembayaran');
    $this->db->from('pendaftaran');
    $this->db->join('pembayaran_event', 'pembayaran_event.pendaftaran=pendaftaran.Id_Pendaftaran');
    $this->db->where("Id_Pendaftaran='$daftar'");
    //$this->db->between('$dari' and '$post')
    $query = $this->db->get()->result();  
    //$query = $this->db->get()->result();  
    // return $query->result_array();  

        // $mahasiswa = $this->db->get('pembayaran_event')->result();
        foreach ($query as $row){
            //$pdf->Cell(20,6,$row->Id_Pendaftaran,1,0);
            //$pdf->Cell(32,6,$row->Nama_Pelanggan,1,0);
            //$pdf->Cell(25,6,$row->Alamat,1,0);
            //$pdf->Cell(25,6,$row->No_HP,1,0);
            //$pdf->Cell(20,6,$row->total_bayar,1,0);
             $pdf->Cell(20,6,$row->Nama_Pelanggan,1,0);
             // $pdf->Cell(20,6,$row->status,1,0); 
            // $pdf->Cell(25,6,$row->telp,1,1);
        }
         $pdf->Output("Laporan Transaksi Event","I");
    }





}

