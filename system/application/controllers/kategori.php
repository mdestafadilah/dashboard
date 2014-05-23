<?php

class kategori extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->model('kategori_model');
		$this->load->library('session');
		    }


    public function index()
    {
	 $this->load->view('kategori_view');
	}
	
	
	 public function get_all_data()
    {
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 100;

           
      
        $results = $this->db->query('select count(*) as total from kategori')->row();
        $arr = array();
		if (isset($_POST['query'])){
		$q=$_POST['query'];$s=1;}
		else {$q='';$s=0;}
		$query=$this->kategori_model->get_all_data($start,$limit,$q,$s);
			$status='null';	
        foreach ($query->result() as $obj)
        {
	
	
            $arr[] =array(
			'id_kategori'=>$obj->id_kategori,

			'nama_kategori'=>$obj->nama_kategori,
'jenis_kategori'=>$obj->jenis_kategori

			);
        }
        echo '{success:true,results:'.$results->total .
                ',rows:'.json_encode($arr).'}';
    }
	
	public function add(){
	
	
	$Data=array(
	'nama_kategori'=>$this->input->post('nama_kategori'),
'jenis_kategori'=>$this->input->post('jenis_kategori')
 
	 );
		$add=$this->kategori_model->add_data($Data);
		 echo '{success:true}';
		
		}
		public function delete()
    {
        $records = explode(';', $_POST['postdata']);
        foreach($records as $id)
        {
                   $query=$this->kategori_model->delete_data($id);
        }
    }
	
	public function getData($id){
	
	$query=$this->kategori_model->getData($id);
	$arr=array();
	   foreach ($query->result() as $obj)
        {
	
            $arr[] = array(
			'id_kategori'=>$obj->id_kategori,

			'nama_kategori'=>$obj->nama_kategori,
'jenis_kategori'=>$obj->jenis_kategori

			);
        }
	  echo '{rows:1,results:'.json_encode($arr).'}';	
	
	}
	
	function editData(){
	
	$nama_kategori=trim($this->input->post('nama_kategori'));
$jenis_kategori=trim($this->input->post('jenis_kategori'));

   
	$id=$this->input->post('id_kategori');
	
	
	
	$Data=array(
	'nama_kategori'=>$this->input->post('nama_kategori'),
'jenis_kategori'=>$this->input->post('jenis_kategori')

	);



	 	$edit=$this->kategori_model->update_data($Data,$id);
		 echo '{success:true}';
	}
	}
	

