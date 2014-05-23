<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Login BAN-PNF</title>

<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="Content-Language" content="en" />


<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/favicon.ico" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/webstarter-login.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.vAlign.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/ws.login.init.js"></script>

<!--[if lte IE 6]>

<script type="text/javascript" src="js/jquery.pngFix.js"></script>
<script type="text/javascript" src="js/jquery.pngFix.init.js"></script>

<![endif]-->

<meta charset="UTF-8"></head>

<body>

<div id="bg">
	<div id="core">
		<div id="logo">
			<!--<img src="<?=base_url()?>assets/img/ws_login_logo.png" alt="Logo" />-->
       
		</div>
<center><? 
             
       // $flashmessage = $this->session->flashdata('message');
	//echo ! empty($flashmessage) ? '<p style="font-size:16px">' . $flashmessage . '</p>': '';
	
	?></center>
		<div id="box">
        
			<form name="loginForm" action="<?=base_url()?>login/check" method="post">
				<div id="pleaseLogin">
					<div id="pleaseLoginLeft">lOGIN BAN-PNF</div>
				<!--	<div id="pleaseLoginRight">Please log in to continue</div>
					-->
					<div class="clear"></div>
				</div>
				
				<div class="space20"></div>

				<div id="emailField">
					<input type="text" name="username" value="" />
				</div>
				
				<div class="space10"></div>

				<div id="passwordField">
					<input type="password" name="pass" value="" />
				</div>
				
				<div class="space10"></div>

				<div id="loginButton">
                <input type="submit" value="LOGIN"  style="height:32px"/>
				<!--<img src="<?=base_url()?>assets/img/ws_login_button.png" alt="Login" title="LOGIN" />-->
				</div>

				<div id="forgottenPassword">
					<!--<a href="#lostPassword">Lost your password?</a>-->
				</div>

				<div class="clear"></div>

				<input type="submit" style="display: none;" />
			</form>
		</div><!-- END OF #box -->
        
     
	</div><!-- END OF #core -->
</div><!-- END OF #bg -->

</body>
</html>