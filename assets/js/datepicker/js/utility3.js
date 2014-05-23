function bukaWindow(winURL){
  var Wheight= screen.height*0.51;
  var Wwidth= screen.width*0.35;
  winName = "popWin"
  popWin = window.open(winURL, "kkoinput", "toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=1,resizable=0, width=" + Wwidth + ",height=" + Wheight)
  }

function bukaWindowBesar(winURL){
  var Wheight= screen.height*0.51;
  var Wwidth= screen.width*0.67;
  winName = "popWin"
  popWin = window.open(winURL, "kkoinput", "toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=1,resizable=0, width=" + Wwidth + ",height=" + Wheight)
  }

function focusNext(form, elemName, evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
    if (charCode =  = 13 || charCode =  = 3) {
        form.elements[elemName].focus( );
        return false;
    }
    return true;
}

function tambahIsian(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;


    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';


    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=71%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP align=center><INPUT id=npwp_pbm'+idTerakhir+' TYPE=TEXT NAME=npwp_pbm[] STYLE="width:120px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=center><INPUT id=name_pbm'+idTerakhir+' TYPE=TEXT NAME=name_pbm[] STYLE="width:450px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahIsian('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }

}



function tambahIsian2(idTerakhir,divTerakhir){

    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;


    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';


    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=71%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;'+no+'&nbsp; </TD>\n';

    divBaru += '        <TD VALIGN=TOP align=left><INPUT id=name'+idTerakhir+' TYPE=TEXT NAME=name[] STYLE="width:200px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT id=nip'+idTerakhir+' TYPE=TEXT NAME=nip[] STYLE="width:150px"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><select name=work_unit'+idTerakhir+' STYLE="width:150px">{section name=wulist loop=$wu}<option value="{$wu[wulist].initial}">{$wu[wulist].name}</option>{/section}</select></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><select name=position'+idTerakhir+' STYLE="width:150px;text-align:left;">{section name=poslist loop=$pos}<option value="{$pos[poslist].name}">{$pos[poslist].name}</option>{/section}</select></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahIsian2('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';

    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }

}



