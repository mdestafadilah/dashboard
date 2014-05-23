<html>
<head>
    <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/js/ext/resources/css/ext-all.css'/>

    <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/ext/adapter/ext/ext-base.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/ext/ext-all.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/ext/plugins/FileUploadField.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/ext/plugins/searchfield.js'></script>
     
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/ext/expander.js'></script>
	    <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/fileuploadfield.css'/>
    <script type='text/javascript'>
    var BASE_URL = '<?php echo base_url(); ?>' + '/';
    var BASE_PATH = '<?php echo base_url(); ?>';
    var BASE_ICONS = BASE_PATH + 'assets/icons/';
    Ext.onReady(function() {
        var listData = new Ext.data.Store({
            reader: new Ext.data.JsonReader({
                fields: [
                   'id_sub_level_neraca','id_sub_kategori_neraca','nama_sub_neraca'
                ],
                root: 'rows', totalProperty: 'results'
            }),
            proxy: new Ext.data.HttpProxy({
                url: BASE_URL + 'sub_level_neraca/get_all_data',
                method: 'POST'
            })
        });

        var searchData = new Ext.app.SearchField({
            store: listData,
            params: {start: 0, limit: 100},
            width: 180,
            id: 'fieldUsersSearch'
        });
	var formAdd= new Ext.form.FormPanel({
	    url:BASE_URL + 'sub_level_neraca/add',
        baseCls: 'x-plain',
        labelWidth: 90,
		fileUpload:true,
        items: [
			 {
			xtype: 'textfield',
		fieldLabel: 'Id Sub Kategori Neraca',
		id:'id_sub_kategori_neraca1',
		anchor: '80%',
		name: 'id_sub_kategori_neraca'
		}, 
		{
		 xtype: 'textfield',
		fieldLabel: 'Nama Sub Neraca',
		anchor: '80%',
		id:'nama_sub_neraca1',
		name: 'nama_sub_neraca'
		}
		],
		buttons: [{
            text: 'Save',
			handler:function(){
				formAdd.getForm().submit({
					waitMsg:'Please Wait',
					failure: function(form, action) {
						Ext.MessageBox.alert('Error Message', 'Failed Add Data !');
						formAdd.getForm().reset();
					},
					success: function(form, action) {
						Ext.MessageBox.alert('Confirm', 'Sucsess Add Data');
						listData.load({params:{start:0,limit:100}});
						window.hide();
						formAdd.getForm().reset();
					}
				})
			}
        },{
            text: 'Reset',
			handler: function(){
formAdd.getForm().reset();
			}
        }]
	});

var window = new Ext.Window({
		title: 'Add Data',
        width: 400,
        height:220,        
		layout:'card',
        plain:true,
        bodyStyle:'padding:3px;',
        buttonAlign:'center',
		closeAction:'hide',
		modal: true,
		maximizable:true,
		
		animCollapse:true,
		activeItem:0,
        items: [
		formAdd
		]
    });
	var formEditData= new Ext.form.FormPanel({
	    url:BASE_URL + 'sub_level_neraca/editData',
         fileUpload: true,
		baseCls: 'x-plain',
        labelWidth: 90,
		

	reader: new Ext.data.JsonReader ({
			root: 'results',
			totalProperty: 'rows',
			id: 'id2',
			fields: [
							
			  'id_sub_level_neraca','id_sub_kategori_neraca','nama_sub_neraca'
			]
		}),
        items: [
			new Ext.form.Hidden ({
				name: 'id_sub_level_neraca'
			}),
			
			 {
			xtype: 'textfield',
		fieldLabel: 'Id Sub Kategori Neraca',
		id:'id_sub_kategori_neraca2',
		anchor: '80%',
		name: 'id_sub_kategori_neraca'
		}, {
				 xtype: 'textfield',
		fieldLabel: 'Nama Sub Neraca',
		anchor: '80%',
		id:'nama_sub_neraca2',
		name: 'nama_sub_neraca'
		}
		
		
		
		],
		
		buttons: [{
            text: 'Update',
			handler:function(){
				formEditData.getForm().submit({
					waitMsg:'Please Wait',
					failure: function(form, action) {
						Ext.MessageBox.alert('Error Message', 'Failed Edit Data');
						formEditData.getForm().reset();
					},
					success: function(form, action) {
						Ext.MessageBox.alert('Confirm', 'Succsess Update Data');
						listData.load({params:{start:0,limit:100}});
						windowEdit.hide();
						formEditData.getForm().reset();
					}
				})
			}
        },{
            text: 'Cancel',
			handler: function(){
					windowEdit.hide();
				}
        }]
	});

	var windowEdit = new Ext.Window({
		title: 'Edit Data',
      width: 400,
        height:220,       
		layout:'card',
        plain:true,
        bodyStyle:'padding:3px;',
        buttonAlign:'center',
		closeAction:'hide',
		modal: true,
		maximizable:true,
		
		animCollapse:true,
		activeItem:0,
        items: [
	formEditData
		]
    });
	
        var tbData = new Ext.Toolbar({
            items:[{
                text: 'Add',
                icon: BASE_ICONS + 'add.png',
                handler: function() {
                    window.show();
                }
            } ,'-',

			{
			
			text:'Edit',
			iconCls:'edit-grid',
   icon: BASE_ICONS + 'edit.png',
			
			handler: function()
			{
				var m = dataTable.getSelectionModel().getSelections();
				if(m.length > 0)
				{				
					formEditData.getForm().load({url:BASE_URL + 'sub_level_neraca/getData/'+ m[0].get('id_sub_level_neraca'), waitMsg:'Loading'});
					windowEdit.show();			 
				}
				else
				{
					Ext.MessageBox.alert('Message', 'Pilih data!');
				}
			
			}
		 
		 }
			, '-', {
                text: 'Delete',
                icon: BASE_ICONS + 'delete.png',
                  handler: function()
			{
				var m = dataTable.getSelectionModel().getSelections();
				if(m.length > 0)
				{	  Ext.Msg.show({
                title: 'Confirm',
                msg: 'Delete this data ?',
                buttons: Ext.Msg.YESNO,
                fn: function(btn) {
                    if (btn == 'yes') {
                        var sm = dataTable.getSelectionModel();
                        var sel = sm.getSelections();
                        var data = '';
                        for (i = 0; i<sel.length; i++) {
                            data = data + sel[i].get('id_sub_level_neraca') + ';';
                        }
						


                        Ext.Ajax.request({
                            url: BASE_URL + 'sub_level_neraca/delete',
                            method: 'POST',
                            params: { postdata: data }
						

                        });
                        listData.load();
                    }
                }
            });
					}
				else
				{
					Ext.MessageBox.alert('Message', 'Pilih data!');
				}
			
			}
            }
		, '->', searchData]
        });

        
                   
        function deleteData() {
            Ext.Msg.show({
                title: 'Confirm',
                msg: 'Hapus Data ini ?',
                buttons: Ext.Msg.YESNO,
                fn: function(btn) {
                    if (btn == 'yes') {
                        var sm = dataTable.getSelectionModel();
                        var sel = sm.getSelections();
                        var data = '';
                        for (i = 0; i<sel.length; i++) {
                            data = data + sel[i].get('id_sub_level_neraca') + ';';
                        }
						


                        Ext.Ajax.request({
                            url: BASE_URL + 'sub_level_neraca/delete',
                            method: 'POST',
                            params: { postdata: data }
						

                        });
                        listData.load();
                    }
                }
            });
        }

        var cbGrid = new Ext.grid.CheckboxSelectionModel();

       var dataTable = new Ext.grid.EditorGridPanel({
            frame: true, border: true, stripeRows: true,sm:cbGrid,
            store: listData, loadMask: true, 
            style: 'margin:0 auto;', width: 800,
            columns: [
              new Ext.grid.RowNumberer(), cbGrid, {
			        header: 'Id Sub Kategori Neraca',
                    dataIndex: 'id_sub_kategori_neraca',
                    sortable: true,
                    width: 100
                }, { 
		             header: 'Nama Sub Neraca',
                    dataIndex: 'nama_sub_neraca',
                    sortable: true,
                    width: 100
                }  
            ],
			
		viewConfig: {
			forceFit: true
		},
       width: '100%',
		height:580,
		split: true,
		region: 'north',

            listeners: {
                'rowclick': function() {
                    var sm = dataTable.getSelectionModel();
                    var sel = sm.getSelections();
                }
            },
			 
            tbar: tbData,
			
            bbar: new Ext.PagingToolbar({
                pageSize: 100,
                store: listData,
                displayInfo: true
            })
        });

      dataTable.render('dataTable');	
        listData.load();
    });
    </script>
    <style type='text/css'>
        #divgrid {
            background: #e9e9e9;
            border: 1px solid #d3d3d3;
            margin: 20px;
            padding: 20px;
        }
    </style>

    <title>sub_level_neraca</title>
</head>
<body>

 <div id='dataTable'></div>
	
</body>
</html>