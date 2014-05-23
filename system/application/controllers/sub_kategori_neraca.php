<?php

class sub_kategori_neraca extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->model('sub_kategori_neraca_model');
		$this->load->library('session');
		    }


    public function index()
    {
	 $this->load->view('sub_kategori_neraca_view');
	}
	
	
	 public function get_all_data()
    {
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 100;

           
      
        $results = $this->db->query('select count(*) as total from sub_kategori_neraca')->row();
        $arr = array();
		if (isset($_POST['query'])){
		$q=$_POST['query'];$s=1;}
		else {$q='';$s=0;}
		$query=$this->sub_kategori_neraca_model->get_all_data($start,$limit,$q,$s);
			$status='null';	
        foreach ($query->result() as $obj)
        {
	
	
            $arr[] =array(
			'id_sub_kategori_neraca'=>$obj->id_sub_kategori_neraca,

			'id_kategori_neraca'=>$obj->kategori_neraca,
'nama_sub_kategori_neraca'=>$obj->nama_sub_kategori_neraca

			);
        }
        echo '{success:true,results:'.$results->total .
                ',rows:'.json_encode($arr).'}';
    }
	
	public function add(){
	
	
	$Data=array(
	'id_kategori_neraca'=>$this->input->post('id_kategori_neraca'),
'nama_sub_kategori_neraca'=>$this->input->post('nama_sub_kategori_neraca')
 
	 );
		$add=$this->sub_kategori_neraca_model->add_data($Data);
		 echo '{success:true}';
		
		}
		public function delete()
    {
        $records = explode(';', $_POST['postdata']);
        foreach($records as $id)
        {
                   $query=$this->sub_kategori_neraca_model->delete_data($id);
        }
    }
	
	public function getData($id){
	
	$query=$this->sub_kategori_neraca_model->getData($id);
	$arr=array();
	   foreach ($query->result() as $obj)
        {
	
            $arr[] = array(
			'id_sub_kategori_neraca'=>$obj->id_sub_kategori_neraca,

			'id_kategori_neraca'=>$obj->id_kategori_neraca,
'nama_sub_kategori_neraca'=>$obj->nama_sub_kategori_neraca

			);
        }
	  echo '{rows:1,results:'.json_encode($arr).'}';	
	
	}
	
	function editData(){
	
	$id_kategori_neraca=trim($this->input->post('id_kategori_neraca'));
$nama_sub_kategori_neraca=trim($this->input->post('nama_sub_kategori_neraca'));

   
	$id=$this->input->post('id_sub_kategori_neraca');
	
	
	
	$Data=array(
	'id_kategori_neraca'=>$this->input->post('id_kategori_neraca'),
'nama_sub_kategori_neraca'=>$this->input->post('nama_sub_kategori_neraca')

	);



	 	$edit=$this->sub_kategori_neraca_model->update_data($Data,$id);
		 echo '{success:true}';
	}
	}
	