function tambahIsianMasterKRA(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;

    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';

    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=71%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=10% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP width=20% align=left><INPUT TYPE=TEXT ID=kra_name'+idTerakhir+' NAME=kra_name[] STYLE="width:300px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=60% align=left><INPUT TYPE=TEXT ID=kra_desc'+idTerakhir+' NAME=kra_desc[] STYLE="width:350px"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahIsianMasterKRA('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}

function tambahIsianMasterOBJ(idTerakhir,divTerakhir){

    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;

    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';


    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=71%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP width=33% align=left><INPUT TYPE=TEXT ID=obj_name'+idTerakhir+' NAME=obj_name[] STYLE="width:300px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=12% align=left><INPUT TYPE=TEXT ID=obj_desc'+idTerakhir+' NAME=obj_desc[] STYLE="width:350px"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahIsianMasterOBJ('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}

function tambahIsianMasterKPI(idTerakhir,divTerakhir){

    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;

    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';


    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=71%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP width=33% align=left><INPUT TYPE=TEXT ID=kpi_name'+idTerakhir+' NAME=kpi_name[] STYLE="width:300px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=12% align=left><INPUT TYPE=TEXT ID=kpi_desc'+idTerakhir+' NAME=kpi_desc[] STYLE="width:350px"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahIsianMasterKPI('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}


function tambahIsianSubjekKuis(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;

    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';

    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=71%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP width=23% align=left><INPUT TYPE=TEXT ID=subject'+idTerakhir+' NAME=subject[] STYLE="width:300px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=63% align=left><INPUT TYPE=TEXT ID=desc'+idTerakhir+' NAME=description[] STYLE="width:400px"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahIsianSubjekKuis('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}

function tambahIsianPertanyaanKuis(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;

    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';

    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=71%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <INPUT TYPE=HIDDEN ID=idqq'+idTerakhir+' NAME=idqq[] VALUE='+idTerakhir+'>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=comp'+idTerakhir+' NAME=comp[] STYLE="width:150px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=quest'+idTerakhir+' NAME=quest[] STYLE="width:150px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_a'+idTerakhir+' NAME=ans_a[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_b'+idTerakhir+' NAME=ans_b[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_c'+idTerakhir+' NAME=ans_c[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_d'+idTerakhir+' NAME=ans_d[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_e'+idTerakhir+' NAME=ans_e[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_f'+idTerakhir+' NAME=ans_f[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_g'+idTerakhir+' NAME=ans_g[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_h'+idTerakhir+' NAME=ans_h[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_i'+idTerakhir+' NAME=ans_i[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP align=left><INPUT TYPE=TEXT ID=ans_j'+idTerakhir+' NAME=ans_j[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahIsianPertanyaanKuis('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}

function tambahIsianJabatan(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;

    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';

    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=71%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP width=10% align=left><INPUT TYPE=TEXT ID=posCode'+idTerakhir+' NAME=posCode[] STYLE="width:100px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=33% align=left><INPUT TYPE=TEXT ID=posName'+idTerakhir+' NAME=posName[] STYLE="width:450px;text-align:left;"></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=5% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahIsianJabatan('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}

function tambahIsianFormCoach(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;

    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';

    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }


	divBaru += '<table width=50% border=0>\n';
    divBaru += '  <tr>\n';
    divBaru += '    <td><li><input ID=target'+idTerakhir+' name=target[] type=text size=65></li></td>\n';
	divBaru += '    <td>&nbsp;<a title=\'ADD NEW ROW\' href="javascript: tambahIsianFormCoach('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a></td>\n';
    divBaru += '  </tr>\n';
    divBaru += '</table>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}

function tambahIsianFormCoach2(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;

    var idTambahan = idTerakhir + 1;

    var no;

    if(idTerakhir==19)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';

    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '  <table>\n';
	divBaru += '  <tr>\n';
    divBaru += '      <td><textarea name=act[] cols=30></textarea></td>\n';
    divBaru += '      <td><textarea name=wan[] cols=30></textarea></td>\n';
    divBaru += '      <td><a title=\'ADD NEW ROW\' href="javascript: tambahIsianFormCoach2('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a></li></td>\n';
    divBaru += '  </tr>\n';
    divBaru += '  </table>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}



function tambahKPI(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;
    var idTambahan = idTerakhir + 1;
    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';


    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=77%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=7% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP width=90% align=left><INPUT TYPE=TEXT ID=kpi_name'+idTerakhir+' NAME=kpi_name[] STYLE="width:400px;text-align:left;"><a href="javascript:bukaWindowBesar(\'master_kko.php?mod=kpiList&field1=kra{$kko[i].kra_id}_name&field2=kra{$kko[i].kra_id}_refid&id={$kko[i].id}\')"><img src=mambo_files/ThemeOffice/icon-penelitian.png border=0 alt=\'Pilih KPI dari Database\'></a></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=17% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahKPI('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}


function tambahOBJ(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;
    var idTambahan = idTerakhir + 1;
    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';


    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=77%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=7% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP width=90% align=left><INPUT TYPE=TEXT ID=obj_name'+idTerakhir+' NAME=kpi_name[] STYLE="width:400px;text-align:left;"><a href="javascript:bukaWindowBesar(\'master_kko.php?mod=objList&field1=kra{$kko[i].kra_id}_name&field2=kra{$kko[i].kra_id}_refid&id={$kko[i].id}\')"><img src=mambo_files/ThemeOffice/icon-penelitian.png border=0 alt=\'Pilih Objective dari Database\'></a></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=17% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahOBJ('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}


function tambahKRA(idTerakhir,divTerakhir){
    var jumlahDiv = document.all.tags("tmk").length;
    var idTambahan = idTerakhir + 1;
    var no;

    if(idTerakhir==9)
        no = idTerakhir + 1;
    else
    	no = idTerakhir + 1 +".";

    var divBaru = '';
    var bgcolor = '';


    if ((idTerakhir % 2) == 0){
        bgcolor = '#D0DAF9';
    }else{
        bgcolor = '#DDE4F9';
    }

    divBaru += '<TABLE CELLSPACING=1 CELLPADDING=2 BGCOLOR=#FFFFFF width=77%>\n';
    divBaru += '<tmk></tmk><TR bgcolor='+bgcolor+'>\n';
    divBaru += '        <TD VALIGN=TOP width=7% align=center> &nbsp;'+no+'&nbsp; </TD>\n';
    divBaru += '        <TD VALIGN=TOP width=90% align=left><INPUT TYPE=TEXT ID=kra_name'+idTerakhir+' NAME=kpi_name[] STYLE="width:400px;text-align:left;"><a href="javascript:bukaWindow(\'master_kko.php?mod=kraList&field1=kra{$kko[i].kra_id}_name&field2=kra{$kko[i].kra_id}_refid&id={$kko[i].id}\')"><img src=mambo_files/ThemeOffice/icon-penelitian.png border=0 alt=\'Pilih KRA dari Database\'></a></TD>\n';
    divBaru += '        <TD VALIGN=TOP width=17% align=center> &nbsp;<a title="ADD NEW ROW" href="javascript: tambahKRA('+idTambahan+',\'div'+idTambahan+'\')"><img src=img/page.gif height=14 width=14 border=0></a>&nbsp;</TD>\n';
    divBaru += '    </TR>\n';
    divBaru += '</TABLE>\n';

    if (idTerakhir >= jumlahDiv){
        document.getElementById(divTerakhir).innerHTML= divBaru;
    }
}

