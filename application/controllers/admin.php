<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->model('mymodel');
		$this->load->helper('tgl_indo');
		if($this->session->userdata('level')!="admin"){
			redirect('login');
		}
	  }
	  
	
	public function tambah(){
		$data['header'] = 'head';
		$data['content'] = 'admin/tambah';
		$this->load->view('index',$data);
	}

	public function index(){
		$waktu = date("Y-m-d");
    	$data['query'] = $this->mymodel->myjoinAdmin();
		$mhp = $this->mymodel->DashboardPending();
		$mhv = $this->mymodel->DashboardApprove();
		$mhr = $this->mymodel->DashboardReject();
		$mhs = $this->mymodel->DashboardSimpan();
		$mha = $this->mymodel->DashboardPengajuan();
		$mhw = $this->mymodel->DashboardWaktu();
		$mhi = $this->mymodel->DashboardPegawai();
		$data= array(
			'pending' => $mhp[0]['pending'],
			'approve' => $mhv[0]['approve'],
			'reject' => $mhr[0]['reject'],
			'simpan' => $mhs[0]['simpan'],
			'ajuan' => $mha[0]['ajuan'],
			'waktu' => $mhw[0]['waktu'],
			'namanya' => $mhi[0]['nama'],
			'maxjam' => $mhi[0]['maxjam']
		);
		$data['data_log2'] = $this->mymodel->GetDashboardKaryawan()->result();
		$data['header'] = 'head';
		$data['content'] = 'admin/v_dashboard';
		$this->load->view('index',$data);
	}

	public function index2(){
		$waktu = date("Y-m-d");
    $data['query'] = $this->mymodel->myjoinAdmin();
		$mhp = $this->mymodel->DashboardPending(" AND YEARWEEK(date) = YEARWEEK('$waktu')");
		$mhv = $this->mymodel->DashboardApprove(" AND YEARWEEK(date) = YEARWEEK('$waktu')");
		$mhr = $this->mymodel->DashboardReject(" AND YEARWEEK(date) = YEARWEEK('$waktu')");
		$mhs = $this->mymodel->DashboardSimpan(" AND YEARWEEK(date) = YEARWEEK('$waktu')");
		$mha = $this->mymodel->DashboardPengajuan(" AND YEARWEEK(date) = YEARWEEK('$waktu')");
		$mhw = $this->mymodel->DashboardWaktu();
		$mhi = $this->mymodel->DashboardPegawai();
		$data= array(
			'pending' => $mhp[0]['pending'],
			'approve' => $mhv[0]['approve'],
			'reject' => $mhr[0]['reject'],
			'simpan' => $mhs[0]['simpan'],
			'ajuan' => $mha[0]['ajuan'],
			'waktu' => $mhw[0]['waktu'],
			'namanya' => $mhi[0]['nama'],
			'maxjam' => $mhi[0]['maxjam']
		);
		$data['data_log2'] = $this->mymodel->GetDashboardKaryawan()->result();
		$data['header'] = 'head';
		$data['content'] = 'admin/v_dashboard';
		$this->load->view('index',$data);
	}

	public function index3(){
		$waktu = date("Y-m-d");
    $data['query'] = $this->mymodel->myjoinAdmin();
		$mhp = $this->mymodel->DashboardPending(" AND MONTH(date) = MONTH('$waktu')");
		$mhv = $this->mymodel->DashboardApprove(" AND MONTH(date) = MONTH('$waktu')");
		$mhr = $this->mymodel->DashboardReject(" AND MONTH(date) = MONTH('$waktu')");
		$mhs = $this->mymodel->DashboardSimpan(" AND MONTH(date) = MONTH('$waktu')");
		$mha = $this->mymodel->DashboardPengajuan(" AND MONTH(date) = MONTH('$waktu')");
		$mhw = $this->mymodel->DashboardWaktu();
		$mhi = $this->mymodel->DashboardPegawai();
		$data= array(
			'pending' => $mhp[0]['pending'],
			'approve' => $mhv[0]['approve'],
			'reject' => $mhr[0]['reject'],
			'simpan' => $mhs[0]['simpan'],
			'ajuan' => $mha[0]['ajuan'],
			'waktu' => $mhw[0]['waktu'],
			'namanya' => $mhi[0]['nama'],
			'maxjam' => $mhi[0]['maxjam']
		);
		$data['data_log2'] = $this->mymodel->GetDashboardKaryawan()->result();
		$data['header'] = 'head';
		$data['content'] = 'admin/v_dashboard';
		$this->load->view('index',$data);
	}

	public function index4(){
		$waktu = date("Y-m-d");
    $data['query'] = $this->mymodel->myjoinAdmin();
		$mhp = $this->mymodel->DashboardPending(" AND YEAR(date) = YEAR('$waktu')");
		$mhv = $this->mymodel->DashboardApprove(" AND YEAR(date) = YEAR('$waktu')");
		$mhr = $this->mymodel->DashboardReject(" AND YEAR(date) = YEAR('$waktu')");
		$mhs = $this->mymodel->DashboardSimpan(" AND YEAR(date) = YEAR('$waktu')");
		$mha = $this->mymodel->DashboardPengajuan(" AND YEAR(date) = YEAR('$waktu')");
		$mhw = $this->mymodel->DashboardWaktu();
		$mhi = $this->mymodel->DashboardPegawai();
		$data= array(
			'pending' => $mhp[0]['pending'],
			'approve' => $mhv[0]['approve'],
			'reject' => $mhr[0]['reject'],
			'simpan' => $mhs[0]['simpan'],
			'ajuan' => $mha[0]['ajuan'],
			'waktu' => $mhw[0]['waktu'],
			'namanya' => $mhi[0]['nama'],
			'maxjam' => $mhi[0]['maxjam']
		);
		$data['data_log2'] = $this->mymodel->GetDashboardKaryawan()->result();
		$data['header'] = 'head';
		$data['content'] = 'admin/v_dashboard';
		$this->load->view('index',$data);
	}

	public function dkaryawan(){
		$data['data_log'] = $this->mymodel->GetDKaryawan()->result();
		$data['data_log2'] = $this->mymodel->GetDKaryawan2()->result();
		$data['query'] = $this->mymodel->myjoin();
		$data['header'] = 'head';
		$data['content'] = 'admin/v_data_karyawan';
		$this->load->view('index',$data);
	}

	public function dkeuangan(){
		$data['data_log'] = $this->mymodel->GetDKeuangan()->result();
		$data['data_log2'] = $this->mymodel->GetDKeuangan2()->result();
		$data['query'] = $this->mymodel->myjoin();
		$data['header'] = 'head';
		$data['content'] = 'admin/v_keuangan';
		$this->load->view('index',$data);
	}

	public function approval(){
    $data['query'] = $this->mymodel->myjoinAdmin();
		$data['header'] = 'head';
		$data['content'] = 'admin/v_approval';
		$this->load->view('index',$data);
	}

	public function pilihapprove($id){
		$mhq = $this->mymodel->GetUpdate("where id = '$id'");
		$data = array(
		$status = $mhq[0]['status'],
		);
		if($status == '4'){
			$mhs = $this->mymodel->GetUpdate("where id = '$id'");
			$mhp = $this->mymodel->GetUpdate4("b.id = '$id' AND a.id = '$id'");
			$data = array(
				"id" => $mhs[0]['id'],
				"nama" => $mhs[0]['nama'],
				"nik" => $mhs[0]['nik'],
				"divisi" => $mhs[0]['divisi'],
				"lokasi" => $mhs[0]['lokasi'],
				"tgl" => $mhs[0]['tgl'],
				"dari_jam" => $mhs[0]['dari_jam'],
				"sampai_jam" => $mhs[0]['sampai_jam'],
				"agenda_lembur" => $mhs[0]['agenda_lembur'],
				"pemberi_tugas" => $mhs[0]['pemberi_tugas'],
				$tglnya = $mhs[0]['tgl'],
				$jam = $mhs[0]['jam'],
				$nama = $mhs[0]['nama'],
				$mhd = $this->mymodel->Duiddei("where nama = '$nama'"),
				"jamtot" => $mhd[0]['jam'],
				"keterangan2" => $mhp[0]['ket']
			);

			$floatval = (float) preg_replace('/^(\d+).+/','\1.\2',$jam);

			//LIBUR X2
			function isWeekend($date) {
			    return (date('N', strtotime($date)) >= 6);
			}
			if(isWeekend($tglnya)=='1'){
				$jamtots = intval($floatval)*2;
			}
			else{
				$jamtots = intval($floatval);
			}

			$data['format_waktu'] = $jamtots;
			$data['header'] = 'head';
			$data['content'] = 'admin/approve';
			$this->load->view('index',$data);
		}

		elseif ($status == '6') {
			$mhs = $this->mymodel->GetUpdate("where id = '$id'");
			$mhp = $this->mymodel->GetUpdate5("b.id = '$id' AND a.id = '$id'");
			$data = array(
				"id" => $mhs[0]['id'],
				"nama" => $mhs[0]['nama'],
				"nik" => $mhs[0]['nik'],
				"divisi" => $mhs[0]['divisi'],
				"lokasi" => $mhs[0]['lokasi'],
				"tgl" => $mhs[0]['tgl'],
				"dari_jam" => $mhs[0]['dari_jam'],
				"sampai_jam" => $mhs[0]['sampai_jam'],
				"agenda_lembur" => $mhs[0]['agenda_lembur'],
				"pemberi_tugas" => $mhs[0]['pemberi_tugas'],
				$tglnya = $mhs[0]['tgl'],
				$jam = $mhs[0]['jam'],
				$nama = $mhs[0]['nama'],
				$mhd = $this->mymodel->Duiddei("where nama = '$nama'"),
				"jamtot" => $mhd[0]['jam'],
				"keterangan2" => $mhp[0]['ket']
			);
			$floatval = (float) preg_replace('/^(\d+).+/','\1.\2',$jam);

			//LIBUR X2
			function isWeekend($date) {
			    return (date('N', strtotime($date)) >= 6);
			}
			if(isWeekend($tglnya)=='1'){
				$jamtots = intval($floatval)*2;
			}
			else{
				$jamtots = intval($floatval);
			}

			$data['format_waktu'] = intval($floatval);
			$data['header'] = 'head';
			$data['content'] = 'admin/approve2';
			$this->load->view('index',$data);
		}
	}

	public function prosesapproval(){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$divisi = $_POST['divisi'];
		$keterangan = $_POST['keterangan'];
		$pemberi_tugas = $_POST['penugas'];
		$jamtot = $_POST['jamtot'];
		$jamonly = $_POST['jamonly'];
		$uangtot = $_POST['uangtot'];
		$waktu = date("Y-m-d h:i:s");

		$where2 = array(
			'id' => $id,
			'status' => '7'
		);

		$where3 = array(
			'id' => $id,
			'status' => '6'
		);

		$status3 = array('status' => '1');
		$where = array('id' => $id);

		if($this->input->post('btn') == "approve") {
			$status = array('status' => '7');
			$status2 = array(
				'status' => '11',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);
			$data_insert = array(
				'id' => $id,
				'nama' => $nama,
				'ket' => $keterangan,
				'waktu' => $waktu,
				'status' => '2'
			);
			$data_uang = array(
				'jam' => $jamtot
			);
			$data_uang_date = array(
				'id' => $id,
				'nama' => $nama,
				'divisi' => $divisi,
				'jam' => $jamonly,
				'date' => $waktu
			);
			$where_uang = array('nama' => $nama);

			$this->mymodel->UpdateData('datakaryawan',$status,$where);
			$this->mymodel->UpdateData('monitoring',$status2,$where2);
			$this->mymodel->InsertData('tb_outbox',$data_insert);
			$this->mymodel->UpdateData('tb_uang',$data_uang,$where_uang);
			$this->mymodel->InsertData('tb_uang_date',$data_uang_date);

			echo "<script>alert('Data berhasil diapprove');history.go(-1);";
			echo "window.location.href = '" . base_url() . "admin/index';</script>";
		}

		elseif($this->input->post('btn') == "dikembalikan"){
			$status = array(
				'status' => '8',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);

			$status4 = array(
				'id' => $id,
				'status' => '100'
			);

			$data_insert4=array(
				'id' => $id,
				'nama' => $nama,
				'awalp' => $waktu,
				'status' => '9'
			);

			$status3 = array('status' => '5');
			$where3 = array('id' => $id);
			$where4 = array(
				'id' => $id,
				'status' => '10'
			);

			$status5 = array('status' => '60');
			$where5 = array(
				'id' => $id,
				'status' => '6'
			);
			$this->mymodel->UpdateData('datakaryawan',$status3,$where3);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->UpdateData('monitoring',$status4,$where4);
			$this->mymodel->UpdateData('monitoring',$status5,$where5);
			$this->mymodel->InsertData('monitoring',$data_insert4);

			echo "<script>alert('Data berhasil dikembalikan ke pemberi tugas');history.go(-1);";
			echo "window.location.href = '" . base_url() . "admin/index';</script>";
		}

		elseif ($this->input->post('btn') == "reject") {
			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'ket' => $keterangan,
				'waktu' => $waktu,
				'status' => '11'
			);

			$status = array(
				'status' => '13',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);
			$status2 = array('status' => '8');
			$this->mymodel->UpdateData('datakaryawan',$status2,$where);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->InsertData('tb_outbox',$data_insert3);
			$this->mymodel->UpdateData('tb_inbox',$status3,$where3);

			echo "<script>alert('Data berhasil direject');history.go(-1);";
			echo "window.location.href = '" . base_url() . "admin/index';</script>";
		}
	}

	public function prosesapproval2(){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$divisi = $_POST['divisi'];
		$keterangan = $_POST['keterangan'];
		$pemberi_tugas = $_POST['penugas'];
		$jamtots = $_POST['jamtot'];
		$uangtot = $_POST['uangtot'];
		$waktu = date("Y-m-d h:i:s");

		$where3 = array(
			'id' => $id,
			'status' => '6'
		);

		$where2 = array(
			'id' => $id,
			'status' => '7'
		);

		$status3 = array('status' => '1');
		$where = array('id' => $id);

		if($this->input->post('btn') == "approve") {
			$status = array('status' => '7');
			$status2 = array(
				'status' => '11',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);
			$data_insert = array(
				'id' => $id,
				'nama' => $nama,
				'ket' => $keterangan,
				'waktu' => $waktu,
				'status' => '2'
			);
			$data_uang = array(
				'jam' => $jamtot
			);
			$data_uang_date = array(
				'id' => $id,
				'nama' => $nama,
				'divisi' => $divisi,
				'jam' => $jamonly,
				'date' => $waktu
			);
			$where_uang = array('nama' => $nama);

			$this->mymodel->UpdateData('datakaryawan',$status,$where);
			$this->mymodel->UpdateData('monitoring',$status2,$where2);
			$this->mymodel->InsertData('tb_outbox',$data_insert);
			$this->mymodel->UpdateData('tb_uang',$data_uang,$where_uang);
			$this->mymodel->InsertData('tb_uang_date',$data_uang_date);

			echo "<script>alert('Data berhasil diapprove');history.go(-1);";
			echo "window.location.href = '" . base_url() . "admin/index';</script>";
		}

		elseif($this->input->post('btn') == "dikembalikan"){
			$status = array(
				'status' => '8',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);

			$data_insert4=array(
				'id' => $id,
				'nama' => $nama,
				'awalp' => $waktu,
				'status' => '9'
			);

			$status3 = array('status' => '8');
			$where3 = array('id' => $id);
			$this->mymodel->UpdateData('datakaryawan',$status3,$where3);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->InsertData('monitoring',$data_insert4);

			echo "<script>alert('Data berhasil dikembalikan ke pemberi tugas');history.go(-1);";
			echo "window.location.href = '" . base_url() . "admin/index';</script>";
		}

		elseif ($this->input->post('btn') == "reject") {
			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'ket' => $keterangan,
				'waktu' => $waktu,
				'status' => '11'
			);

			$status = array(
				'status' => '13',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);
			$status2 = array('status' => '8');
			$this->mymodel->UpdateData('datakaryawan',$status2,$where);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->InsertData('tb_outbox',$data_insert3);
			$this->mymodel->UpdateData('tb_inbox',$status3,$where3);

			echo "<script>alert('Data berhasil direject');history.go(-1);";
			echo "window.location.href = '" . base_url() . "admin/index';</script>";
		}
	}

	public function edit_data($id){
		$mhs = $this->mymodel->GetUpdate("where id = '$id'");
		$mhd = $this->mymodel->GetMonitoring1("where id = '$id'");
		$mhn = $this->mymodel->GetInboxUpdate("where id = '$id'");
		$data = array(
			"id" => $mhs[0]['id'],
			"nama" => $mhs[0]['nama'],
			"nik" => $mhs[0]['nik'],
			"divisi" => $mhs[0]['divisi'],
			"lokasi" => $mhs[0]['lokasi'],
			"tgl" => $mhs[0]['tgl'],
			"dari_jam" => $mhs[0]['dari_jam'],
			"sampai_jam" => $mhs[0]['sampai_jam'],
			"agenda_lembur" => $mhs[0]['agenda_lembur'],
			"pemberi_tugas" => $mhs[0]['pemberi_tugas'],
			"keterangan" => $mhd[0]['ket'],
			$status = $mhs[0]['status']
		);

		if($status == '6'){
			$data['pemberi']=$this->mymodel->getPemberiTugas();
			$data['header'] = 'head';
			$data['content'] = 'admin/approve';
			$this->load->view('index',$data);
		}
	}

	public function cetak(){
		$data['data_log'] = $this->mymodel->GetKaryawan()->result();
		$data['data_log2'] = $this->mymodel->GetMonitoring()->result();
		$data['header'] = 'head';
		$data['content'] = 'admin/preview2';
		$this->load->view('index',$data);
	}

	public function rekap(){
		$data['header'] = 'head';
		$data['content'] = 'admin/v_rekap';
		$this->load->view('index',$data);
	}

	public function monitoring(){
			$data['data_log'] = $this->mymodel->GetDataMonitoring2()->result();
			$data['data_log2'] = $this->mymodel->GetMonitoring2()->result();
			$data['header'] = 'head';
			$data['content'] = 'admin/v_monitoring';
			$this->load->view('index',$data);
	}

	public function uang(){
			$mhw = $this->mymodel->TotalUang();
			$data = array(
				"uangtot" => $mhw[0]['uangtot']
			);
			$data['query'] = $this->mymodel->GetDataUang()->result();
			$data['header'] = 'head';
			$data['content'] = 'admin/v_uang';
			$this->load->view('index',$data);
	}

	public function prosesuang(){
			foreach ($_POST['data-changer'] as $id) {
				$mhd = $this->mymodel->GetUangnya("where id = '$id'");
				$data = array(
					$jamnye=$mhd[0]['jam']
				);
				$uangtot = intval($_POST['gajinya']);
				$tot=$uangtot*$jamnye;
				$data_update=array(
					'uang' => $tot,
				);

				$where = array('id' => $id);
				$this->mymodel->UpdateData('tb_uang',$data_update,$where);

				echo "<script>alert('Data berhasil dimasukkan');history.go(-1);";
				echo "window.location.href = '" . base_url() . "admin/index';</script>";
			}
	}
}
