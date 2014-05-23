<?
mysql_connect("localhost","root","");
mysql_select_db("sms");

$server=$_SERVER['SERVER_NAME'];

if($_POST['B1']=="Upload New File Excel"){
	 $disp_wiz="2";
	 $disp_upload="1";
}

if($_POST['B1']=="Delete File"){
	 for($i=0;$i<$_POST["jumfile"];$i++){
	 	  if($_POST['no'.$i]!=''){
	 	     unlink("upload_excel/".$_POST['no'.$i]);
	 	  }
	 }
	 $disp_wiz="2";
}
if($_POST['B5']=="Delete File"){
	 for($i=0;$i<$_POST["jumfile"];$i++){
	 	  if($_POST['no'.$i]!=''){
	 	     unlink("upload_txt/".$_POST['no'.$i]);
	 	  }
	 }
	 $disp_wiz="1";
}

if($_POST['B2']=="Import"){
	 if($_POST['baris']==''){
	 	 echo "Data start at row column can not be empty";exit;
	 }
	 if(!is_numeric($_POST['baris'])){
	 	 echo "Data start at row column is invalid, please type numeric data";
	 	 exit;
	 }
	 if($_POST['kolom0']==''){
	 	 echo "The column for mobile# data mapping can not be empty";exit;
	 }
	 $namafileexcel=$_POST['namafile_hide'];
	 require_once 'Excel/reader.php';
   $data = new Spreadsheet_Excel_Reader();
   $data->setOutputEncoding('CP1251');
   $data->read("upload_excel/".$namafileexcel);
   $ind=0;
   $pesan="Nothing to be inserted.";
   for($i=$_POST['baris'];$i<=$data->sheets[0]['numRows'];$i++){
   	   $ind=1;
       $dum=$data->sheets[0]['cells'][$i][$_POST['kolom0']];
       if(strlen($dum)>8){
          $nozero=substr(trim($dum),0,1)=='0' ? substr(trim($dum),1,strlen(trim($dum))-1) : trim($dum);
          $notarget=substr(trim($dum),0,3)!='620' ? substr(trim($dum),0,2)!='62' ? '+62'.$nozero : $nozero : '+62'.substr($nozero,3,strlen($nozero)-3);
       }else{
	         $notarget=$dum;
       }
       $kal1="select phoneNo from phone where phoneNo='".$notarget."'";
       $nrow=mysql_query($kal1);
	   $nrowtotal=mysql_num_rows($nrow);
       if($nrowtotal==0){
	   if($_POST['grup']=='ALL'){
          $kal="insert into phone(phoneNo,phoneName) values('".$notarget."','".$data->sheets[0]['cells'][$i][$_POST['kolom1']]."')";
	        }
			else  {  $kal="insert into phone(`phoneNo`,`phoneName`,`group`) values('".$notarget."','".$data->sheets[0]['cells'][$i][$_POST['kolom1']]."','".$_POST['grup'].";')";
			
	     }
			
			$sql2=mysql_query($kal);
	        $pesan="All data imported successfully";
	     }
   }
   echo $pesan."<br>";

}


if($_POST['B5']=="Import"){
	
	 $namafiletxt=$_POST['namafile_hide'];
	$handle = fopen("upload_txt/".$namafiletxt, "rb");
$contents = stream_get_contents($handle);
fclose($handle);

$ex1=explode("\n",$contents);
for($a=0;$a<count($ex1);$a++){
$ex2=explode(";",$ex1[$a]);

for($b[$a]=0;$b[$a]<count($ex2);$b[$a]++){

if($b[$a]==0)$alias[$a]=$ex2[$b[$a]];
else $no[$a]=$ex2[$b[$a]];
}
 $kal1="select phoneNo from phone where phoneNo='".$no[$a]."'";
       $nrow=mysql_query($kal1);
	   $nrowtotal=mysql_num_rows($nrow);
       if($nrowtotal==0){
	    if($_POST['grup']=='ALL'){
 $sql[$a]="insert into phone(phoneName,phoneNo)Values('".$alias[$a]."','".$no[$a]."')";
}
else $sql[$a]="insert into phone(`phoneNo`,`phoneName`,`group`)Values('".$alias[$a]."','".$no[$a]."','".$_POST['grup'].";')";
 $query[$a]=mysql_query($sql[$a]);
}
}
echo "Data berhasil masuk";


}



