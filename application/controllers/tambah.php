<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->model('mymodel');
		$this->load->helper('tgl_indo');
	  }
	  
	
	public function index(){
		$data['header'] = 'head';
		$data['content'] = 'v_tambah';
		$this->load->view('index',$data);
    }
}