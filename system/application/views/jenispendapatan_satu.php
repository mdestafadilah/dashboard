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
$query=$this->db->query("SELECT * FROM `kategori` WHERE `jenis_kategori` ='".$id."'");
$no=1;
$temp=0;
foreach($query->result() as $row){
$queryvalue=$this->db->query("SELECT sum(value) as total FROM `item`where id_kategori ='".$row->id_kategori."'")->row();
$temp=$queryvalue->total+$temp;
?>
<tr ><td><?php echo $no;?></td><td><a href="<?php echo base_url()?>home/jenispendapatan_dua/<?php echo $row->id_kategori;?>"><?php echo $row->nama_kategori;?></a></td><td><?php echo "Rp.".number_format($queryvalue->total,0,0,".")?></td></tr>
<?php

++$no;
 } ?>
<tr ><td><?php echo $no;?></td><td>TOTAL</td><td><?php echo "Rp.".number_format($temp,0,0,".")?></td></tr></table>
</body>
</html>
