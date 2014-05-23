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
                   'id_kategori','nama_kategori','jenis_kategori'
                ],
                root: 'rows', totalProperty: 'results'
            }),
            proxy: new Ext.data.HttpProxy({
                url: BASE_URL + 'kategori/get_all_data',
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
	    url:BASE_URL + 'kategori/add',
        baseCls: 'x-plain',
        labelWidth: 90,
		fileUpload:true,
        items: [
			 {
			xtype: 'textfield',
		fieldLabel: 'Nama Kategori',
		id:'nama_kategori1',
		anchor: '80%',
		name: 'nama_kategori'
		}, 
		{
		 xtype: 'textfield',
		fieldLabel: 'Jenis Kategori',
		anchor: '80%',
		id:'jenis_kategori1',
		name: 'jenis_kategori'
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
	    url:BASE_URL + 'kategori/editData',
         fileUpload: true,
		baseCls: 'x-plain',
        labelWidth: 90,
		

	reader: new Ext.data.JsonReader ({
			root: 'results',
			totalProperty: 'rows',
			id: 'id2',
			fields: [
							
			  'id_kategori','nama_kategori','jenis_kategori'
			]
		}),
        items: [
			new Ext.form.Hidden ({
				name: 'id_kategori'
			}),
			
			 {
			xtype: 'textfield',
		fieldLabel: 'Nama Kategori',
		id:'nama_kategori2',
		anchor: '80%',
		name: 'nama_kategori'
		}, {
				 xtype: 'textfield',
		fieldLabel: 'Jenis Kategori',
		anchor: '80%',
		id:'jenis_kategori2',
		name: 'jenis_kategori'
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
					formEditData.getForm().load({url:BASE_URL + 'kategori/getData/'+ m[0].get('id_kategori'), waitMsg:'Loading'});
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
                            data = data + sel[i].get('id_kategori') + ';';
                        }
						


                        Ext.Ajax.request({
                            url: BASE_URL + 'kategori/delete',
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
                            data = data + sel[i].get('id_kategori') + ';';
                        }
						


                        Ext.Ajax.request({
                            url: BASE_URL + 'kategori/delete',
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
			        header: 'Nama Kategori',
                    dataIndex: 'nama_kategori',
                    sortable: true,
                    width: 100
                }, { 
		             header: 'Jenis Kategori',
                    dataIndex: 'jenis_kategori',
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

    <title>kategori</title>
</head>
<body>

 <div id='dataTable'></div>
	
</body>
</html>