<?php

class Login extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->library('session');

    }


    public function index()
    {
		//if($this->session->userdata('user')||$this->session->userdata('id_user')){redirect(base_url().'home', 'refresh');}
	 $this->load->view('login/index');
	}

	public function check()
	{
	/*
	$usr=mysql_escape_string($this->input->post('username'));
	$pass=mysql_escape_string($this->input->post('pass'));
	
	$no=0;
	$query=$this->db->query("select * from user where username='".$usr."' AND password='".$pass."'");
		foreach($query->result() as $row){
		$no=1;
}
	 if($no==1)echo '{success:true}';
	 if($no==0)echo '{success:false}';
	 */ 
	$usr=mysql_escape_string($this->input->post('username'));
	$pass=mysql_escape_string($this->input->post('pass'));
	$no=0;
	$query=$this->db->query("select * from user where username='$usr' AND password='$pass' ");
	 foreach ($query->result() as $obj)
        {
		$no=1;
		$this->session->set_userdata('id_user',$obj->id_user);
		$this->session->set_userdata('username',$obj->username);
		$this->session->set_userdata('nama',$obj->nama);
		$this->session->set_userdata('level',$obj->level);
		}

		if($no==1){echo '{success:true}';}
		else {echo '{success:false}';}
	 
	}

	function logout(){
	$this->session->sess_destroy();
    redirect('login', 'refresh');

	}


}
