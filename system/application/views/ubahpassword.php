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
        url: BASE_URL + 'user/saveubahpassword',
        frame:true,
		renderTo:'login',
        title: 'Ubah Password',
        bodyStyle:'padding:5px 5px 0',
        width: 400,
        defaults: {width: 230},
        defaultType: 'textfield',

        items: [
		{
                fieldLabel: 'Username',
                name: 'username',
				anchor:'80%',
				readOnly:true,
				value:'<?=$this->session->userdata('username')?>',
                allowBlank:false
            },{
                fieldLabel: 'New Password',
                name: 'password',
				anchor:'80%',
				inputType:'password',
				allowBlank:false
            }
        ],

      
		buttons: [{
            text: 'Ubah Password',
			handler:function(){
				if(login.getForm().isValid()){
				login.getForm().submit({
				  method:'POST',
					waitMsg:'Login Process',
					success: function(login, o){ 
						Ext.MessageBox.alert('Warning','Ganti Password Berhasil! ');
                    
	
		},
					failure: function(login, o){
			Ext.MessageBox.alert('Warning','Gagal Ganti Password');
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
<div style="margin-left:40%;margin-top:200px">
<div id="login"></div>
</div>


</body>
</html>
