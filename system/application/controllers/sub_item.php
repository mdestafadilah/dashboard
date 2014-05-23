<?php

class sub_item extends Controller {

    public function  __construct()
    {
        parent::Controller();
		$this->load->helper('url');
		$this->load->model('sub_item_model');
		$this->load->library('session');
		    }


    public function index()
    {
	 $this->load->view('sub_item_view');
	}
	
	
	 public function get_all_data()
    {
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
		$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 100;

           
      
        $results = $this->db->query('select count(*) as total from sub_item')->row();
        $arr = array();
		if (isset($_POST['query'])){
		$q=$_POST['query'];$s=1;}
		else {$q='';$s=0;}
		$query=$this->sub_item_model->get_all_data($start,$limit,$q,$s);
			$status='null';	
        foreach ($query->result() as $obj)
        {
	
	
            $arr[] =array(
			'id_item'=>$obj->id_item,

'id_sub_level_neraca'=>$obj->nama_sub_neraca,
'nama_neraca'=>$obj->nama_neraca,
'value'=>"Rp.".number_format($obj->value,0,0,".")

			);
        }
        echo '{success:true,results:'.$results->total .
                ',rows:'.json_encode($arr).'}';
    }
	
	public function add(){
	
	
	$Data=array(
	'id_sub_level_neraca'=>$this->input->post('id_sub_level_neraca'),
'nama_neraca'=>$this->input->post('nama_neraca'),
'value'=>$this->input->post('value')
 
	 );
		$add=$this->sub_item_model->add_data($Data);
		 echo '{success:true}';
		
		}
		public function delete()
    {
        $records = explode(';', $_POST['postdata']);
        foreach($records as $id)
        {
                   $query=$this->sub_item_model->delete_data($id);
        }
    }
	
	public function getData($id){
	
	$query=$this->sub_item_model->getData($id);
	$arr=array();
	   foreach ($query->result() as $obj)
        {
	
            $arr[] = array(
			'id_item'=>$obj->id_item,

			'id_sub_level_neraca'=>$obj->id_sub_level_neraca,
'nama_neraca'=>$obj->nama_neraca,
'value'=>$obj->value

			);
        }
	  echo '{rows:1,results:'.json_encode($arr).'}';	
	
	}
	
