<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {

	public function ApprovePemberiTugas($id){
		$hasil=$this->db->query("UPDATE datakaryawan SET status='1' WHERE id='$id'");
    return $hasil;
	}

	public function KembalikanPemberiTugas($id){
		$hasil=$this->db->query("UPDATE datakaryawan SET status='3' WHERE id='$id'");
    return $hasil;
	}

	public function KembalikanPimpinan($id){
		$hasil=$this->db->query("UPDATE datakaryawan SET status='3' WHERE id='$id'");
    return $hasil;
	}

	public function RejectPemberiTugas($id){
		$hasil=$this->db->query("UPDATE datakaryawan SET status='4' WHERE id='$id'");
    return $hasil;
	}

	public function ApprovePimpinan($id){
		$hasil=$this->db->query("UPDATE datakaryawan SET status='2' WHERE id='$id'");
    return $hasil;
	}

	public function GetCetak(){
		$this->db->select("a.dari_jam,a.sampai_jam,a.tgl,a.agenda_lembur,a.pemberi_tugas,a.id,a.date");
		$this->db->from("datakaryawan a");
		$this->db->join("biodata_karyawan b","b.nama = a.nama","left");
		$this->db->where("b.inisial",$this->session->userdata('inisial'));
		$this->db->where("a.status","7");
		$this->db->order_by('a.date','DESC');
		return $this->db->get();
	}

	public function GetKaryawan(){
		$this->db->select("id,nama,dari_jam,sampai_jam,tgl,agenda_lembur,pemberi_tugas,status,date");
		$this->db->from("datakaryawan");
		$this->db->where("divisi",$this->session->userdata('divisi'));
		$this->db->where("status","7");
		$this->db->order_by('date','DESC');
		return $this->db->get();
	}

	public function GetUpdate($where="")
	{
		$data = $this->db->query('select * from datakaryawan '.$where);
    return $data->result_array();
	}

	public function GetUpdate2($where="")
	{
		$data = $this->db->query('select a.ket from monitoring a inner join datakaryawan b on a.id = b.id where (a.status=1 AND b.status=1) AND '.$where);
    return $data->result_array();
	}

	public function GetUpdate3($where="") 		//DIKEMBALIKAN ATASAN
	{
		$data = $this->db->query('select a.ket from monitoring a inner join datakaryawan b on a.id = b.id where (a.status=8 AND b.status=5) AND '.$where);
    return $data->result_array();
	}

	public function GetUpdate4($where="")
	{
		$data = $this->db->query('select a.ket from monitoring a inner join datakaryawan b on a.id = b.id where (a.status=6 AND b.status=4) AND '.$where);
    return $data->result_array();
	}

	public function GetUpdate5($where="")
	{
		$data = $this->db->query('select a.ket from monitoring a inner join datakaryawan b on a.id = b.id where (a.status=10 AND b.status=6) AND '.$where);
    return $data->result_array();
	}

	public function GetUpdate6($where="")		//INBOX KEMBALI PEMTUG
	{
		$data = $this->db->query('select a.ket from monitoring a inner join datakaryawan b on a.id = b.id where (a.status=3 AND b.status=2) AND '.$where);
    return $data->result_array();
	}

	public function GetUpdate7($where="")		//APPROVAL SETELAH DIKEMBALIKAN PEMTUG
	{
		$data = $this->db->query('select a.ket from monitoring a inner join datakaryawan b on a.id = b.id where (a.status=5 AND b.status=3) AND '.$where);
    return $data->result_array();
	}

	public function GetMonitoring1($where="")
	{
		$data = $this->db->query('select * from monitoring '.$where);
    return $data->result_array();
	}

	public function GetInboxUpdate($where="")
	{
		$data = $this->db->query('select status from tb_inbox '.$where);
    return $data->result_array();
	}

	public function GetNamaAtasan(){
		$data = $this->db->query("select nama from biodata_karyawan where level = 'admin' AND divisi = '".$this->session->userdata('divisi')."'");
		return $data->result_array();
	}

	public function UpdateData($tableName,$data,$where){
    $res = $this->db->update($tableName,$data,$where);
    return $res;
  }

	public function GetKategori($where=""){
		$data = $this->db->query('select * from datakaryawan '.$where);
		return $data->result_array();
	}

	public function GetMonitoring(){
		$this->db->select("a.id, a.ket, a.awalp, a.akhirp, a.status");
		$this->db->from("monitoring a");
		$this->db->join("biodata_karyawan b","b.nama = a.nama");
		$this->db->where("b.inisial",$this->session->userdata('inisial'));
		$this->db->order_by("awalp", "desc");
		return $this->db->get();
	}

	public function GetMonitoring2(){
		$this->db->select("a.id, a.ket, a.awalp, a.akhirp, a.status");
		$this->db->from("monitoring a");
		$this->db->join("biodata_karyawan b","b.nama = a.nama");
		$this->db->where("b.divisi",$this->session->userdata('divisi'));
		$this->db->order_by("awalp", "desc");
		return $this->db->get();
	}

	public function getPemberiTugas(){
		$this->db->select("nama");
		$this->db->from("biodata_karyawan");
		$this->db->where("level","user");
		$this->db->where("inisial !=",$this->session->userdata('inisial'));
		$this->db->where("divisi",$this->session->userdata('divisi'));
		return $this->db->get();
 	}

	public function getStatusData($id){
		$this->db->select("status");
		$this->db->from("daakaryawan");
		$this->db->where("id",$id);
		return $this->db->get();
 	}

	function data($number,$offset){
		return $query = $this->db->get('datakaryawan',$number,$offset)->result();
	}

	function jumlah_data(){
		return $this->db->get('datakaryawan')->num_rows();
	}

	public function InsertData($tableName,$data){
    $res = $this->db->insert($tableName,$data);
    return $res;
  }

	public function myjoin(){
		$this->db->select("a.nama,a.dari_jam,a.sampai_jam,a.tgl,a.agenda_lembur,a.id,c.ket,a.date");
		$this->db->from("datakaryawan a");
		$this->db->join("biodata_karyawan b","b.nama = a.pemberi_tugas","left");
		$this->db->join("monitoring c","c.id = a.id","right");
		$this->db->where("b.inisial",$this->session->userdata('inisial'));
		$this->db->where("a.pemberi_tugas",$this->session->userdata('nama'));
		$this->db->where("(a.status='5' AND c.status='8' OR a.status='1	' AND c.status='1' OR a.status='3' AND c.status='5')");
		$this->db->order_by('a.date','DESC');
		return $this->db->get();
	}

	public function myjoinAdmin(){
		$this->db->select("a.nama,a.dari_jam,a.sampai_jam,a.tgl,a.agenda_lembur,a.id,b.ket,a.date");
		$this->db->from("datakaryawan a");
		$this->db->join("monitoring b","b.id = a.id","left");
		$this->db->where("(a.status='4' AND b.status='6' OR a.status='6	' AND b.status='10')");
		$this->db->where("divisi",$this->session->userdata('divisi'));
		$this->db->order_by('a.date','DESC');
		return $this->db->get();
	}

	public function GetDataMonitoring(){
		$this->db->select("a.id,a.dari_jam,a.sampai_jam,a.tgl,a.agenda_lembur,a.pemberi_tugas,a.status,a.date");
		$this->db->from("datakaryawan a");
		$this->db->join("biodata_karyawan b","b.nama = a.nama","left");
		$this->db->where("b.inisial",$this->session->userdata('inisial'));
		$this->db->order_by('a.date','DESC');
		return $this->db->get();
	}

	public function GetDataMonitoring2(){
		$this->db->select("a.id,a.nama,a.dari_jam,a.sampai_jam,a.tgl,a.agenda_lembur,a.pemberi_tugas,a.status,a.date");
		$this->db->from("datakaryawan a");
		$this->db->join("biodata_karyawan b","b.nama = a.nama","left");
		$this->db->where("b.divisi",$this->session->userdata('divisi'));
		$this->db->order_by('a.date','DESC');
		return $this->db->get();
	}

	public function getInbox(){
		$this->db->select("a.waktu,a.id,c.agenda_lembur,c.pemberi_tugas,a.status");
		$this->db->from("tb_inbox a");
		$this->db->join("biodata_karyawan b","b.nama = a.nama","left");
		$this->db->join("datakaryawan c","c.id = a.id","right");
		$this->db->where("b.inisial",$this->session->userdata('inisial'));
		$this->db->where("a.status <>","1");
		return $this->db->get();
	}

	public function getOutbox(){
		$this->db->select("a.waktu,a.id,c.agenda_lembur,c.pemberi_tugas,a.status");
		$this->db->from("tb_outbox a");
		$this->db->join("biodata_karyawan b","b.nama = a.nama","left");
		$this->db->join("datakaryawan c","c.id = a.id","right");
		$this->db->where("b.inisial",$this->session->userdata('inisial'));
		$this->db->order_by('a.waktu','DESC');
		return $this->db->get();
	}

	public function buat_kode()   {
		$this->db->select('RIGHT(datakaryawan.id,4) as kode', FALSE);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('datakaryawan');
		if($query->num_rows() <> 0){
		$data = $query->row();
		$kode = intval($data->kode) + 1;
		}
		else {
		$kode = 1;
		}
		return $kode;
	}

	public function GetNIK($where=""){
		$data = $this->db->query('select a.nik from biodata_karyawan a inner join datakaryawan b on a.nama = b.pemberi_tugas where b.id = '.$where);
		return $data->result_array();
	}

	public function GetAtasan($where=""){
		$data = $this->db->query("select a.nik,a.nama from biodata_karyawan a INNER JOIN datakaryawan b on a.divisi = b.divisi WHERE a.level='admin' and b.id= ".$where);
		return $data->result_array();
	}

	public function GetTTD($where=""){
		$inisial = $this->session->userdata('inisial');
		$data = $this->db->query("select a.nik from biodata_karyawan a INNER JOIN datakaryawan b on a.nama = b.nama WHERE a.inisial='$inisial' and b.id= ".$where);
		return $data->result_array();
	}

	public function GetTDAdmin($where=""){
		$inisial = $this->session->userdata('inisial');
		$data = $this->db->query("select a.nik from biodata_karyawan a INNER JOIN datakaryawan b on a.nama = b.nama WHERE b.id= ".$where);
		return $data->result_array();
	}

	public function view(){
    return $this->db->get('datakaryawan')->result();
  }

	public function GetDuid($nama){
		$this->db->select("jam");
		$this->db->from("tb_uang");
		$this->db->where("nama",$nama);
		return $this->db->get();
	}

	public function GetDataUang(){
		$this->db->select("nama,jam,uang");
		$this->db->from("tb_uang");
		$this->db->where("divisi",$this->session->userdata('divisi'));
		return $this->db->get();
	}

	public function DashboardPending($where=""){
		$data = $this->db->query("select COUNT(status) as pending,date from datakaryawan where status!=7 and status!=8 and status!=9 and divisi='".$this->session->userdata('divisi')."'".$where);
		return $data->result_array();
	}

	public function DashboardApprove($where=""){
		$data = $this->db->query("select COUNT(status) as approve,date from datakaryawan where status=7 and divisi='".$this->session->userdata('divisi')."'".$where);
		return $data->result_array();
	}

	public function DashboardReject($where=""){
		$data = $this->db->query("select COUNT(status) as reject,date from datakaryawan where status=8 and divisi='".$this->session->userdata('divisi')."'".$where);
		return $data->result_array();
	}

	public function DashboardSimpan($where=""){
		$data = $this->db->query("select COUNT(status) as simpan,date from datakaryawan where status=0 and divisi='".$this->session->userdata('divisi')."'".$where);
		return $data->result_array();
	}

	public function DashboardPengajuan($where=""){
		$data = $this->db->query("select COUNT(id) as ajuan,date from datakaryawan where divisi='".$this->session->userdata('divisi')."'".$where);
		return $data->result_array();
	}

	public function DashboardWaktu($where=""){
		$data = $this->db->query("select SUM(jam) as waktu,date from tb_uang_date where divisi='".$this->session->userdata('divisi')."'".$where);
		return $data->result_array();
	}

	public function DashboardPegawai($where=""){
		$data = $this->db->query("select nik,max(jam) as maxjam,nama from tb_uang where divisi='".$this->session->userdata('divisi')."' group by nik order by maxjam desc");
		return $data->result_array();
	}

	public function GetDashboardKaryawan(){
		$this->db->select("a.nik,a.nama,a.inisial,a.nik,a.divisi,a.lokasi,c.jam");
		$this->db->from("biodata_karyawan a");
		$this->db->join("tb_uang c","a.nik = c.nik","left");
		$this->db->where("a.divisi",$this->session->userdata('divisi'));
		$this->db->where("a.level ='user'");
		$this->db->order_by("c.jam", "desc");

		return $this->db->get();
	}

	public function Duiddei($where=""){
		$data = $this->db->query("select * from tb_uang ".$where);
		return $data->result_array();
	}

	public function TotalUang(){
		$data = $this->db->query("select SUM(uang) as uangtot from tb_uang");
		return $data->result_array();
	}

	public function GetDKaryawan(){
		$this->db->select("nama,nik,divisi,lokasi");
		$this->db->from("biodata_karyawan");
		$this->db->where("divisi",$this->session->userdata('divisi'));
		$this->db->where("level ='user'");
		return $this->db->get();
	}

	public function GetDKaryawan2(){
		$this->db->select("a.nama,b.dari_jam,b.sampai_jam,b.tgl,b.agenda_lembur,b.pemberi_tugas,b.date,b.nik");
		$this->db->from("biodata_karyawan a");
		$this->db->join("datakaryawan b","b.nama = a.nama","left");
		$this->db->where("b.divisi",$this->session->userdata('divisi'));
		$this->db->order_by('b.date','DESC');
		return $this->db->get();
	}

	public function GetDKeuangan(){
		$this->db->select("nama,nik,divisi,lokasi");
		$this->db->from("biodata_karyawan");
		$this->db->where("divisi",$this->session->userdata('divisi'));
		$this->db->where("level ='user'");
		return $this->db->get();
	}

	public function GetDKeuangan2(){
		$this->db->select("a.nama,a.nik,a.divisi,a.lokasi,b.jam,b.uang");
		$this->db->from("biodata_karyawan a");
		$this->db->join("tb_uang b","a.nik = b.nik","left");
		$this->db->where("a.divisi",$this->session->userdata('divisi'));
		$this->db->where("a.level ='user'");
		return $this->db->get();
	}

	public function GetUangnya($where="")
	{
		$data = $this->db->query('select * from tb_uang '.$where);
    return $data->result_array();
	}
}
