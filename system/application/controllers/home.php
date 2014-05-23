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
	$level=$this->session->userdata('level');
//$get=$this->db->query("select * from user where id_user='".$level."'")->row();
$data['level']=$level;
	
		$this->load->view('index');
		 $this->load->view('menu',$data);
    }

  //public function home(){$this->load->view('frame/home');}
  public function item(){$this->load->view('frame/item');} 
  public function kategori(){$this->load->view('frame/kategori');}  
  public function neraca(){$this->load->view('frame/kategori_neraca');}
  public function menu(){$this->load->view('frame/menu');}
  public function sub_item(){$this->load->view('frame/sub_item');}

 public function ubahpassword(){$this->load->view('frame/ubahpassword');}
  
   public function kategori_neraca(){$this->load->view('frame/kategori_neraca');}
  
  public function sub_kategori_neraca(){$this->load->view('frame/sub_kategori_neraca');}
  public function sub_level_neraca(){$this->load->view('frame/sub_level_neraca');}
  public function user(){$this->load->view('frame/user');}
  public function target(){$this->load->view('frame/target');}
  public function indikator(){$this->load->view('frame/indikator');}
  public function dashboard(){
  // Otaknya neh, biar muncul grapik
  $this->load->view('dashboard');
  }
  
  public function drilldown_satu($id){
    $data['id']=$id;
  $this->load->view('drilldown_satu',$data);
  } 
  public function drilldown_dua($id){
  $data['id']=$id;
  $this->load->view('drilldown_dua',$data);
  } 
  public function drilldown_tiga($id){
    $data['id']=$id;
  $this->load->view('drilldown_tiga',$data);
  }
  public function drilldown_empat(){
  
  $this->load->view('drilldown_empat');}

  public function jenispendapatan_satu($id){
  $data['id']=$id;
  $this->load->view('jenispendapatan_satu',$data);
}
  public function jenispendapatan_dua($id){
  $data['id']=$id;
  $this->load->view('jenispendapatan_dua',$data);
}

}


?>
