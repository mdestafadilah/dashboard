<?php

class item extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->model('item_model');
		$this->load->library('session');
		    }


    public function index()
    {
	 $this->load->view('item_view');
	}
	
	
	 public function get_all_data()
    {
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 100;
        $results = $this->db->query('select count(*) as total from item')->row();
        $arr = array();
		if (isset($_POST['query'])){
		$q=$_POST['query'];$s=1;}
		else {$q='';$s=0;}
		$query=$this->item_model->get_all_data($start,$limit,$q,$s);
			$status='null';	
        foreach ($query->result() as $obj)
        {
	
	
            $arr[] =array(
			'id_item'=>$obj->id_item,

			'id_kategori'=>$obj->nama_kategori,
'nama_item'=>$obj->nama_item,
'value'=>"Rp.".number_format($obj->value,0,0,".")

			);
        }
        echo '{success:true,results:'.$results->total .
                ',rows:'.json_encode($arr).'}';
    }
	
	public function add(){
	
	
	$Data=array(
	'id_kategori'=>$this->input->post('id_kategori'),
'nama_item'=>$this->input->post('nama_item'),
'value'=>$this->input->post('value')
 
	 );
		$add=$this->item_model->add_data($Data);
		 echo '{success:true}';
		
		}
		public function delete()
    {
        $records = explode(';', $_POST['postdata']);
        foreach($records as $id)
        {
                   $query=$this->item_model->delete_data($id);
        }
    }
	
	public function getData($id){
	
	$query=$this->item_model->getData($id);
	$arr=array();
	   foreach ($query->result() as $obj)
        {
	
            $arr[] = array(
			'id_item'=>$obj->id_item,

			'id_kategori'=>$obj->id_kategori,
'nama_item'=>$obj->nama_item,
'value'=>$obj->value

			);
        }
	  echo '{rows:1,results:'.json_encode($arr).'}';	
	
	}
	
	function editData(){
	
	$id_kategori=trim($this->input->post('id_kategori'));
$nama_item=trim($this->input->post('nama_item'));
$value=trim($this->input->post('value'));

   
	$id=$this->input->post('id_item');
	
	
	
	$Data=array(
	'id_kategori'=>$this->input->post('id_kategori'),
'nama_item'=>$this->input->post('nama_item'),
'value'=>$this->input->post('value')

	);



	 	$edit=$this->item_model->update_data($Data,$id);
		 echo '{success:true}';
	}
	}
	

