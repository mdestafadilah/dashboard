<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body >
<table border=1 >
<tr bgcolor="#FFFF00"><td>No</td><td>Activity</td><td>Value</td></tr>

<?php 
$query=$this->db->query ("SELECT * FROM `kategori` WHERE `jenis_kategori` = K");
$no=0;
foreach($query->result() as $row){
++$no;
?>
<tr ><td><?php echo $no;?></td><td><?php echo $row->nama_kategori;?></td><td></td></tr>
<?php } ?>
</table>
</body>
</html>
