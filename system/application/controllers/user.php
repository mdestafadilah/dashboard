<?php

class user extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->library('session');
		    }


    public function index()
    {
	 $this->load->view('user_view');
	}
	
	
	 public function get_all_data()
    {
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 100;

           
      
        $results = $this->db->query('select count(*) as total from user')->row();
        $arr = array();
		if (isset($_POST['query'])){
		$q=$_POST['query'];$s=1;}
		else {$q='';$s=0;}
		$query=$this->user_model->get_all_data($start,$limit,$q,$s);
			$status='null';	
        foreach ($query->result() as $obj)
        {
	
	
            $arr[] =array(
			'id_user'=>$obj->id_user,

			'nama'=>$obj->nama,
'username'=>$obj->username,
'password'=>$obj->password,
'level'=>$obj->level

			);
        }
        echo '{success:true,results:'.$results->total .
                ',rows:'.json_encode($arr).'}';
    }
	
	public function add(){
	
	
	$Data=array(
	'nama'=>$this->input->post('nama'),
'username'=>$this->input->post('username'),
'password'=>$this->input->post('password'),
'level'=>$this->input->post('level')
 
	 );
		$add=$this->user_model->add_data($Data);
		 echo '{success:true}';
		
		}
		public function delete()
    {
        $records = explode(';', $_POST['postdata']);
        foreach($records as $id)
        {
                   $query=$this->user_model->delete_data($id);
        }
    }
	
	public function getData($id){
	
	$query=$this->user_model->getData($id);
	$arr=array();
	   foreach ($query->result() as $obj)
        {
	
            $arr[] = array(
			'id_user'=>$obj->id_user,

			'nama'=>$obj->nama,
'username'=>$obj->username,
'password'=>$obj->password,
'level'=>$obj->level

			);
        }
	  echo '{rows:1,results:'.json_encode($arr).'}';	
	
	}
	
	function editData(){
	
	$nama=trim($this->input->post('nama'));
$username=trim($this->input->post('username'));
$password=trim($this->input->post('password'));
$level=trim($this->input->post('level'));

   
	$id=$this->input->post('id_user');
	
	
	
	$Data=array(
	'nama'=>$this->input->post('nama'),
'username'=>$this->input->post('username'),
'password'=>$this->input->post('password'),
'level'=>$this->input->post('level')

	);
}

public function ubahpassword(){
	$this->load->view('ubahpassword');
	}
	
	public function saveubahpassword(){
$username=$this->input->post('username');
$password=$this->input->post('password');
$this->db->query("update user set password='".$password."' where username='".$username."'");

		 echo '{success:true}';

	 	//$edit=$this->user_model->update_data($Data,$id);
		 //echo '{success:true}';
	}
	}
	

