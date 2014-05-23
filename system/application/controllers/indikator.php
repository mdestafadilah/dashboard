<?php

class indikator extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->model('indikator_model');
		$this->load->library('session');
		    }


    public function index()
    {
	 $this->load->view('indikator_view');
	}
	
	
	 public function get_all_data()
    {
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 100;

           
      
        $results = $this->db->query('select count(*) as total from indikator')->row();
        $arr = array();
		if (isset($_POST['query'])){
		$q=$_POST['query'];$s=1;}
		else {$q='';$s=0;}
		$query=$this->indikator_model->get_all_data($start,$limit,$q,$s);
			$status='null';	
        foreach ($query->result() as $obj)
        {
	
	
            $arr[] =array(
			'Id_indikator'=>$obj->Id_indikator,

			'Id_Jenis'=>$obj->kategori_neraca,
'Dari'=>$obj->Dari,
'Sampai'=>$obj->Sampai,
'Warna'=>$obj->Warna

			);
        }
        echo '{success:true,results:'.$results->total .
                ',rows:'.json_encode($arr).'}';
    }
	
	public function add(){
	
	
	$Data=array(
	'Id_Jenis'=>$this->input->post('Id_Jenis'),
'Dari'=>$this->input->post('Dari'),
'Sampai'=>$this->input->post('Sampai'),
'Warna'=>$this->input->post('Warna')
 
	 );
		$add=$this->indikator_model->add_data($Data);
		 echo '{success:true}';
		
		}
		public function delete()
    {
        $records = explode(';', $_POST['postdata']);
        foreach($records as $id)
        {
                   $query=$this->indikator_model->delete_data($id);
        }
    }
	
	public function getData($id){
	
	$query=$this->indikator_model->getData($id);
	$arr=array();
	   foreach ($query->result() as $obj)
        {
	
            $arr[] = array(
			'Id_indikator'=>$obj->Id_indikator,

			'Id_Jenis'=>$obj->Id_Jenis,
'Dari'=>$obj->Dari,
'Sampai'=>$obj->Sampai,
'Warna'=>$obj->Warna

			);
        }
	  echo '{rows:1,results:'.json_encode($arr).'}';	
	
	}
	
	function editData(){
	
	$Id_Jenis=trim($this->input->post('Id_Jenis'));
$Dari=trim($this->input->post('Dari'));
$Sampai=trim($this->input->post('Sampai'));
$Warna=trim($this->input->post('Warna'));

   
	$id=$this->input->post('Id_indikator');
	
	
	
	$Data=array(
	'Id_Jenis'=>$this->input->post('Id_Jenis'),
'Dari'=>$this->input->post('Dari'),
'Sampai'=>$this->input->post('Sampai'),
'Warna'=>$this->input->post('Warna')

	);



	 	$edit=$this->indikator_model->update_data($Data,$id);
		 echo '{success:true}';
	}
	}
	

