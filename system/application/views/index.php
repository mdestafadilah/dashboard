
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Aplikasi Dashboard System PT. JMP</title>
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/ext/resources/css/ext-all.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/index.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ext/adapter/ext/ext-base.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ext/ext-all.js"></script>


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/index.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/close.js"></script>

	<style type="text/css">
		</style>
	<!-- GC -->
</head>
<body scroll="no" id="docs">

  <div id="loading-mask" style=""></div>
  <div id="loading">
    <div class="loading-indicator"><img src="<?=base_url()?>assets/css/img/large-loading.gif" width="32" height="32" style="margin-right:8px;" align="absmiddle"/>Loading..</div>
  </div>
    <!-- include everything after the loading indicator -->
  <div id="header">
    <div class="api-title"><table style="width:100%">
<tr><td align="left" style="color:#00000"><img src="<?php echo base_url();?>assets/logojmp.jpg" width="80" height="30"></td><td align="right">Selamat Datang, <?php echo $this->session->userdata('nama');?></span> <a href="login/logout" style="font-size:12px">Logout</a>
</td>
</tr></table></div>


  </div>

  <div id="classes"></div>

  <div id="main"></div>
    </body>
</html>
