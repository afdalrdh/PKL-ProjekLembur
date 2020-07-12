<?php

class M_login extends CI_Model{

	function login($user,$pass){
		$this->db->select('*');
		$this->db->from('biodata_karyawan');
		$this->db->where('inisial',$user);
		$this->db->where('password',$pass);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows()==1){
			return $query->result();
		}else {
			return false;
		}
	}

	function GetDivisi(){
		$this->db->select('divisi');
		$this->db->from('datakaryawan');
		$query = $this->db->get();
		return $query->result();
	}
}
