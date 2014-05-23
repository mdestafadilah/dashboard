<?php

class kategori_neraca extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->model('kategori_neraca_model');
		$this->load->library('session');
		    }


    public function index()
    {
	 $this->load->view('kategori_neraca_view');
	}
	
	
	 public function get_all_data()
    {
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 100;

           
      
        $results = $this->db->query('select count(*) as total from kategori_neraca')->row();
        $arr = array();
		if (isset($_POST['query'])){
		$q=$_POST['query'];$s=1;}
		else {$q='';$s=0;}
		$query=$this->kategori_neraca_model->get_all_data($start,$limit,$q,$s);
			$status='null';	
        foreach ($query->result() as $obj)
        {
	
	
            $arr[] =array(
			'id_kategori_neraca'=>$obj->id_kategori_neraca,

			'kategori_neraca'=>$obj->kategori_neraca

			);
        }
        echo '{success:true,results:'.$results->total .
                ',rows:'.json_encode($arr).'}';
    }
	
	public function add(){
	
	
	$Data=array(
	'kategori_neraca'=>$this->input->post('kategori_neraca')
 
	 );
		$add=$this->kategori_neraca_model->add_data($Data);
		 echo '{success:true}';
		
		}
		public function delete()
    {
        $records = explode(';', $_POST['postdata']);
        foreach($records as $id)
        {
                   $query=$this->kategori_neraca_model->delete_data($id);
        }
    }
	
	public function getData($id){
	
	$query=$this->kategori_neraca_model->getData($id);
	$arr=array();
	   foreach ($query->result() as $obj)
        {
	
            $arr[] = array(
			'id_kategori_neraca'=>$obj->id_kategori_neraca,

			'kategori_neraca'=>$obj->kategori_neraca

			);
        }
	  echo '{rows:1,results:'.json_encode($arr).'}';	
	
	}
	
	function editData(){
	
	$kategori_neraca=trim($this->input->post('kategori_neraca'));

   
	$id=$this->input->post('id_kategori_neraca');
	
	
	
	$Data=array(
	'kategori_neraca'=>$this->input->post('kategori_neraca')

	);



	 	$edit=$this->kategori_neraca_model->update_data($Data,$id);
		 echo '{success:true}';
	}
	}
	