	function editData(){
	
	$id_sub_level_neraca=trim($this->input->post('id_sub_level_neraca'));
$nama_neraca=trim($this->input->post('nama_neraca'));
$value=trim($this->input->post('value'));

   
	$id=$this->input->post('id_item');
	
	
	
	$Data=array(
	'id_sub_level_neraca'=>$this->input->post('id_sub_level_neraca'),
'nama_neraca'=>$this->input->post('nama_neraca'),
'value'=>$this->input->post('value')

	);



	 	$edit=$this->sub_item_model->update_data($Data,$id);
		 echo '{success:true}';
	}
	
	
	public function chartdata(){
	
	$jmldata=$this->db->query(" SELECT sum( a.value ) AS total
FROM `sub_item` a
LEFT JOIN sub_level_neraca b ON a.id_sub_level_neraca = b.id_sub_level_neraca
WHERE b.id_sub_kategori_neraca =1
OR b.id_sub_kategori_neraca =3 ")->row();
	
	$query=$this->db->query("select * from target where id_jenis='1'")->row();	
	$target=$query->Value_Target;
	$persen=($jmldata->total/$target)*100;
	
	echo '
<chart manageResize="1" origW="350" origH="200"  palette="2" bgAlpha="0" bgColor="FFFFFF" lowerLimit="0" upperLimit="100" numberSuffix="%" showBorder="0" basefontColor="FFFFDD" chartTopMargin="5" chartBottomMargin="5" 
toolTipBgColor="009999" gaugeFillMix="{dark-10},{light-70},{dark-10}" gaugeFillRatio="3" pivotRadius="8" gaugeOuterRadius="120" gaugeInnerRadius="70%"  
gaugeOriginX="175" gaugeOriginY="170" trendValueDistance="5" tickValueDistance="3" manageValueOverlapping="1" autoAlignTickValues="1">
   <colorRange>';
	$querydata=$this->db->query("select * from indikator where id_Jenis='1'");
	foreach($querydata->result() as $row){	
      
	  echo '<color minValue="'.$row->Dari.'" maxValue="'.$row->Sampai.'" code="'.$row->Warna.'"/>';
	  }
   echo '</colorRange>
   <dials>
      <dial value="'.$persen.'" rearExtension="10" baseWidth="10"/>
   </dials>
   <trendpoints>
      <point startValue="'.$persen.'" displayValue="Average" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2"  />
   </trendpoints>
   <!--Rectangles behind the gauge -->
   <annotations>
      <annotationGroup id="Grp1" showBelow="1" showShadow="1">
         <annotation type="rectangle" x="$chartStartX+5" y="$chartStartY+5" toX="$chartEndX-5" toY="$chartEndY-5" radius="10" fillColor="009999,333333" showBorder="0" />
      </annotationGroup>
   </annotations>
   <styles>
      <definition>
         <style name="RectShadow" type="shadow" strength="3"/>
                 <style name="trendvaluefont" type="font" bold="1" borderColor="FFFFDD"/>
      </definition>
      <application>
         <apply toObject="Grp1" styles="RectShadow" />
                 <apply toObject="Trendvalues" styles="trendvaluefont" />
      </application>
   </styles>
</chart>
';
	
	}
	
		public function chartdata2(){
	
	$jmldata=$this->db->query(" SELECT sum( a.value ) AS total
FROM `sub_item` a
LEFT JOIN sub_level_neraca b ON a.id_sub_level_neraca = b.id_sub_level_neraca
WHERE b.id_sub_kategori_neraca =2
OR b.id_sub_kategori_neraca =4 ")->row();
	
	$query=$this->db->query("select * from target where id_jenis='2'")->row();	
	$target=$query->Value_Target;
	$persen=($jmldata->total/$target)*100;
	
	echo '
<chart manageResize="1" origW="350" origH="200"  palette="2" bgAlpha="0" bgColor="FFFFFF" lowerLimit="0" upperLimit="100" numberSuffix="%" showBorder="0" basefontColor="FFFFDD" chartTopMargin="5" chartBottomMargin="5" 
toolTipBgColor="009999" gaugeFillMix="{dark-10},{light-70},{dark-10}" gaugeFillRatio="3" pivotRadius="8" gaugeOuterRadius="120" gaugeInnerRadius="70%"  
gaugeOriginX="175" gaugeOriginY="170" trendValueDistance="5" tickValueDistance="3" manageValueOverlapping="1" autoAlignTickValues="1">
   <colorRange>';
	$querydata=$this->db->query("select * from indikator where id_Jenis='2'");
	foreach($querydata->result() as $row){	
      
	  echo '<color minValue="'.$row->Dari.'" maxValue="'.$row->Sampai.'" code="'.$row->Warna.'"/>';
	  }
   echo '</colorRange>
   <dials>
      <dial value="'.$persen.'" rearExtension="10" baseWidth="10"/>
   </dials>
   <trendpoints>
      <point startValue="'.$persen.'" displayValue="Average" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2"  />
   </trendpoints>
   <!--Rectangles behind the gauge -->
   <annotations>
      <annotationGroup id="Grp1" showBelow="1" showShadow="1">
         <annotation type="rectangle" x="$chartStartX+5" y="$chartStartY+5" toX="$chartEndX-5" toY="$chartEndY-5" radius="10" fillColor="009999,333333" showBorder="0" />
      </annotationGroup>
   </annotations>
   <styles>
      <definition>
         <style name="RectShadow" type="shadow" strength="3"/>
                 <style name="trendvaluefont" type="font" bold="1" borderColor="FFFFDD"/>
      </definition>
      <application>
         <apply toObject="Grp1" styles="RectShadow" />
                 <apply toObject="Trendvalues" styles="trendvaluefont" />
      </application>
   </styles>
</chart>
';
	
	}

		public function chartdata3(){
	
	$jmldata=$this->db->query(" SELECT sum( a.value ) AS total
FROM `item` a
LEFT JOIN kategori b ON a.id_kategori = b.id_kategori
WHERE b.jenis_kategori ='D' ")->row();
	
	$query=$this->db->query("select * from target where id_jenis='5'")->row();	
	$target=$query->Value_Target;
	$persen=($jmldata->total/$target)*100;
	
	echo '
<chart manageResize="1" origW="350" origH="200"  palette="2" bgAlpha="0" bgColor="FFFFFF" lowerLimit="0" upperLimit="100" numberSuffix="%" showBorder="0" basefontColor="FFFFDD" chartTopMargin="5" chartBottomMargin="5" 
toolTipBgColor="009999" gaugeFillMix="{dark-10},{light-70},{dark-10}" gaugeFillRatio="3" pivotRadius="8" gaugeOuterRadius="120" gaugeInnerRadius="70%"  
gaugeOriginX="175" gaugeOriginY="170" trendValueDistance="5" tickValueDistance="3" manageValueOverlapping="1" autoAlignTickValues="1">
   <colorRange>';
	$querydata=$this->db->query("select * from indikator where id_Jenis='5'");
	foreach($querydata->result() as $row){	
      
	  echo '<color minValue="'.$row->Dari.'" maxValue="'.$row->Sampai.'" code="'.$row->Warna.'"/>';
	  }
   echo '</colorRange>
   <dials>
      <dial value="'.$persen.'" rearExtension="10" baseWidth="10"/>
   </dials>
   <trendpoints>
      <point startValue="'.$persen.'" displayValue="Average" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2"  />
   </trendpoints>
   <!--Rectangles behind the gauge -->
   <annotations>
      <annotationGroup id="Grp1" showBelow="1" showShadow="1">
         <annotation type="rectangle" x="$chartStartX+5" y="$chartStartY+5" toX="$chartEndX-5" toY="$chartEndY-5" radius="10" fillColor="009999,333333" showBorder="0" />
      </annotationGroup>
   </annotations>
   <styles>
      <definition>
         <style name="RectShadow" type="shadow" strength="3"/>
                 <style name="trendvaluefont" type="font" bold="1" borderColor="FFFFDD"/>
      </definition>
      <application>
         <apply toObject="Grp1" styles="RectShadow" />
                 <apply toObject="Trendvalues" styles="trendvaluefont" />
      </application>
   </styles>
</chart>
';
	
	}

		public function chartdata4(){
	
	$jmldata=$this->db->query(" SELECT sum( a.value ) AS total
FROM `item` a
LEFT JOIN kategori b ON a.id_kategori = b.id_kategori
WHERE b.jenis_kategori ='K' ")->row();
		$query=$this->db->query("select * from target where id_jenis='6'")->row();	
	$target=$query->Value_Target;
	$persen=($target/$jmldata->total)*100;
	
	echo '
<chart manageResize="1" origW="350" origH="200"  palette="2" bgAlpha="0" bgColor="FFFFFF" lowerLimit="0" upperLimit="100" numberSuffix="%" showBorder="0" basefontColor="FFFFDD" chartTopMargin="5" chartBottomMargin="5" 
toolTipBgColor="009999" gaugeFillMix="{dark-10},{light-70},{dark-10}" gaugeFillRatio="3" pivotRadius="8" gaugeOuterRadius="120" gaugeInnerRadius="70%"  
gaugeOriginX="175" gaugeOriginY="170" trendValueDistance="5" tickValueDistance="3" manageValueOverlapping="1" autoAlignTickValues="1">
   <colorRange>';
	$querydata=$this->db->query("select * from indikator where id_Jenis='6'");
	foreach($querydata->result() as $row){	
      
	  echo '<color minValue="'.$row->Dari.'" maxValue="'.$row->Sampai.'" code="'.$row->Warna.'"/>';
	  }
   echo '</colorRange>
   <dials>
      <dial value="'.$persen.'" rearExtension="10" baseWidth="10"/>
   </dials>
   <trendpoints>
      <point startValue="'.$persen.'" displayValue="Average" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2"  />
   </trendpoints>
   <!--Rectangles behind the gauge -->
   <annotations>
      <annotationGroup id="Grp1" showBelow="1" showShadow="1">
         <annotation type="rectangle" x="$chartStartX+5" y="$chartStartY+5" toX="$chartEndX-5" toY="$chartEndY-5" radius="10" fillColor="009999,333333" showBorder="0" />
      </annotationGroup>
   </annotations>
   <styles>
      <definition>
         <style name="RectShadow" type="shadow" strength="3"/>
                 <style name="trendvaluefont" type="font" bold="1" borderColor="FFFFDD"/>
      </definition>
      <application>
         <apply toObject="Grp1" styles="RectShadow" />
                 <apply toObject="Trendvalues" styles="trendvaluefont" />
      </application>
   </styles>
</chart>
';
	}


	
	}
	

