<div style="height:20px"></div>
<INPUT type="submit" name="B5" value="Import"> 
<INPUT type="hidden" name="namafile_hide" value="<? echo ($namafiletxt=='' ? ($_GET['namafiletxt']=='' ? '' : $_GET['namafiletxt']) :$namafiletxt) ?>" /> 

<table   style="font-size:12px">
<tr style="font-size:12px">
<td>File</td>
<td>:</td>
<td><b><? echo ($namafiletxt=='' ? ($_GET['namafiletxt']=='' ? '' : $_GET['namafiletxt']) : $namafiletxt) ?></b></td></tr>
 <tr style="font-size:12px"> 
     <td >Group</td>
	 <td>:</td>
  <td >
   <select name="grup">
<option value="ALL">Pilih Group</option>
<?php $sqlg="SELECT * FROM `group`";
$queryg=mysql_query($sqlg);
while($rowg=mysql_fetch_array($queryg)){
echo "<option value=".$rowg['idGroup'].">".$rowg['groupName']."</option>";
}
?>
</select>
  </td>
  </tr>
</table>

<?php

$handle = fopen("upload_txt/".($namafiletxt=='' ? ($_GET['namafiletxt']=='' ? '' : $_GET['namafiletxt']) : $namafiletxt), "rb");
$contents = stream_get_contents($handle);
fclose($handle);

echo '<table  class="adminlist">
<tr>
<thead>
<th>User</th><th>No</th>  </thead>
<tfoot></tfoot>
</tr>';
$ex1=explode("\n",$contents);
for($a=0;$a<count($ex1);$a++){
$ex2=explode(";",$ex1[$a]);
echo '<tr>';
for($b[$a]=0;$b[$a]<count($ex2);$b[$a]++){
echo '<td>'.$ex2[$b[$a]]."</td> ";
}
echo "</tr>";
}
echo '</table>';
?>