if($_POST['B1']=="Upload"){
	 if($_FILES['excelfile']['tmp_name']==''){
	 	 echo "masukan file yaang mau di upload";exit;
	 }
	 if(!is_dir("upload_excel")){
	 	   mkdir("upload_excel");
	 }
   if(move_uploaded_file($_FILES['excelfile']['tmp_name'], "upload_excel/".$_FILES['excelfile']['name'])){
   	  $namafileexcel=$_FILES['excelfile']['name'];
   	  $disp_wiz="2";
   	  $disp_upload="0";
	    $disp_isiexcel="1";
   }else{
   	  echo "Upload error";exit;
   }
}

if($_POST['B5']=="Upload"){
	 if($_FILES['filetxt']['tmp_name']==''){
	 	 echo "masukan file yaang mau di upload";exit;
	 }
	 if(!is_dir("upload_txt")){
	 	   mkdir("upload_txt");
	 }
   if(move_uploaded_file($_FILES['filetxt']['tmp_name'], "upload_txt/".$_FILES['filetxt']['name'])){
   	  $namafileexcel=$_FILES['filetxt']['name'];
   	  $disp_wiz="1";
   	  $disp_upload="0";
	   $disp_isitxt="1";
   }else{
   	  echo "Upload error";exit;
   }
}



if($disp_wiz=="2" or $_GET['dwiz']=="2"){
  $i=0;
  if(is_dir("upload_excel/")){
	if ($handle = opendir("upload_excel/")) {
			while (false !== ($file = readdir($handle))) {
					if ($file != "." && $file != "..") {
							$v_filetgl[$i]=date("d-m-Y H:i",filemtime("upload_excel/".$file));
							$v_namafile[$i]=$file;
							$i++;
							
					}
			}
			closedir($handle);
		}
	}
}


if($disp_wiz=="1" or $_GET['dwiz']=="1"){
  $i=0;
  if(is_dir("upload_txt/")){
	if ($handle = opendir("upload_txt/")) {
			while (false !== ($file = readdir($handle))) {
					if ($file != "." && $file != "..") {
							$v_filetgl[$i]=date("d-m-Y H:i",filemtime("upload_txt/".$file));
							$v_namafile[$i]=$file;
							$i++;
							
					}
			}
			closedir($handle);
		}
	}
}



$datamap=array("Mobile#","Alias");

?>
<html>
<head>

<link rel="stylesheet" href="../css/general.css"/>
<script LANGUAGE="JavaScript">

function gothere() { 
 var selectList = document.getElementById("typeofdata");
  var selectIndex = selectList.selectedIndex;
  var selectOptions = selectList.options;
  var nilai = selectList[selectIndex].value;
  window.open("list.php?id=<? echo $_GET['id'] ?>&showlink=<? echo $_POST['B1']=='Link Data' ? 1 : ($_GET['showlink']==1 ? 1 : '') ?>&dwiz="+nilai,"_self");
}
</script>


<script LANGUAGE="JavaScript">

function gomapping0() { 
 var selectList = document.getElementById("dbcolumn0");
  var selectIndex = selectList.selectedIndex;
  var selectOptions = selectList.options;
  var nilai = selectList[selectIndex].value;
  window.open("list.php?id=<? echo $_GET['id'] ?>&showlink=<? echo $_POST['B1']=='Link Data' ? 1 : ($_GET['showlink']==1 ? 1 : '') ?>&dwiz=<? echo $dwiz ?>&dbconnect=<? echo $dbconnect ?>&dbtables=<? echo $dbtables ?>&columns1=<? echo $columns[1]=='' ? $_GET['columns1'] : $columns[1] ?>&columns0="+nilai,"_self");
}
</script>


</head>
<body bgcolor="#FFFFFF">
<center><h3>Import</h3></center><p>
<form name="import" enctype="multipart/form-data" action="list.php?&showlink=<? echo $_POST['B1']=='Link Data' ? 1 : ($_GET['showlink']==1 ? 1 : '') ?>#bk_preview" method="POST">
<table  cellpadding="0" cellspacing="0" style="border-collapse: collapse"  width="55%" id="AutoNumber2">
  <tr>
    <td  align="center" style="font-size:12px"><b>
    Type Data</b></td>
    <td width="25%"  align="left"><b>
    <select  id="typeofdata" name="typeofdata" onChange="gothere();">
    	<option <? echo $_GET['dwiz']==0 ? 'selected' : '' ?> value="0"></option>
        <option <? echo $_GET['dwiz']==1 ? 'selected' : ($disp_wiz=='1' ? 'selected' : '') ?> value="1">Txt</option>
    	<option <? echo $_GET['dwiz']==2 ? 'selected' : ($disp_wiz=='2' ? 'selected' : '') ?> value="2">Microsoft Excel(.xls)</option>
    </select>
    	</b></td>
  </tr>
