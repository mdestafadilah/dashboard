<?
require_once 'Excel/reader.php';


$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read("upload_excel/".($namafileexcel=='' ? ($_GET['namafileexcel']=='' ? '' : $_GET['namafileexcel']) : $namafileexcel) );

?>

<INPUT type="submit" name="B2" value="Import"> 
<INPUT type="hidden" name="namafile_hide" value="<? echo ($namafileexcel=='' ? ($_GET['namafileexcel']=='' ? '' : $_GET['namafileexcel']) : $namafileexcel) ?>">
<table  style="width:60%" style="font-size:12px">
<tr style="font-size:12px">
<td align="right">File:</td>
<td><b><? echo ($namafileexcel=='' ? ($_GET['namafileexcel']=='' ? '' : $_GET['namafileexcel']) : $namafileexcel) ?></b></td></tr>
  <tr style="font-size:12px">
    <td width="40%"  align="right">Start Row No: </td>
    <td   align="left"><INPUT type="text" name="baris" size="5" value=""></td>
  </tr>
 
  <tr style="font-size:12px">
     <td width="40%"  align="right">Phone No:</td>
  <td >
    <select  name="kolom0">
    	<option></option>
   <?
    	 for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
   ?>
    	     <option value="<? echo $j ?>">fields<? echo $j ?> </option>
    <?
       }
    ?>
    </select>
  </td>
  </tr>
  <tr style="font-size:12px"> 
     <td width="35%"  align="right">Alias Name:</td>
  <td bgcolor="#ffffca">
    <select name="kolom1">
      <option></option>
   <?
    	 for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
   ?>
    	     <option value="<? echo $j ?>">fields<? echo $j ?> </option>
    <?
       }
    ?>
    </select>
  </td>
  </tr>
  <tr style="font-size:12px"> 
     <td width="35%"  align="right">Group:</td>
  <td bgcolor="#ffffca">
   <select name="grup">
<option value="ALL">Choose Group</option>
<?php $sqlg="SELECT * FROM `group`";
$queryg=mysql_query($sqlg);
while($rowg=mysql_fetch_array($queryg)){
echo "<option value=".$rowg['idGroup'].">".$rowg['groupName']."</option>";
}
?>
</select>
  </td>
  </tr>
  
  
</table><p>
<table  class="adminlist">
<tr>
<thead>

<?
for ($j = 0; $j <= $data->sheets[0]['numCols']; $j++) {
	if($j==0){
?>
     <th align="center" width="2%" ></th>
<?}else{?>
     <th align="center" width="10%"><b>Fields<? echo $j ?></b></th>
<?
}
}
?>
  </thead>
<tfoot></tfoot>
</tr>
<?
$jum_data=$data->sheets[0]['numRows']>10 ? 10 : $data->sheets[0]['numRows'];
for ($i = 1; $i <= $jum_data; $i++) {
?>
<tr class="row0">
<td width="2%" align="right" bgcolor="#ffffff"><? echo $i ?>&nbsp;</td>
<?
for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
?>
<td width="10%" align="left">&nbsp;<? echo $data->sheets[0]['cells'][$i][$j] ?></td>
<?
}
?>
</tr>
<?
}
?>
</table>
<?
echo $data->sheets[0]['numRows']>10  ? "<big><b>......<b><big>" : "";
?>
