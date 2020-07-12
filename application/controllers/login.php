<?php

class Login extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('m_login');
  }

	public function index(){
    $this->load->view('v_login');
    $this->session->sess_destroy();
  }

  function aksi_login(){
    $user=$this->input->post('inisial');
    $pass=$this->input->post('password');

    $ceklogin=$this->m_login->login($user,md5($pass));

    if($ceklogin){
      foreach($ceklogin as $row);
      $this->session->set_userdata('inisial', $row->inisial);
      $this->session->set_userdata('nama', $row->nama);
      $this->session->set_userdata('level', $row->level);
      $this->session->set_userdata('divisi', $row->divisi);

      if($this->session->userdata('level')=="admin"){
        redirect('admin/index');
      }elseif($this->session->userdata('level')=="user") {
        redirect('welcome/index');
      }
    }else{
        echo "<script>alert('Username/Password anda Salah');history.go(-1);</script>";
      }

    }


  function logout(){
    $this->session->sess_destroy();
    redirect(base_url('login',$data));
  }
}

?>
