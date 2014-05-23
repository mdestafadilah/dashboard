<html>
<head>
<title>Financial Dashboard</title>
        <script type="text/javascript" src="<?php echo base_url()?>assets/chart/FusionCharts.js">
        </script>
</head>
<body>
        <table>
		<tr>
		<td style="text-align:center"><span style="font-family:arial">Asset</span><br/><div id="asset"></div><br/><a href="#" onClick="window.open('<?php echo base_url()?>home/drilldown_satu/1','mywindows','menubar=1,resizable=1,scrollbars=yes,width=400,height=300')"><button>detail</button></a></td>
		<td style="text-align:center"><span style="font-family:arial">Kewajiban</span><br/><div id="kewajiban"></div><br/><a href="#" onClick="window.open('<?php echo base_url()?>home/drilldown_satu/2','mywindows','menubar=1,scrollbars=yes,resizable=1,width=400,height=300')"><button>detail</button></a></td></tr>
		<tr>
		<td style="text-align:center"><span style="font-family:arial">Pendapatan</span><br/><div id="pendapatan"></div><br/><a href="#" onClick="window.open('<?php echo base_url()?>home/jenispendapatan_satu/D','mywindows','menubar=1,scrollbars=yes,resizable=1,width=400,height=300')"><button>detail</button></a></td>
		<td style="text-align:center"><span style="font-family:arial">Pengeluaran</span><br/><div id="pengeluaran"></div><br/><a href="#" onClick="window.open('<?php echo base_url()?>home/jenispendapatan_satu/K','mywindows','menubar=1,scrollbars=yes,resizable=1,width=400,height=300')"><button>detail</button></a></td></tr>
		</table>
        <script type="text/javascript"><!--
                var asset = new FusionCharts( "<?php echo base_url()?>assets/chart/AngularGauge.swf", "myChartId", "400", "250", "0", "1" );
                asset.setXMLUrl("<?php echo base_url()?>index.php/sub_item/chartdata/");
                asset.render("asset");
				
				var kewajiban = new FusionCharts( "<?php echo base_url()?>assets/chart/AngularGauge.swf", "myChartId", "400", "250", "0", "1" );
                kewajiban.setXMLUrl("<?php echo base_url()?>index.php/sub_item/chartdata2/");
                kewajiban.render("kewajiban");
				
				var pendapatan = new FusionCharts( "<?php echo base_url()?>assets/chart/AngularGauge.swf", "myChartId", "400", "250", "0", "1" );
                pendapatan.setXMLUrl("<?php echo base_url()?>index.php/sub_item/chartdata3/");
                pendapatan.render("pendapatan");
				
				var pengeluaran = new FusionCharts( "<?php echo base_url()?>assets/chart/AngularGauge.swf", "myChartId", "400", "250", "0", "1" );
                pengeluaran.setXMLUrl("<?php echo base_url()?>index.php/sub_item/chartdata4/");
                pengeluaran.render("pengeluaran");
        // -->
        </script>
</body> 
</html>