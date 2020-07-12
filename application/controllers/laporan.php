<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

  public function __construct(){
      parent::__construct();
      $this->load->model('mymodel');
  		$this->load->helper('tgl_indo');
  }

  public function index(){
      $data['data_log'] = $this->mymodel->GetCetak()->result();
  		$data['header'] = 'head';
  		$data['content'] = 'preview';
  		$this->load->view('index',$data);
  }

  public function admin(){
      $data['data_log'] = $this->mymodel->GetKaryawan()->result();
  		$data['header'] = 'head';
  		$data['content'] = 'preview2';
  		$this->load->view('index',$data);
  }

  public function cetak(){
    $waktu = date("d-M-Y");
      foreach ($_POST['pilih'] as $id) {
        $mhs = $this->mymodel->GetKategori("where id = '$id'");
        $mhd = $this->mymodel->GetNIK($id);
        $mha = $this->mymodel->GetAtasan($id);
        $mht = $this->mymodel->GetTTD($id);
        $data = array(
          "nama" => $mhs[0]['nama'],
          "nik" => $mhs[0]['nik'],
          "divisi" => $mhs[0]['divisi'],
          "lokasi" => $mhs[0]['lokasi'],
          "dari_jam" => $mhs[0]['dari_jam'],
          "sampai_jam" => $mhs[0]['sampai_jam'],
          "hari" => $mhs[0]['tgl'],
          "agenda_lembur" => $mhs[0]['agenda_lembur'],
          "pemberi_tugas" => $mhs[0]['pemberi_tugas'],
          "nik2" => $mhd[0]['nik'],
          "nik3" => $mha[0]['nik'],
          "atasan" => $mha[0]['nama'],
          "gambar1" => $mha[0]['nik'],
          "gambar2" => $mhd[0]['nik'],
          "gambar3" => $mht[0]['nik']
        );
      }
      ob_start();
      $this->load->view('print', $data);
      $html = ob_get_contents();
      ob_end_clean();

      require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(20, 10, 20, 0));
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan pelaksanaan lembur.pdf', 'D');
  }

  public function cetak2(){
    $waktu = date("d-M-Y");
      foreach ($_POST['pilih'] as $id) {
        $mhs = $this->mymodel->GetKategori("where id = '$id'");
        $mhd = $this->mymodel->GetNIK($id);
        $mha = $this->mymodel->GetAtasan($id);
        $mht = $this->mymodel->GetTDAdmin($id);
        $data = array(
          "nama" => $mhs[0]['nama'],
          "nik" => $mhs[0]['nik'],
          "divisi" => $mhs[0]['divisi'],
          "lokasi" => $mhs[0]['lokasi'],
          "dari_jam" => $mhs[0]['dari_jam'],
          "sampai_jam" => $mhs[0]['sampai_jam'],
          "hari" => $mhs[0]['tgl'],
          "agenda_lembur" => $mhs[0]['agenda_lembur'],
          "pemberi_tugas" => $mhs[0]['pemberi_tugas'],
          "nik2" => $mhd[0]['nik'],
          "nik3" => $mha[0]['nik'],
          "atasan" => $mha[0]['nama'],
          "gambar1" => $mha[0]['nik'],
          "gambar2" => $mhd[0]['nik'],
          "gambar3" => $mht[0]['nik']
        );
      }
      ob_start();
      $this->load->view('print', $data);
      $html = ob_get_contents();
      ob_end_clean();

      require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(20, 10, 20, 0));
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan pelaksanaan lembur.pdf', 'D');
  }
}
