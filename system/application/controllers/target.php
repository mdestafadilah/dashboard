<?php

class target extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->model('target_model');
		$this->load->library('session');
		    }


    public function index()
    {
	 $this->load->view('target_view');
	}
	
	
	 public function get_all_data()
    {
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 100;

           
      
        $results = $this->db->query('select count(*) as total from target')->row();
        $arr = array();
		if (isset($_POST['query'])){
		$q=$_POST['query'];$s=1;}
		else {$q='';$s=0;}
		$query=$this->target_model->get_all_data($start,$limit,$q,$s);
			$status='null';	
        foreach ($query->result() as $obj)
        {
	
	
            $arr[] =array(
			'Id_target'=>$obj->Id_target,

			'Id_Jenis'=>$obj->kategori_neraca,
'Value_Target'=>"Rp.".number_format($obj->Value_Target,0,0,".")

			);
        }
        echo '{success:true,results:'.$results->total .
                ',rows:'.json_encode($arr).'}';
    }
	
	public function add(){
	
	
	$Data=array(
	'Id_Jenis'=>$this->input->post('Id_Jenis'),
'Value_Target'=>$this->input->post('Value_Target')
 
	 );
		$add=$this->target_model->add_data($Data);
		 echo '{success:true}';
		
		}
		public function delete()
    {
        $records = explode(';', $_POST['postdata']);
        foreach($records as $id)
        {
                   $query=$this->target_model->delete_data($id);
        }
    }
	
	public function getData($id){
	
	$query=$this->target_model->getData($id);
	$arr=array();
	   foreach ($query->result() as $obj)
        {
	
            $arr[] = array(
			'Id_target'=>$obj->Id_target,

			'Id_Jenis'=>$obj->Id_Jenis,
'Value_Target'=>$obj->Value_Target

			);
        }
	  echo '{rows:1,results:'.json_encode($arr).'}';	
	
	}
	
	function editData(){
	
	$Id_Jenis=trim($this->input->post('Id_Jenis'));
$Value_Target=trim($this->input->post('Value_Target'));

   
	$id=$this->input->post('Id_target');
	
	
	
	$Data=array(
	'Id_Jenis'=>$this->input->post('Id_Jenis'),
'Value_Target'=>$this->input->post('Value_Target')

	);



	 	$edit=$this->target_model->update_data($Data,$id);
		 echo '{success:true}';
	}
	}
	

