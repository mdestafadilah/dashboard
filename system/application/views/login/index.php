<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/ext/resources/css/ext-all.css"/>


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ext/adapter/ext/ext-base.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ext/ext-all.js"></script>
     
  <script>
   var BASE_URL = '<?php echo base_url(); ?>' + '/';
  Ext.onReady(function(){

    Ext.QuickTips.init();

    // turn on validation errors beside the field globally
    Ext.form.Field.prototype.msgTarget = 'side';

    var bd = Ext.getBody();




    var login = new Ext.FormPanel({
        labelWidth: 75, // label settings here cascade unless overridden
        url: BASE_URL + 'login/check',
        frame:true,
		renderTo:'login',
        title: 'Login Aplikasi Dashboard System',
        bodyStyle:'padding:5px 5px 0',
        width: 300,
        defaults: {width: 230},
        defaultType: 'textfield',

        items: [{
                fieldLabel: 'Username',
                name: 'username',
				anchor:'80%',
                allowBlank:false
            },{
                fieldLabel: 'Password',
                name: 'pass',
				anchor:'80%',
				inputType:'password',
				allowBlank:false
            }
        ],


		buttons: [{
            text: 'login',
			handler:function(){
				if(login.getForm().isValid()){
				login.getForm().submit({
				  method:'POST',
					waitMsg:'Login Process',
					success: function(login, o){
						Ext.MessageBox.alert('Warning','Login Success! ');
                    window.location=BASE_URL + 'home';

		},
					failure: function(login, o){
			Ext.MessageBox.alert('Warning','Login Failed');
		}
				})
			}
			}
        },{
            text: 'Reset',
			handler: function(){
			login.getForm().reset();
			}
        }]
    });


});

  </script>
<title>Login</title>
</head>

<body>
<div style="margin-left:40%;margin-top:180px">
<img src="<?php echo base_url();?>assets/logojmp.jpg" width="110" height="50">
</div><br/>
<div style="margin-left:40%">

<div id="login"></div>
</div>


</body>
</html>