</table><p>
<?



if($_GET['dwiz']==2 or $disp_wiz=="2"){
?>



<table>
<tr>
<td style="font-size:12px">Name Excel file <input type="file"  name="excelfile" size="30" style="font-size:12px"><td>

<td><INPUT type="submit" name="B1" value="Upload"></td>
</tr>
</table>
<div style="height:10px"></div>
<table style="width:100%"><tr><td><span style="font-size:12px;font-weight:bold">List Excel Data:</span></td>
<td align="right" style="margin-right:10px"><INPUT type="submit" name="B1" value="Delete File" border="0"></td>
</tr>
<table  class="adminlist" width="100%" id="AutoNumber2">
  <tr>
  <thead>
    <th width="5%"  align="center"><b>
    </b></th>
    <th width="40%" align="center"><span style="width:12px">
    File Name</span></td>
    <th width="20%"  align="center">
    <span style="width:12px">Upload Date</span></th>
  </tr>
  </thead>
<tfoot></tfoot>
  <?
  for($i=0;$i<count($v_namafile);$i++){
  ?>
  <tr class="row0">
    <td width="5%" align="center"><b><font color="#FFFFFF"><INPUT type="checkbox" name="no<? echo $i ?>" value="<? echo $v_namafile[$i] ?>">
    </font></b></td>
    <td width="40%" align="left">&nbsp;<a href="list.php?id=<? echo $_GET['id'] ?>&dwiz=2&dispex=1&namafileexcel=<? echo $v_namafile[$i] ?>"><? echo $v_namafile[$i] ?></a></td>
    <td width="20%" align="center"><? echo $v_filetgl[$i] ?></td>
  </tr>
  <?php }?>
</table>
<INPUT TYPE="hidden" name="jumfile" value="<? echo count($v_namafile) ?>">
<p>



<?
if($disp_isiexcel=="1" or $_GET['dispex']==1){
	include("ex.php");
?>

<?
}
}

if($_GET['dwiz']==1 or $disp_wiz=="1"){
?>
<table>
<tr>
<td style="font-size:12px">Name file *.TXT <input type="file"  name="filetxt" size="30" style="font-size:12px"><td>

<td><INPUT type="submit" name="B5" value="Upload"></td>
</tr>
</table>
<div style="height:10px"></div>
<table style="width:100%"><tr><td><span style="font-size:12px;font-weight:bold">List File Data:</span></td>
<td align="right" style="margin-right:10px"><INPUT type="submit" name="B5" value="Delete File" border="0"></td>
</tr>
<table  class="adminlist" width="100%" id="AutoNumber2">
  <tr>
  <thead>
    <th width="5%"  align="center"><b>
    </b></th>
    <th width="40%" align="center"><span style="width:12px">
    File Name</span></td>
    <th width="20%"  align="center">
    <span style="width:12px">Upload Date</span></th>
  </tr>
  </thead>
<tfoot></tfoot>
  <?
  for($i=0;$i<count($v_namafile);$i++){
  ?>
  <tr class="row0">
    <td width="5%" align="center"><b><font color="#FFFFFF"><INPUT type="checkbox" name="no<? echo $i ?>" value="<? echo $v_namafile[$i] ?>">
    </font></b></td>
    <td width="40%" align="left">&nbsp;<a href="list.php?id=<? echo $_GET['id'] ?>&dwiz=1&distxt=1&namafiletxt=<? echo $v_namafile[$i] ?>"><? echo $v_namafile[$i] ?></a></td>
    <td width="20%" align="center"><? echo $v_filetgl[$i] ?></td>
  </tr>
  <?php }?>
</table>
<INPUT TYPE="hidden" name="jumfile" value="<? echo count($v_namafile) ?>">
<?php } ?>
<?php if($disp_isitxt=="1" or $_GET['distxt']==1){
	include("read.php");
?>

<?
}
?>
</form>
</body>
</html>
