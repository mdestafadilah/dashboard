<script>
		Banpt.classData =
		
		// Default, 'manager' tampilkan menu ini.
		{"id":"pkg-Ext","text":"Aplikasi Dashboard System","singleClickExpand":true, children:[

		{"id":"pkg-Ext.pass","text":"Pengaturan Akun","singleClickExpand":true, children:[
		     {"href":"home/ubahpassword","html":"tes","text":"Ubah Password","title":"Ubah Password","id":"Ext.pass.Ubah Password ","isClass":true,"cls":"cls","leaf":true}
		 ]},

		 // Pengecekan level user
		 // Jika admin, tampilkan menu ini
		<?php if($this->session->userdata('level')=='admin'){?>
		
{"id":"pkg-Ext.kategori","text":"Indikator Keuangan","singleClickExpand":true, children:[
			{"href":"home/Target","html":"tes","text":"Target","title":"Target","id":"Ext.akreditasi.Target ","isClass":true,"cls":"cls","leaf":true},
			{"href":"home/Indikator","html":"tes","text":"Indikator","title":"Indikator","id":"Ext.akreditasi.Indikator ","isClass":true,"cls":"cls","leaf":true}
		
		]},
			{"id":"pkg-Ext.berkas","text":"Kategori Keuangan","singleClickExpand":true, children:[
			{"href":"home/kategori_neraca","html":"tes","text":"Kategori Neraca","title":"Kategori Neraca","id":"Ext.akreditasi.Kategori Neraca","isClass":true,"cls":"cls","leaf":true},
			{"href":"home/sub_kategori_neraca","html":"tes","text":"Sub Kategori Neraca","title":"sub Kategori Neraca","id":"Ext.akreditasi.Sub Kategori Neraca","isClass":true,"cls":"cls","leaf":true},
			{"href":"home/sub_level_neraca","html":"tes","text":"Sub Level Neraca","title":"sub Level Neraca","id":"Ext.akreditasi.Sub Level Neraca","isClass":true,"cls":"cls","leaf":true},
			{"href":"home/sub_item","html":"tes","text":"Sub Item","title":"sub Item","id":"Ext.akreditasi.Sub Item","isClass":true,"cls":"cls","leaf":true},
			{"href":"home/kategori","html":"tes","text":"Kategori","title":"Kategori","id":"Ext.akreditasi.Kategori","isClass":true,"cls":"cls","leaf":true},
			{"href":"home/item","html":"tes","text":"Item","title":"Item","id":"Ext.akreditasi.Item ","isClass":true,"cls":"cls","leaf":true}
			
			
			 
			
			

         ]}
			 
		 	
			<?php } ?>
		]};

        Banpt.icons = {
			};
    </script>