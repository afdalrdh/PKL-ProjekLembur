<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Welcome extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->model('mymodel');
		$this->load->helper('tgl_indo');
		$this->load->library('Pdf');
		if($this->session->userdata('level')!="user"){
			redirect('login');
		}
  }

	public function index(){
		$data['nama']=$this->mymodel->getPemberiTugas();
		$data['kodeunik'] = $this->mymodel->buat_kode();
		$data['header'] = 'head';
		$data['content'] = 'user/read';
		$this->load->view('index',$data);
	}

	public function inbox(){
		$data['data_log']=$this->mymodel->getInbox()->result();
		$data['header'] = 'head';
		$data['content'] = 'user/v_inbox';
		$this->load->view('index',$data);
	}

	public function outbox(){
		$data['data_log']=$this->mymodel->getOutbox()->result();
		$data['header'] = 'head';
		$data['content'] = 'user/v_outbox';
		$this->load->view('index',$data);
	}

	public function prosesinbox(){			//SUBMIT DI MENU INBOX BUKAN DI DALAMNYA
		$waktu = date("Y-m-d h:i:s");
		foreach ($_POST['pilih'] as $id) {
			$mhs = $this->mymodel->GetUpdate("where id = '$id'");
			$data = array(
				$status = $mhs[0]['status'],
				$nama = $mhs[0]['nama'],
				$pemberi_tugas = $mhs[0]['pemberi_tugas']
			);

			if($status == '0'){					//CREATE
					$data_update2=array(
						'id' => $id,
						'akhirp' => $waktu
					);

					$data_insert3=array(
						'id' => $id,
						'nama' => $nama,
						'awalp' => $waktu,
						'status' => '2'
					);

					$where = array('id' => $id);
					$status = array('status' => '1');
					$status2 = array(
						'akhirp' => $waktu,
						'status' => '1'
					);

					$where2 = array(
						'id' => $id,
						'status' => '0'
					);
					$this->mymodel->UpdateData('datakaryawan',$status,$where);
					$this->mymodel->UpdateData('monitoring',$status2,$where2);
					$this->mymodel->UpdateData('tb_inbox',$status,$where);
					$this->mymodel->InsertData('monitoring',$data_insert3);
					echo "<script>alert('Data berhasil dikirim ke pemberi tugas');history.go(-1);";
					echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
			}

			if($status == '2'){					//DIKEMBALIKAN PEMTUG
				$data_update2=array(
					'akhirp' => $waktu,
					'status' => '5'
				);

				$data_insert3=array(
					'id' => $id,
					'nama' => $nama,
					'awalp' => $waktu,
					'status' => '2'
				);

				$where2 = array(
					'id' => $id,
					'status' => '2'
				);

				$where = array(
					'id' => $id,
					'status' => '4'
				);

				$where4 = array(
					'id' => $id,
					'status' => '3'
				);
				$status4 = array('status' => '30');
				$status = array('status' => '1');
				$status3 = array('status' => '3');
				$this->mymodel->UpdateData('datakaryawan',$status3,$where2);
				$this->mymodel->UpdateData('tb_inbox',$status,$where2);
				$this->mymodel->UpdateData('monitoring',$status4,$where4);
				$this->mymodel->UpdateData('monitoring',$data_update2,$where);
				$this->mymodel->InsertData('monitoring',$data_insert3);


				echo "<script>alert('Data berhasil dikirim ke pemberi tugas');history.go(-1);";
				echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
			}

		}
		$data['data_log']=$this->mymodel->getInbox()->result();
		$data['header'] = 'head';
		$data['content'] = 'user/v_inbox';
		$this->load->view('index',$data);

	}

	public function edit_data($id){

		$mhs = $this->mymodel->GetUpdate("where id = '$id'");
		$data = array(
		$status = $mhs[0]['status'],
		);

		if($status == '0'){		//TAMPILAN INBOX KETIKA SIMPAN PERTAMAKALI
		$mhd = $this->mymodel->GetMonitoring1("where id = '$id' AND status = '0'");
		$data = array(
			"id" => $mhs[0]['id'],
			"nama" => $mhs[0]['nama'],
			"nik" => $mhs[0]['nik'],
			"divisi" => $mhs[0]['divisi'],
			"lokasi" => $mhs[0]['lokasi'],
			"tgl" => $mhs[0]['tgl'],
			"dari_jam" => $mhs[0]['dari_jam'],
			"sampai_jam" => $mhs[0]['sampai_jam'],
			"jam" => $mhs[0]['jam'],
			"agenda_lembur" => $mhs[0]['agenda_lembur'],
			"pemberi_tugas" => $mhs[0]['pemberi_tugas'],
			$keterangan = $mhd[0]['ket']
		);

			$data['keterangan'] = $keterangan;
			$data['pemberi'] = $this->mymodel->getPemberiTugas();
			$data['header'] = 'head';
			$data['content'] = 'user/update';
			$this->load->view('index',$data);
		}

		if($status == '2'){		//TAMPILAN INBOX SAAT DIKEMBALIKAN PEMTUG
			$mhd = $this->mymodel->GetMonitoring1("where id = '$id' AND status = '4'");
			$mhp = $this->mymodel->GetUpdate6("b.id = '$id' AND a.id = '$id'");
			$data = array(
				"id" => $mhs[0]['id'],
				"nama" => $mhs[0]['nama'],
				"nik" => $mhs[0]['nik'],
				"divisi" => $mhs[0]['divisi'],
				"lokasi" => $mhs[0]['lokasi'],
				"tgl" => $mhs[0]['tgl'],
				"dari_jam" => $mhs[0]['dari_jam'],
				"sampai_jam" => $mhs[0]['sampai_jam'],
				"jam" => $mhs[0]['jam'],
				"agenda_lembur" => $mhs[0]['agenda_lembur'],
				"pemberi_tugas" => $mhs[0]['pemberi_tugas'],
				"keterangan" => $mhd[0]['ket'],
				"keterangan2" => $mhp[0]['ket']
			);
			$data['pemberi']=$this->mymodel->getPemberiTugas();
			$data['header'] = 'head';
			$data['content'] = 'user/update2';
			$this->load->view('index',$data);
		}
	}

	public function proses_edit(){	//SUBMIT LEMBUR PERTAMA KALI

		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$nik = $_POST['nik'];
		$divisi = $_POST['divisi'];
		$lokasi = $_POST['lokasi'];
		$tgl = $_POST['input_dtp_icon'];
		$dari_jam = $_POST['time_now'];
		$sampai_jam = $_POST['time_then'];
		$agenda_lembur = $_POST['agenda'];
		$pemberi_tugas = $_POST['penugas'];
		$keterangan = $_POST['keterangan'];
		$waktu = date("Y-m-d h:i:s");
		$diff_value = $_POST['diff_value'];

		$data_update=array(
			'id' => $id,
			'nama' => $nama,
			'nik' => $nik,
			'divisi' => $divisi,
			'lokasi' => $lokasi,
			'tgl' => $tgl,
			'dari_jam' => $dari_jam,
			'sampai_jam' => $sampai_jam,
			'agenda_lembur' => $agenda_lembur,
			'pemberi_tugas' => $pemberi_tugas,
			'jam' => $diff_value
		);

		$data_update2=array(
			'ket' => $keterangan,
			'akhirp' => $waktu,
			'status' => '1'
		);

		$data_update3=array(
			'id' => $id,
			'ket' => $keterangan
		);

		$data_insert3=array(
			'id' => $id,
			'nama' => $nama,
			'awalp' => $waktu,
			'status' => '2'
		);

		$where = array('id' => $id);
		$where2 = array(
			'id' => $id,
			'status' => '0'
		);
		$res=$this->mymodel->UpdateData('datakaryawan',$data_update,$where);

		if($this->input->post('btn') == "submit") {
			$status = array('status' => '1');
			$status2 = array('status' => '2');
			$this->mymodel->UpdateData('datakaryawan',$status,$where);
			$this->mymodel->UpdateData('monitoring',$data_update2,$where2);
			$this->mymodel->UpdateData('tb_inbox',$status,$where);
			$res3=$this->mymodel->InsertData('monitoring',$data_insert3);

			if ($res>=1){
				echo "<script>alert('Data berhasil dikirim ke pemberi tugas');history.go(-1);";
				echo "window.location.href = '" . base_url() . "welcome/index';</script>";
			}else{
				echo "Insert data gagal";
			}
		}

		elseif($this->input->post('btn') == "simpan") {
			$res=$this->mymodel->UpdateData('monitoring',$data_update3,$where2);
			if ($res>=1){
				echo "<script>alert('Data berhasil dirubah dan disimpan di inbox');";
				echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
			}else{
				echo "Insert data gagal";
			}
		}

		elseif($this->input->post('btn') == "hapus") {
			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'ket' => $keterangan,
				'waktu' => $waktu,
				'status' => '3'
			);

			$status = array(
				'status' => '13',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);

			$status2 = array('status' => '9');
			$status3 = array('status' => '1');
			$this->mymodel->UpdateData('datakaryawan',$status2,$where2);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->InsertData('tb_outbox',$data_insert3);
			$this->mymodel->UpdateData('tb_inbox',$status3,$where2);
			if ($res>=1){
				echo "<script>alert('Data berhasil dihapus dan disimpan di outbox');";
				echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
			}else{
				echo "Insert data gagal";
			}
		}
	}

		public function proses_edit2(){  //DIKEMBLIKAN PEMBERI TUGAS

			$id = $_POST['id'];
			$nama = $_POST['nama'];
			$nik = $_POST['nik'];
			$divisi = $_POST['divisi'];
			$lokasi = $_POST['lokasi'];
			$tgl = $_POST['input_dtp_icon'];
			$dari_jam = $_POST['time_now'];
			$sampai_jam = $_POST['time_then'];
			$agenda_lembur = $_POST['agenda'];
			$pemberi_tugas = $_POST['penugas'];
			$keterangan = $_POST['keterangan'];
			$waktu = date("Y-m-d h:i:s");
			$diff_value = $_POST['diff_value'];

			$data_update=array(
				'id' => $id,
				'nama' => $nama,
				'nik' => $nik,
				'divisi' => $divisi,
				'lokasi' => $lokasi,
				'tgl' => $tgl,
				'dari_jam' => $dari_jam,
				'sampai_jam' => $sampai_jam,
				'agenda_lembur' => $agenda_lembur,
				'pemberi_tugas' => $pemberi_tugas,
				'jam' => $diff_value
			);

			$data_insert=array(
				'id' => $id,
				'nama' => $pemberi_tugas,
				'waktu' => $waktu,
				'status' => '3'
			);

			$data_update2=array(
				'ket' => $keterangan,
				'akhirp' => $waktu,
				'status' => '5'
			);

			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'awalp' => $waktu,
				'status' => '2'
			);

			$where2 = array(
				'id' => $id,
				'status' => '2'
			);

			$where = array(
				'id' => $id,
				'status' => '4'
			);

			$res = $this->mymodel->UpdateData('datakaryawan',$data_update,$where2);

			if($this->input->post('btn') == "submit") {
				$status = array('status' => '1');
				$status3 = array('status' => '3');
				$where4 = array(
					'id' => $id,
					'status' => '3'
				);
				$status4 = array('status' => '30');
				$this->mymodel->UpdateData('datakaryawan',$status3,$where2);
				$this->mymodel->UpdateData('tb_inbox',$status,$where2);
				$this->mymodel->UpdateData('monitoring',$status4,$where4);
				$this->mymodel->UpdateData('monitoring',$data_update2,$where);
				$this->mymodel->InsertData('monitoring',$data_insert3);

				if ($res>=1){
					echo "<script>alert('Data berhasil dikirim ke pemberi tugas');history.go(-1);";
					echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
				}else{
					echo "Insert data gagal";
				}
			}

			elseif($this->input->post('btn') == "simpan") {
				$this->mymodel->UpdateData('monitoring',array('ket' => $keterangan),$where);
				if ($res>=1){
					echo "<script>alert('Data berhasil dirubah dan disimpan di inbox');";
					echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
				}else{
					echo "Insert data gagal";
				}
			}

			elseif($this->input->post('btn') == "hapus") {
				$data_insert3=array(
					'id' => $id,
					'nama' => $nama,
					'ket' => $keterangan,
					'waktu' => $waktu,
					'status' => '3'
				);

				$status = array(
					'status' => '13',
					'akhirp' => $waktu,
					'ket' => $keterangan
				);

				$status2 = array('status' => '9');
				$status3 = array('status' => '1');
				$this->mymodel->UpdateData('datakaryawan',$status2,$where2);
				$this->mymodel->UpdateData('monitoring',$status,$where);
				$this->mymodel->InsertData('tb_outbox',$data_insert3);
				$this->mymodel->UpdateData('tb_inbox',$status3,$where2);
				if ($res>=1){
					echo "<script>alert('Data berhasil dihapus dan disimpan di outbox');";
					echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
				}else{
					echo "Insert data gagal";
				}
			}
		}

		public function proses_edit3(){  //DIKEMBLIKAN ATASAN

			$mhs = $this->mymodel->GetNamaAtasan();
			$data = array(
				$namaatasan = $mhs[0]['nama']
			);
			$atasan = $this->mymodel->GetNamaAtasan();
			$id = $_POST['id'];
			$nama = $_POST['nama'];
			$nik = $_POST['nik'];
			$divisi = $_POST['divisi'];
			$lokasi = $_POST['lokasi'];
			$tgl = $_POST['input_dtp_icon'];
			$dari_jam = $_POST['input_dtp_jam'];
			$sampai_jam = $_POST['input_dtp_jam2'];
			$agenda_lembur = $_POST['agenda'];
			$pemberi_tugas = $_POST['penugas'];
			$keterangan = $_POST['keterangan'];
			$waktu = date("Y-m-d h:i:s");

			$data_update=array(
				'id' => $id,
				'nama' => $nama,
				'nik' => $nik,
				'divisi' => $divisi,
				'lokasi' => $lokasi,
				'tgl' => $tgl,
				'dari_jam' => $dari_jam,
				'sampai_jam' => $sampai_jam,
				'agenda_lembur' => $agenda_lembur,
				'pemberi_tugas' => $pemberi_tugas
			);

			$data_insert=array(
				'id' => $id,
				'nama' => $namaatasan,
				'waktu' => $waktu,
				'status' => '6'
			);

			$data_insert2=array(
				'ket' => $keterangan,
				'akhirp' => $waktu,
				'status' => '10'
			);

			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'awalp' => $waktu,
				'status' => '7'
			);

			$where2 = array(
				'id' => $id,
				'status' => '5'
			);

			$where = array(
				'id' => $id,
				'status' => '9'
			);
			$res = $this->mymodel->UpdateData('datakaryawan',$data_update,$where2);

			if($this->input->post('btn') == "submit") {
				$status = array('status' => '1');
				$status3 = array('status' => '6');
				$this->mymodel->UpdateData('datakaryawan',$status3,$where2);
				$this->mymodel->UpdateData('tb_inbox',$status,$where2);
				$this->mymodel->InsertData('tb_inbox',$data_insert);
				$this->mymodel->UpdateData('monitoring',$data_insert2,$where);
				$this->mymodel->InsertData('monitoring',$data_insert3);

				if ($res>=1){
					echo "<script>alert('Data berhasil dikirim ke atasan');history.go(-1);";
					echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
				}else{
					echo "Insert data gagal";
				}
			}

			elseif($this->input->post('btn') == "simpan") {
				$this->mymodel->UpdateData('monitoring',array('ket' => $keterangan),$where);
				if ($res>=1){
					echo "<script>alert('Data berhasil dirubah dan disimpan di inbox');";
					echo "window.location.href = '" . base_url() . "welcome/inbox';</script>";
				}else{
					echo "Insert data gagal";
				}
			}
		}

	public function approval(){
		$data['query'] = $this->mymodel->myjoin();
		$data['header'] = 'head';
		$data['content'] = 'user/v_approval';
		$this->load->view('index',$data);
	}

	public function pilihapprove($id){
		$mhq = $this->mymodel->GetUpdate("where id = '$id'");
		$data = array(
		$status = $mhq[0]['status'],
		);

		if($status == '1'){
			$mhs = $this->mymodel->GetUpdate("where id = '$id'");
			$mhp = $this->mymodel->GetUpdate2("b.id = '$id' AND a.id = '$id'");
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
				$jam = $mhs[0]['jam'],
				"keterangan2" => $mhp[0]['ket']
			);
			$floatval = (float) preg_replace('/^(\d+).+/','\1.\2',$jam);
			$data['jamnya'] = intval($floatval);
			$data['header'] = 'head';
			$data['content'] = 'user/approve';
			$this->load->view('index',$data);
		}

		if($status == '3'){
			$mhs = $this->mymodel->GetUpdate("where id = '$id'");
			$mhp = $this->mymodel->GetUpdate7("b.id = '$id' AND a.id = '$id'");
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
				$jam = $mhs[0]['jam'],
				"keterangan2" => $mhp[0]['ket']
			);
			$floatval = (float) preg_replace('/^(\d+).+/','\1.\2',$jam);
			$data['jamnya'] = intval($floatval);
			$data['header'] = 'head';
			$data['content'] = 'user/approve';
			$this->load->view('index',$data);
		}

		elseif ($status == '5') {
			$mhs = $this->mymodel->GetUpdate("where id = '$id'");
			$mhp = $this->mymodel->GetUpdate3("b.id = '$id' AND a.id = '$id'");
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
				$jam = $mhs[0]['jam'],
				"keterangan2" => $mhp[0]['ket']
			);
			$floatval = (float) preg_replace('/^(\d+).+/','\1.\2',$jam);
			$data['jamnya'] = intval($floatval);
			$data['header'] = 'head';
			$data['content'] = 'user/approve2';
			$this->load->view('index',$data);
		}
	}

	public function prosesapproval(){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$keterangan = $_POST['keterangan'];
		$waktu = date("Y-m-d h:i:s");

		$data_insert2=array(
			'id' => $id,
			'nama' => $nama,
			'waktu' => $waktu,
			'status' => '2'
		);

		$where2 = array(
			'id' => $id,
			'status' => '2'
		);

		$where3 = array(
			'id' => $id,
			'status' => '3'
		);

		$status3 = array('status' => '1');
		$where = array('id' => $id);

		if($this->input->post('btn') == "approve"){
			$status = array('status' => '4');
			$status2 = array(
				'status' => '6',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);

			$data_insert=array(
				'id' => $id,
				'nama' => $nama,
				'awalp' => $waktu,
				'status' => '7'
			);
			$this->mymodel->UpdateData('datakaryawan',$status,$where);
			$this->mymodel->UpdateData('monitoring',$status2,$where2);
			$this->mymodel->UpdateData('tb_inbox',$status3,$where3);
			$this->mymodel->InsertData('monitoring',$data_insert);

			echo "<script>alert('Data berhasil dikirim ke atasan');history.go(-1);";
			echo "window.location.href = '" . base_url() . "welcome/approval';</script>";
		}

		elseif($this->input->post('btn') == "dikembalikan"){
			$status = array(
				'status' => '3',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);
			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'awalp' => $waktu,
				'status' => '4'
			);
			$where4 = array(
				'id' => $id,
				'status' => '5'
			);
			$status2 = array('status' => '2');
			$status4 = array('status' => '50');
			$this->mymodel->UpdateData('datakaryawan',$status2,$where);
			$this->mymodel->UpdateData('monitoring',$status4,$where4);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->InsertData('monitoring',$data_insert3);
			$this->mymodel->InsertData('tb_inbox',$data_insert2);
			$this->mymodel->UpdateData('tb_inbox',$status3,$where3);

			echo "<script>alert('Data berhasil dikembalikan');history.go(-1);";
			echo "window.location.href = '" . base_url() . "welcome/index';</script>";
		}

		elseif ($this->input->post('btn') == "reject") {
			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'ket' => $keterangan,
				'waktu' => $waktu,
				'status' => '1'
			);

			$status = array(
				'status' => '12',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);

			$status2 = array('status' => '8');
			$this->mymodel->UpdateData('datakaryawan',$status2,$where);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->InsertData('tb_outbox',$data_insert3);
			$this->mymodel->UpdateData('tb_inbox',$status3,$where3);

			echo "<script>alert('Data berhasil direject');history.go(-1);";
			echo "window.location.href = '" . base_url() . "welcome/index';</script>";
		}
	}

	public function prosesapproval2(){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$keterangan = $_POST['keterangan'];
		$waktu = date("Y-m-d h:i:s");

		$data_insert2=array(
			'id' => $id,
			'nama' => $nama,
			'waktu' => $waktu,
			'status' => '2'
		);

		$where2 = array(
			'id' => $id,
			'status' => '9'
		);

		$where3 = array(
			'id' => $id,
			'status' => '3'
		);

		$status3 = array('status' => '1');
		$where = array(
			'id' => $id,
			'status' => '5'
		);

		if($this->input->post('btn') == "approve"){
			$status = array('status' => '6');
			$status2 = array(
				'akhirp' => $waktu,
				'ket' => $keterangan,
				'status' => '10'
			);

			$data_insert=array(
				'id' => $id,
				'nama' => $nama,
				'awalp' => $waktu,
				'status' => '7'
			);

			$where4 = array(
				'id' => $id,
				'status' => '8'
			);
			$status4 = array('status' => '80');

			$this->mymodel->UpdateData('datakaryawan',$status,$where);
			$this->mymodel->UpdateData('monitoring',$status2,$where2);
			$this->mymodel->UpdateData('monitoring',$status4,$where4);
			$this->mymodel->InsertData('monitoring',$data_insert);

			echo "<script>alert('Data berhasil dikirim ke atasan');history.go(-1);";
			echo "window.location.href = '" . base_url() . "welcome/approval';</script>";
		}

		elseif($this->input->post('btn') == "dikembalikan"){
			$status = array(
				'status' => '3',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);
			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'awalp' => $waktu,
				'status' => '4'
			);
			$status2 = array('status' => '2');
			$this->mymodel->UpdateData('datakaryawan',$status2,$where);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->InsertData('monitoring',$data_insert3);
			$this->mymodel->InsertData('tb_inbox',$data_insert2);
			$this->mymodel->UpdateData('tb_inbox',$status3,$where3);

			echo "<script>alert('Data berhasil dikembalikan');history.go(-1);";
			echo "window.location.href = '" . base_url() . "welcome/index';</script>";
		}

		elseif ($this->input->post('btn') == "reject") {
			$data_insert3=array(
				'id' => $id,
				'nama' => $nama,
				'ket' => $keterangan,
				'waktu' => $waktu,
				'status' => '1'
			);

			$status = array(
				'status' => '12',
				'akhirp' => $waktu,
				'ket' => $keterangan
			);

			$status2 = array('status' => '8');
			$this->mymodel->UpdateData('datakaryawan',$status2,$where);
			$this->mymodel->UpdateData('monitoring',$status,$where2);
			$this->mymodel->InsertData('tb_outbox',$data_insert3);
			$this->mymodel->UpdateData('tb_inbox',$status3,$where3);

			echo "<script>alert('Data berhasil direject');history.go(-1);";
			echo "window.location.href = '" . base_url() . "welcome/index';</script>";
		}
	}

	public function rekap(){
		$data['header'] = 'head';
		$data['content'] = 'user/v_rekap';
		$this->load->view('index',$data);
	}

	public function monitoring(){
			$data['data_log'] = $this->mymodel->GetDataMonitoring()->result();
			$data['data_log2'] = $this->mymodel->GetMonitoring()->result();
			$data['header'] = 'head';
			$data['content'] = 'user/v_monitoring';
			$this->load->view('index',$data);
	}

	public function save(){

		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$nik = $_POST['nik'];
		$divisi = $_POST['divisi'];
		$lokasi = $_POST['lokasi'];
		$tgl = $_POST['input_dtp_icon'];
		$dari_jam = $_POST['time_now'];
		$sampai_jam = $_POST['time_then'];
		$agenda_lembur = $_POST['agenda'];
		$pemberi_tugas = $_POST['penugas'];
		$keterangan = $_POST['keterangan'];
		$diff_value = $_POST['diff_value'];
		$waktu = date("Y-m-d h:i:s");

		$data_insert=array(
			'id' => $id,
			'nama' => $nama,
			'nik' => $nik,
			'divisi' => $divisi,
			'lokasi' => $lokasi,
			'tgl' => $tgl,
			'dari_jam' => $dari_jam,
			'sampai_jam' => $sampai_jam,
			'agenda_lembur' => $agenda_lembur,
			'pemberi_tugas' => $pemberi_tugas,
			'jam' => $diff_value,
			'date' => $waktu
		);

		$data_insert2=array(
			'id' => $id,
			'nama' => $nama,
			'ket' => $keterangan,
			'awalp' => $waktu,
			'status' => '0'
		);

		$data_insert3=array(
			'id' => $id,
			'nama' => $nama,
			'waktu' => $waktu
		);

		$data_insert4=array(
			'akhirp' => $waktu,
			'status' => '1'
		);

		$data_insert5=array(
			'id' => $id,
			'nama' => $nama,
			'awalp' => $waktu,
			'status' => '2'
		);

			$res=$this->mymodel->InsertData('datakaryawan',$data_insert);
			$res2=$this->mymodel->InsertData('monitoring',$data_insert2);

		if($this->input->post('btn') == "submit") {
			$status = array('status' => '1');
			$where = array('id' => $id);
			$this->mymodel->UpdateData('datakaryawan',$status,$where);
			$this->mymodel->UpdateData('monitoring',$data_insert4,$where);
			$this->mymodel->InsertData('monitoring',$data_insert5);

			if ($res>=1){
				echo "<script>alert('Data berhasil dikirim ke pemberi tugas');history.go(-1);</script>";
			}else{
				echo "Insert data gagal";
			}
		}

		elseif($this->input->post('btn') == "simpan"){
			$res3=$this->mymodel->InsertData('tb_inbox',$data_insert3);
				if ($res2>=1){
					echo "<script>alert('Data berhasil disimpan ke inbox');history.go(-1);</script>";
				}else{
					echo "Simpan data gagal";
				}
		}

	}

	public function cetaknya(){
		$waktu = date("d-M-Y");
			foreach ($_POST['pilih'] as $id) {
				ob_start();
				$mhs = $this->mymodel->GetKategori("where id = '$id'");
				$mhd = $this->mymodel->GetNIK($id);
				$mha = $this->mymodel->GetAtasan($id);
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
					"atasan" => $mha[0]['nama']
				);
			}
					$this->load->view('print', $data);
					$html = ob_get_contents();
					ob_end_clean();

					require_once('./assets/html2pdf/html2pdf.class.php');
					$pdf = new HTML2PDF('P','A4','en');
					$pdf->WriteHTML($html);
					$pdf->Output('Data Siswa.pdf', 'D');
	}
}
