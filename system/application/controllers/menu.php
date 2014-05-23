<?php

class Home extends Controller {

    public function  __construct()
    {
        parent::Controller();
	   $this->load->helper('url');
		$this->load->library('session');	
	//if(!$this->session->userdata('user')||!$this->session->userdata('id_user')){redirect(base_url().'web/login', 'refresh');}
    }
	   

    public function index()
    {
//	$data['nmop']=$this->session->userdata('usrnm');
	//	$data['jbtn']=$this->session->userdata('jbtn');
	public function Hasil(){
  $this->load->view('frame/menu');
   }
s}


?>
