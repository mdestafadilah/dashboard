var defaultDetik=3;
var intervals;
var setUrlNext;
var ajaxObj;
var ajaxWaitObj;
var ajaxWaitObjChange;
var xLoad=false;  

var detikLogin;

function execJS(node) {
	var bSaf = (navigator.userAgent.indexOf('Safari') != -1);
	var bOpera = (navigator.userAgent.indexOf('Opera') != -1);
	var bMoz = (navigator.appName == 'Netscape');

	var st = node.getElementsByTagName('SCRIPT');

	var strExec;

	for(var i=0;i<st.length; i++) {
		if (bSaf) {
			strExec = st[i].innerHTML;
		} else if (bOpera) {
			strExec = st[i].text;
		} else if (bMoz) {
			strExec = st[i].textContent;
		} else {
			strExec = st[i].text;
		}

		try {
			eval(strExec);
		} catch(e) {
			alert(e);
		}
	}
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  
  if(!d) d=document; 
  if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
  }
  if(!(x=d[n])&&d.all) x=d.all[n]; 
  for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); 
  return x;
}

function searchAjaxPage(host,imgloc,page,mod){
	if ($('searchText')){
		var textSearch = $('searchText').value;
	}
	else{
		var textSearch = MM_findObj('searchText').value;
	}
	var opt	= {
		method: 'get',
		parameters: 't=ajaxlist&id='+page+'&jenis='+mod+'&r='+textSearch,  
		onLoading: function(t) {
			$('divKiri').innerHTML = '<table border="0" width="100%" height="100"><tr valign="middle"><td align="center"><img src="'+imgloc+'" border="0"><br>Loading Page ...</td></tr></table>';
		},
		onComplete: function(t) {
			$('divKiri').innerHTML = t.responseText;
			execJS($('divKiri'));
		},
		onFailure: function(t) {
			$('divKiri').innerHTML = t.status;
		}
	};
	new Ajax.Request(host,opt);
}

function searchAjax(host,imgloc,page,mod){
	if ($('searchText')){
		var textSearch = $('searchText').value;
	}
	else{
		var textSearch = MM_findObj('searchText').value;
	}
	var opt	= {
		method: 'get',
		parameters: 't=ajaxlist&id='+page+'&jenis='+mod+'&r='+textSearch, 
		onLoading: function(t) {
			$('divajax').innerHTML = '<table border="0" width="100%" height="100"><tr valign="middle" align="center"><td align="center"><img src="'+imgloc+'" border="0"><br>Loading Page ...</td></tr></table>';
			$('bodyWindows').innerHTML = '<table border="0" width="100%" height="100"><tr valign="middle" align="center"><td align="center"><img src="'+imgloc+'" border="0"><br>Loading Page ...</td></tr></table>';
		},
		onComplete: function(t) {
			$('divajax').innerHTML = t.responseText;
			execJS($('divajax'));
		},
		onFailure: function(t) {
			$('divajax').innerHTML = t.status;
		}
	};
	new Ajax.Request(host,opt);
}

function searchAjaxNext(host,imgloc){
	$('divajax').innerHTML = '<table border="0" width="100%" height="100"><tr valign="middle" align="center"><td align="center"><img src="'+imgloc+'" border="0"><br>Loading Page ...</td></tr></table>';
	$('bodyWindows').innerHTML = '<table border="0" width="100%" height="100"><tr valign="middle" align="center"><td align="center"><img src="'+imgloc+'" border="0"><br>Loading Page ...</td></tr></table>';
	var opt	= {
		method: 'get',
		onComplete: function(t) {
			$('divajax').innerHTML = t.responseText;
			execJS($('divajax'));
		},
		onFailure: function(t) {
			$('divajax').innerHTML = t.status;
		}
	};
	new Ajax.Request(host,opt);
}

function listsekolahover(selObj){
	selObj.style.backgroundColor='#FFCC00';
	selObj.style.color='#FFFFFF';
	selObj.style.cursor='pointer';
}

function listsekolahout(selObj){
	selObj.style.backgroundColor='';
	selObj.style.color='';
	selObj.style.cursor='default';
}

function listlink(varLink,imgloc,objNext){
	if(objNext){
		$('xLoad').value = 'true';
	}
	$('bodyWindows').innerHTML = '<table border="0" width="100%" height="150"><tr valign="middle" align="center"><td align="center"><img src="'+imgloc+'" border="0"><br><br>Loading Page ...</td></tr></table>';
	var opt	= {
		method: 'get',
		onComplete: function(t) {
			$('bodyWindows').innerHTML = t.responseText;
			execJS($('bodyWindows'));
		},
		onFailure: function(t) {
			$('bodyWindows').innerHTML = t.status;
		}
	};
	new Ajax.Request(varLink,opt);
}

function liststatistikover(selObj){
	selObj.style.backgroundColor='#4F89C7';
	selObj.style.color='#000000';
	selObj.style.cursor='hand';
}

function liststatistikout(selObj){
	selObj.style.backgroundColor='';
	selObj.style.color='#FFFFFF';
	selObj.style.cursor='default';
}

function jumpAjax(selObj){
  eval(selObj.options[selObj.selectedIndex].value+';');
}

function goJumpAjax(selName){
  var selObj = $(selName); if (selObj) jumpAjax(selObj);
}

function jumpPage(selObj){
  location.href = selObj.options[selObj.selectedIndex].value;
}

function goJumpPage(selName){
  var selObj = $(selName); if (selObj) jumpPage(selObj);
}

function changeBg(objName,colorNum){
	var selObj = objName;
	selObj.style.backgroundColor=colorNum;
	if (colorNum == '' ){
		selObj.style.cursor='default';
	}
	else{
		selObj.style.cursor='pointer';
	}
}

function linkPage(urlNext){
	window.location=urlNext;
}

function echoSiteMap(txtChange,objName){
	var selObj = $(objName);
	selObj.innerHTML = txtChange;
}

function redirectNext(){
	if (detikLogin > 1){
		detikLogin=detikLogin-1;
		ajaxObj.innerHTML = detikLogin;
	}
	else{
		window.location = setUrlNext;
		detikLogin = defaultDetik;
		clearInterval(intervals);
	}
}

function pageRedirect(urlNext,objName){
	var selObj = $(objName);
	detikLogin = defaultDetik;
	selObj.innerHTML = detikLogin;
	setUrlNext = urlNext;
	ajaxObj = selObj;	
	intervals = setInterval(redirectNext,1000);
}

function redirectDl(){
	if (detikLogin > 1){
		detikLogin=detikLogin-1;
		ajaxObj.innerHTML = detikLogin;
	}
	else{
		window.location = setUrlNext;
		detikLogin = defaultDetik;
		ajaxWaitObj.innerHTML = ajaxWaitObjChange;
		clearInterval(intervals);
	}
}

function dlWait(urlNext,divGlobal,spanTime,replaceObj){
	var selObj1 = $(divGlobal);
	var selObj2 = $(spanTime);
	detikLogin = defaultDetik;
	selObj2.innerHTML = detikLogin;
	setUrlNext = urlNext;
	ajaxObj = selObj2;	
	ajaxWaitObj = selObj1;
	ajaxWaitObjChange = replaceObj;
	intervals = setInterval(redirectDl,1000);
}

function quest(urlNext,txtQuest){
	if (confirm(txtQuest)) {
	    window.location=urlNext;
	}	
}

function openSubWin(url, nm, x, y, w, h, atts) {
	nm = nm || "subwindow";
	atts = atts || "menubar,resizable,scrollbars";
	w = w || 600; 
	h = h || 450;
	x = (typeof x=="number")? x: window.opera? 100: Math.round( (screen.availWidth - w)/2 );
	y = (typeof y=="number")? y: window.opera? 20: Math.round( (screen.availHeight - h)/2 );
	atts += ',width='+w+',height='+h+',left='+x+',top='+y;
	var win = window.open(url, nm, atts); 
	if (win) {
		if (!win.closed) { 
			win.resizeTo(w,h); 
			win.moveTo(x,y); 
			win.focus(); 
			return false; 
		}
	} 
	return true;
}

function setCookie(name, value, expires, path, domain, secure) {
    document.cookie= name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires.toGMTString() : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

function getCookie(cookieName) {
	var cookieValue = '';
	var posName = document.cookie.indexOf(escape(cookieName) + '=');
	if (posName != -1) {
		var posValue = posName + (escape(cookieName) + '=').length;
		var endPos = document.cookie.indexOf(';', posValue);
		if (endPos != -1) cookieValue = unescape(document.cookie.substring(posValue, endPos));
		else cookieValue = unescape(document.cookie.substring(posValue));
	}
	return (cookieValue);
};

function listpenelusuranover(selObj){
	selObj.style.backgroundColor='#D9E3EE';
	selObj.style.color='#000000';
	selObj.style.cursor='crosshair';
}

function listpenelusuranout(selObj){
	selObj.style.backgroundColor='';
	selObj.style.color='#FFFFFF';
	selObj.style.cursor='default';
}

function listpenelusuranclick(checkObjName){
	var selObj = $(checkObjName);
//	selObj.checked = !selObj.checked;	
}

function callAjax(urls,pars,objLoad1,objLoad2,MsgLoad){
	$(objLoad2).innerHTML = MsgLoad;
	$(objLoad1).innerHTML = MsgLoad;
	var opt	= {
		method: 'get',
		parameters: pars, 
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);
}
function loginAjax(host,formserialze,imgloc){
	var username = '';
	var password = '';
	var nextid = '';
	var nextjenis = '';
	var nextstinput = '';
	if ($('usernamefield')){ username = '&usernamefield='+$('username').value; }
	if ($('passwordfield')){ password = '&passwordfield='+$('password').value; }
	if ($('nextid')){ nextid = '&nextid='+$('nextid').value; }
	if ($('nextjenis')){ nextjenis = '&nextjenis='+$('nextjenis').value; }
	if ($('nextstinput')){ nextstinput = '&nextstinput='+$('nextstinput').value; }
	var opt	= {
		method: 'get',
		parameters: 't=script&id=login&'+username+password+nextid+nextjenis+nextstinput, 
		onComplete: function(t) {
			$('login').innerHTML = t.responseText;
			execJS($('login'));
		},
		onFailure: function(t) {
			$('login').innerHTML = t.status;
		}
	};
	new Ajax.Request(host,opt);
}

function loginPage(urls,pars,objLoad1,MsgLoad){
	if ($('username')){ username = '&username='+$('username').value; }
	if ($('password')){ password = '&password='+$('password').value; }

	$(objLoad1).innerHTML = MsgLoad;
	var opt	= {
		method: 'get',
		parameters: username+password, 
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);
}

function addEvaluasiParam(urls,pars,objLoad1,MsgLoad){
	if ($('param1')){ param1 = '&param1='+$('param1').value; } else param1 =''
	if ($('param2')){ param2 = '&param2='+$('param2').value; } else param2 =''
	if ($('param3')){ param3 = '&param3='+$('param3').value; } else param3 =''
	if ($('param4')){ param4 = '&param4='+$('param4').value; } else param4 =''
	if ($('param5')){ param5 = '&param5='+$('param5').value; } else param5 =''
	if ($('param6')){ param6 = '&param6='+$('param6').value; } else param6 =''
	if ($('param7')){ param7 = '&param7='+$('param7').value; } else param7 =''
	if ($('param8')){ param8 = '&param8='+$('param8').value; } else param8 =''
	if ($('param9')){ param9 = '&param9='+$('param9').value; } else param9 =''
	if ($('param10')){ param10 = '&param10='+$('param10').value; } else param10 =''
	if ($('paramVal1')){ param11 = '&paramVal1='+$('paramVal1').value; } else param11 =''
	if ($('paramVal2')){ param12 = '&paramVal2='+$('paramVal2').value; } else param12 =''
	if ($('paramVal3')){ param13 = '&paramVal3='+$('paramVal3').value; } else param13 =''
	if ($('paramVal4')){ param14 = '&paramVal4='+$('paramVal4').value; } else param14 =''
	if ($('paramVal5')){ param15 = '&paramVal5='+$('paramVal5').value; } else param15 =''
	if ($('paramVal6')){ param16 = '&paramVal6='+$('paramVal6').value; } else param16 =''
	if ($('paramVal7')){ param17 = '&paramVal7='+$('paramVal7').value; } else param17 =''
	if ($('paramVal8')){ param18 = '&paramVal8='+$('paramVal8').value; } else param18 =''
	if ($('paramVal9')){ param19 = '&paramVal9='+$('paramVal9').value; } else param19 =''
	if ($('paramVal10')){ param20 = '&paramVal10='+$('paramVal10').value; } else param20 =''
	alert(param11+':param11');

	if ($('paramVa21')){ param21 = '&paramVa21='+$('paramVa21').value; } else param21 =''
	if ($('paramVa22')){ param22 = '&paramVa22='+$('paramVa22').value; } else param22 =''
	if ($('paramVa23')){ param23 = '&paramVa23='+$('paramVa23').value; } else param23 =''
	if ($('paramVa24')){ param24 = '&paramVa24='+$('paramVa24').value; } else param24 =''
	if ($('paramVa25')){ param25 = '&paramVa25='+$('paramVa25').value; } else param25 =''
	if ($('paramVa26')){ param26 = '&paramVa26='+$('paramVa26').value; } else param26 =''
	if ($('paramVa27')){ param27 = '&paramVa27='+$('paramVa27').value; } else param27 =''
	if ($('paramVa8')){ param28 = '&paramVa28='+$('paramVa28').value; } else param28 =''
	if ($('paramVa29')){ param29 = '&paramVa29='+$('paramVa29').value; } else param29 =''
	if ($('paramVa30')){ param30 = '&paramVa30='+$('paramVa30').value; } else param30 =''

	if ($('paramVa31')){ param31 = '&paramVa31='+$('paramVa31').value; } else param31 =''
	if ($('paramVa32')){ param32 = '&paramVa32='+$('paramVa32').value; } else param32 =''
	if ($('paramVa33')){ param33 = '&paramVa33='+$('paramVa33').value; } else param33 =''
	if ($('paramVa34')){ param34 = '&paramVa34='+$('paramVa34').value; } else param34 =''
	if ($('paramVa35')){ param35 = '&paramVa35='+$('paramVa35').value; } else param35 =''
	if ($('paramVa36')){ param36 = '&paramVa36='+$('paramVa36').value; } else param36 =''
	if ($('paramVa37')){ param37 = '&paramVa37='+$('paramVa37').value; } else param37 =''
	if ($('paramVa38')){ param38 = '&paramVa38='+$('paramVa38').value; } else param38 =''
	if ($('paramVa39')){ param39 = '&paramVa39='+$('paramVa39').value; } else param39 =''
	if ($('paramVa40')){ param40 = '&paramVa40='+$('paramVa40').value; } else param40 =''
	$(objLoad1).innerHTML = MsgLoad;
	//parameters: mod+id_user+id_kelompok+param1+param2+param3+param4+param5, 
	var opt	= {
		method: 'get',
		parameters: pars+'&'+param1+param2+param3+param4+param5+param6+param7+param8+param9+param10+param11+param12+param13+param14+param15+param16+param17+param18+param19+param20+param21+param22+param23+param24+param25+param26+param27+param28+param29+param30+param31+param32+param33+param34+param35+param36+param37+param38+param39+param40, 
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);

}
function addTenParam(urls,pars,objLoad1,MsgLoad){
	if ($('param1')){ param1 = '&param1='+$('param1').value; } else param1 =''
	if ($('param2')){ param2 = '&param2='+$('param2').value; } else param2 =''
	if ($('param3')){ param3 = '&param3='+$('param3').value; } else param3 =''
	if ($('param4')){ param4 = '&param4='+$('param4').value; } else param4 =''
	if ($('param5')){ param5 = '&param5='+$('param5').value; } else param5 =''
	if ($('param6')){ param6 = '&param6='+$('param6').value; } else param6 =''
	if ($('param7')){ param7 = '&param7='+$('param7').value; } else param7 =''
	if ($('param8')){ param8 = '&param8='+$('param8').value; } else param8 =''
	if ($('param9')){ param9 = '&param9='+$('param9').value; } else param9 =''
	if ($('param10')){ param10 = '&param10='+$('param10').value; } else param10 =''
	if ($('paramVal1')){ param11 = '&paramVal1='+$('paramVal1').value; } else param11 =''
	if ($('paramVal2')){ param12 = '&paramVal2='+$('paramVal2').value; } else param12 =''
	if ($('paramVal3')){ param13 = '&paramVal3='+$('paramVal3').value; } else param13 =''
	if ($('paramVal4')){ param14 = '&paramVal4='+$('paramVal4').value; } else param14 =''
	if ($('paramVal5')){ param15 = '&paramVal5='+$('paramVal5').value; } else param15 =''
	if ($('paramVal6')){ param16 = '&paramVal6='+$('paramVal6').value; } else param16 =''
	if ($('paramVal7')){ param17 = '&paramVal7='+$('paramVal7').value; } else param17 =''
	if ($('paramVal8')){ param18 = '&paramVal8='+$('paramVal8').value; } else param18 =''
	if ($('paramVal9')){ param19 = '&paramVal9='+$('paramVal9').value; } else param19 =''
	if ($('paramVal10')){ param20 = '&paramVal10='+$('paramVal10').value; } else param20 =''

	$(objLoad1).innerHTML = MsgLoad;
	//parameters: mod+id_user+id_kelompok+param1+param2+param3+param4+param5, 
	var opt	= {
		method: 'get',
		parameters: pars+'&'+param1+param2+param3+param4+param5+param6+param7+param8+param9+param10+param11+param12+param13+param14+param15+param16+param17+param18+param19+param20, 
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);

}


function addParam(urls,pars,objLoad1,MsgLoad){
	if ($('name1_id')){ param1 = '&name1_id='+$('name1_id').value; }
	if ($('name2_id')){ param2 = '&name2_id='+$('name2_id').value; }
	if ($('name3_id')){ param3 = '&name3_id='+$('name3_id').value; }
	if ($('name4_id')){ param4 = '&name4_id='+$('name4_id').value; }
	if ($('name5_id')){ param5 = '&name5_id='+$('name5_id').value; }

	$(objLoad1).innerHTML = MsgLoad;
	//parameters: mod+id_user+id_kelompok+param1+param2+param3+param4+param5, 
	var opt	= {
		method: 'get',
		parameters: param1+param2+param3+param4+param5, 
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);
}

function saveTindakan(urls,pars,objLoad1,MsgLoad){
	if ($('tindakan_sel')){ param1 = '&tindakan_sel='+$('tindakan_sel').value; } else param1 =''
	if ($('keterangan')){ ket1 = '&keterangan='+$('keterangan').value; } else ket1 =''

	if ($('tindakan_sel_1_1')){ param2 = '&tindakan_sel_1_1='+$('tindakan_sel_1_1').value; } else param2 =''
	if ($('keterangan_1_1')){ ket2 = '&keterangan_1_1='+$('keterangan_1_1').value; } else ket2 =''

	if ($('tindakan_sel_1_2')){ param3 = '&tindakan_sel_1_2='+$('tindakan_sel_1_2').value; } else param3 =''
	if ($('keterangan_1_2')){ ket3 = '&keterangan_1_2='+$('keterangan_1_2').value; } else ket3 =''

	if ($('tindakan_sel_1_3')){ param4 = '&tindakan_sel_1_3='+$('tindakan_sel_1_3').value; } else param4 =''
	if ($('keterangan_1_3')){ ket4 = '&keterangan_1_3='+$('keterangan_1_3').value; } else ket4 =''

	if ($('tindakan_sel_1_4')){ param5 = '&tindakan_sel_1_4='+$('tindakan_sel_1_4').value; } else param5 =''
	if ($('keterangan_1_4')){ ket5 = '&keterangan_1_4='+$('keterangan_1_4').value; } else ket5 =''

	if ($('tindakan_sel_1_5')){ param6 = '&tindakan_sel_1_5='+$('tindakan_sel_1_5').value; } else param6 =''
	if ($('keterangan_1_5')){ ket6 = '&keterangan_1_5='+$('keterangan_1_5').value; } else ket6 =''

	if ($('tindakan_sel_1_6')){ param7 = '&tindakan_sel_1_6='+$('tindakan_sel_1_6').value; } else param7 =''
	if ($('keterangan_1_6')){ ket7 = '&keterangan_1_6='+$('keterangan_1_6').value; } else ket7 =''

	if ($('tindakan_sel_1_7')){ param8 = '&tindakan_sel_1_7='+$('tindakan_sel_1_7').value; } else param8 =''
	if ($('keterangan_1_7')){ ket8 = '&keterangan_1_7='+$('keterangan_1_7').value; } else ket8 =''


	if ($('tindakan_sel_2_1')){ param2a = '&tindakan_sel_2_1='+$('tindakan_sel_2_1').value; } else param2a =''
	if ($('keterangan_2_1')){ ket2a = '&keterangan_2_1='+$('keterangan_2_1').value; } else ket2a =''

	if ($('tindakan_sel_2_2')){ param3a = '&tindakan_sel_2_2='+$('tindakan_sel_2_2').value; } else param3a =''
	if ($('keterangan_2_2')){ ket3a = '&keterangan_2_2='+$('keterangan_2_2').value; } else ket3a =''

	if ($('tindakan_sel_2_3')){ param4a = '&tindakan_sel_2_3='+$('tindakan_sel_2_3').value; } else param4a =''
	if ($('keterangan_2_3')){ ket4a = '&keterangan_2_3='+$('keterangan_2_3').value; } else ket4a =''

	if ($('tindakan_sel_2_4')){ param5a = '&tindakan_sel_2_4='+$('tindakan_sel_2_4').value; } else param5a =''
	if ($('keterangan_2_4')){ ket5a = '&keterangan_2_4='+$('keterangan_2_4').value; } else ket5a =''

	if ($('tindakan_sel_2_5')){ param6a = '&tindakan_sel_2_5='+$('tindakan_sel_2_5').value; } else param6a =''
	if ($('keterangan_2_5')){ ket6a = '&keterangan_2_5='+$('keterangan_2_5').value; } else ket6a =''

	if ($('tindakan_sel_2_6')){ param7a = '&tindakan_sel_2_6='+$('tindakan_sel_2_6').value; } else param7a =''
	if ($('keterangan_2_6')){ ket7a = '&keterangan_2_6='+$('keterangan_2_6').value; } else ket7a =''

	if ($('tindakan_sel_2_7')){ param8a = '&tindakan_sel_2_7='+$('tindakan_sel_2_7').value; } else param8a =''
	if ($('keterangan_2_7')){ ket8a = '&keterangan_2_7='+$('keterangan_2_7').value; } else ket8a =''


	if ($('tindakan_sel_3_1')){ param2b = '&tindakan_sel_3_1='+$('tindakan_sel_3_1').value; } else param2b =''
	if ($('keterangan_3_1')){ ket2b = '&keterangan_3_1='+$('keterangan_3_1').value; } else ket2b =''

	if ($('tindakan_sel_3_2')){ param3b = '&tindakan_sel_3_2='+$('tindakan_sel_3_2').value; } else param3b =''
	if ($('keterangan_3_2')){ ket3b = '&keterangan_3_2='+$('keterangan_3_2').value; } else ket3b =''

	if ($('tindakan_sel_3_3')){ param4b = '&tindakan_sel_3_3='+$('tindakan_sel_3_3').value; } else param4b =''
	if ($('keterangan_3_3')){ ket4b = '&keterangan_3_3='+$('keterangan_3_3').value; } else ket4b =''

	if ($('tindakan_sel_3_4')){ param5b = '&tindakan_sel_3_4='+$('tindakan_sel_3_4').value; } else param5b =''
	if ($('keterangan_3_4')){ ket5b = '&keterangan_3_4='+$('keterangan_3_4').value; } else ket5b =''

	if ($('tindakan_sel_3_5')){ param6b = '&tindakan_sel_3_5='+$('tindakan_sel_3_5').value; } else param6b =''
	if ($('keterangan_3_5')){ ket6b = '&keterangan_3_5='+$('keterangan_3_5').value; } else ket6b =''

	if ($('tindakan_sel_3_6')){ param7b = '&tindakan_sel_3_6='+$('tindakan_sel_3_6').value; } else param7b =''
	if ($('keterangan_3_6')){ ket7b = '&keterangan_3_6='+$('keterangan_3_6').value; } else ket7b =''

	if ($('tindakan_sel_3_7')){ param8b = '&tindakan_sel_3_7='+$('tindakan_sel_3_7').value; } else param8b =''
	if ($('keterangan_3_7')){ ket8b = '&keterangan_3_7='+$('keterangan_3_7').value; } else ket8b =''


	if ($('tindakan_sel_4_1')){ param2c = '&tindakan_sel_4_1='+$('tindakan_sel_4_1').value; } else param2c =''
	if ($('keterangan_4_1')){ ket2c = '&keterangan_4_1='+$('keterangan_4_1').value; } else ket2c =''

	if ($('tindakan_sel_4_2')){ param3c = '&tindakan_sel_4_2='+$('tindakan_sel_4_2').value; } else param3c =''
	if ($('keterangan_4_2')){ ket3c = '&keterangan_4_2='+$('keterangan_4_2').value; } else ket3c =''

	if ($('tindakan_sel_4_3')){ param4c = '&tindakan_sel_4_3='+$('tindakan_sel_4_3').value; } else param4c =''
	if ($('keterangan_4_3')){ ket4c = '&keterangan_4_3='+$('keterangan_4_3').value; } else ket4c =''

	if ($('tindakan_sel_4_4')){ param5c = '&tindakan_sel_4_4='+$('tindakan_sel_4_4').value; } else param5c =''
	if ($('keterangan_4_4')){ ket5c = '&keterangan_4_4='+$('keterangan_4_4').value; } else ket5c =''

	if ($('tindakan_sel_4_5')){ param6c = '&tindakan_sel_4_5='+$('tindakan_sel_4_5').value; } else param6c =''
	if ($('keterangan_4_5')){ ket6c = '&keterangan_4_5='+$('keterangan_4_5').value; } else ket6c =''

	if ($('tindakan_sel_4_6')){ param7c = '&tindakan_sel_4_6='+$('tindakan_sel_4_6').value; } else param7c =''
	if ($('keterangan_4_6')){ ket7c = '&keterangan_4_6='+$('keterangan_4_6').value; } else ket7c =''

	if ($('tindakan_sel_4_7')){ param8c = '&tindakan_sel_4_7='+$('tindakan_sel_4_7').value; } else param8c =''
	if ($('keterangan_4_7')){ ket8c = '&keterangan_4_7='+$('keterangan_4_7').value; } else ket8c =''


	if ($('tindakan_sel_5_1')){ param2d = '&tindakan_sel_5_1='+$('tindakan_sel_5_1').value; } else param2d =''
	if ($('keterangan_5_1')){ ket2d = '&keterangan_5_1='+$('keterangan_5_1').value; } else ket2d =''

	if ($('tindakan_sel_5_2')){ param3d = '&tindakan_sel_5_2='+$('tindakan_sel_5_2').value; } else param3d =''
	if ($('keterangan_5_2')){ ket3d = '&keterangan_5_2='+$('keterangan_5_2').value; } else ket3d =''

	if ($('tindakan_sel_5_3')){ param4d = '&tindakan_sel_5_3='+$('tindakan_sel_5_3').value; } else param4d =''
	if ($('keterangan_5_3')){ ket4d = '&keterangan_5_3='+$('keterangan_5_3').value; } else ket4d =''

	if ($('tindakan_sel_5_4')){ param5d = '&tindakan_sel_5_4='+$('tindakan_sel_5_4').value; } else param5d =''
	if ($('keterangan_5_4')){ ket5d = '&keterangan_5_4='+$('keterangan_5_4').value; } else ket5d =''

	if ($('tindakan_sel_5_5')){ param6d = '&tindakan_sel_5_5='+$('tindakan_sel_5_5').value; } else param6d =''
	if ($('keterangan_5_5')){ ket6d = '&keterangan_5_5='+$('keterangan_5_5').value; } else ket6d =''

	if ($('tindakan_sel_5_6')){ param7d = '&tindakan_sel_5_6='+$('tindakan_sel_5_6').value; } else param7d =''
	if ($('keterangan_5_6')){ ket7d = '&keterangan_5_6='+$('keterangan_5_6').value; } else ket7d =''

	if ($('tindakan_sel_5_7')){ param8d = '&tindakan_sel_5_7='+$('tindakan_sel_5_7').value; } else param8d =''
	if ($('keterangan_5_7')){ ket8d = '&keterangan_5_7='+$('keterangan_5_7').value; } else ket8d =''


	if ($('tindakan_sel_6_1')){ param2e = '&tindakan_sel_6_1='+$('tindakan_sel_6_1').value; } else param2e =''
	if ($('keterangan_6_1')){ ket2e = '&keterangan_6_1='+$('keterangan_6_1').value; } else ket2e =''

	if ($('tindakan_sel_6_2')){ param3e = '&tindakan_sel_6_2='+$('tindakan_sel_6_2').value; } else param3e =''
	if ($('keterangan_6_2')){ ket3e = '&keterangan_6_2='+$('keterangan_6_2').value; } else ket3e =''

	if ($('tindakan_sel_6_3')){ param4e = '&tindakan_sel_6_3='+$('tindakan_sel_6_3').value; } else param4e =''
	if ($('keterangan_6_3')){ ket4e = '&keterangan_6_3='+$('keterangan_6_3').value; } else ket4e =''

	if ($('tindakan_sel_6_4')){ param5e = '&tindakan_sel_6_4='+$('tindakan_sel_6_4').value; } else param5e =''
	if ($('keterangan_6_4')){ ket5e = '&keterangan_6_4='+$('keterangan_6_4').value; } else ket5e =''

	if ($('tindakan_sel_6_5')){ param6e = '&tindakan_sel_6_5='+$('tindakan_sel_6_5').value; } else param6e =''
	if ($('keterangan_6_5')){ ket6e = '&keterangan_6_5='+$('keterangan_6_5').value; } else ket6e =''

	if ($('tindakan_sel_6_6')){ param7e = '&tindakan_sel_6_6='+$('tindakan_sel_6_6').value; } else param7e =''
	if ($('keterangan_6_6')){ ket7e = '&keterangan_6_6='+$('keterangan_6_6').value; } else ket7e =''

	if ($('tindakan_sel_6_7')){ param8e = '&tindakan_sel_6_7='+$('tindakan_sel_6_7').value; } else param8e =''
	if ($('keterangan_6_7')){ ket8e = '&keterangan_6_7='+$('keterangan_6_7').value; } else ket8e =''


	if ($('tindakan_sel_7_1')){ param2f = '&tindakan_sel_7_1='+$('tindakan_sel_7_1').value; } else param2f =''
	if ($('keterangan_7_1')){ ket2f = '&keterangan_7_1='+$('keterangan_7_1').value; } else ket2f =''

	if ($('tindakan_sel_7_2')){ param3f = '&tindakan_sel_7_2='+$('tindakan_sel_7_2').value; } else param3f =''
	if ($('keterangan_7_2')){ ket3f = '&keterangan_7_2='+$('keterangan_7_2').value; } else ket3f =''

	if ($('tindakan_sel_7_3')){ param4f = '&tindakan_sel_7_3='+$('tindakan_sel_7_3').value; } else param4f =''
	if ($('keterangan_7_3')){ ket4f = '&keterangan_7_3='+$('keterangan_7_3').value; } else ket4f =''

	if ($('tindakan_sel_7_4')){ param5f = '&tindakan_sel_7_4='+$('tindakan_sel_7_4').value; } else param5f =''
	if ($('keterangan_7_4')){ ket5f = '&keterangan_7_4='+$('keterangan_7_4').value; } else ket5f =''

	if ($('tindakan_sel_7_5')){ param6f = '&tindakan_sel_7_5='+$('tindakan_sel_7_5').value; } else param6f =''
	if ($('keterangan_7_5')){ ket6f = '&keterangan_7_5='+$('keterangan_7_5').value; } else ket6f =''

	if ($('tindakan_sel_7_6')){ param7f = '&tindakan_sel_7_6='+$('tindakan_sel_7_6').value; } else param7f =''
	if ($('keterangan_7_6')){ ket7f = '&keterangan_7_6='+$('keterangan_7_6').value; } else ket7f =''

	if ($('tindakan_sel_7_7')){ param8f = '&tindakan_sel_7_7='+$('tindakan_sel_7_7').value; } else param8f =''
	if ($('keterangan_7_7')){ ket8f = '&keterangan_7_7='+$('keterangan_7_7').value; } else ket8f =''


	if ($('tindakan_sel_8_1')){ param2g = '&tindakan_sel_8_1='+$('tindakan_sel_8_1').value; } else param2g =''
	if ($('keterangan_8_1')){ ket2g = '&keterangan_8_1='+$('keterangan_8_1').value; } else ket2g =''

	if ($('tindakan_sel_8_2')){ param3g = '&tindakan_sel_8_2='+$('tindakan_sel_8_2').value; } else param3g =''
	if ($('keterangan_8_2')){ ket3g = '&keterangan_8_2='+$('keterangan_8_2').value; } else ket3g =''

	if ($('tindakan_sel_8_3')){ param4g = '&tindakan_sel_8_3='+$('tindakan_sel_8_3').value; } else param4g =''
	if ($('keterangan_8_3')){ ket4g = '&keterangan_8_3='+$('keterangan_8_3').value; } else ket4g =''

	if ($('tindakan_sel_8_4')){ param5g = '&tindakan_sel_8_4='+$('tindakan_sel_8_4').value; } else param5g =''
	if ($('keterangan_8_4')){ ket5g = '&keterangan_8_4='+$('keterangan_8_4').value; } else ket5g =''

	if ($('tindakan_sel_8_5')){ param6g = '&tindakan_sel_8_5='+$('tindakan_sel_8_5').value; } else param6g =''
	if ($('keterangan_8_5')){ ket6g = '&keterangan_8_5='+$('keterangan_8_5').value; } else ket6g =''

	if ($('tindakan_sel_8_6')){ param7g = '&tindakan_sel_8_6='+$('tindakan_sel_8_6').value; } else param7g =''
	if ($('keterangan_8_6')){ ket7g = '&keterangan_8_6='+$('keterangan_8_6').value; } else ket7g =''

	if ($('tindakan_sel_8_7')){ param8g = '&tindakan_sel_8_7='+$('tindakan_sel_8_7').value; } else param8g =''
	if ($('keterangan_8_7')){ ket8g = '&keterangan_8_7='+$('keterangan_8_7').value; } else ket8g =''


	if ($('tindakan_sel_9_1')){ param2h = '&tindakan_sel_9_1='+$('tindakan_sel_9_1').value; } else param2h =''
	if ($('keterangan_9_1')){ ket2h = '&keterangan_9_1='+$('keterangan_9_1').value; } else ket2h =''

	if ($('tindakan_sel_9_2')){ param3h = '&tindakan_sel_9_2='+$('tindakan_sel_9_2').value; } else param3h =''
	if ($('keterangan_9_2')){ ket3h = '&keterangan_9_2='+$('keterangan_9_2').value; } else ket3h =''

	if ($('tindakan_sel_9_3')){ param4h = '&tindakan_sel_9_3='+$('tindakan_sel_9_3').value; } else param4h =''
	if ($('keterangan_9_3')){ ket4h = '&keterangan_9_3='+$('keterangan_9_3').value; } else ket4h =''

	if ($('tindakan_sel_9_4')){ param5h = '&tindakan_sel_9_4='+$('tindakan_sel_9_4').value; } else param5h =''
	if ($('keterangan_9_4')){ ket5h = '&keterangan_9_4='+$('keterangan_9_4').value; } else ket5h =''

	if ($('tindakan_sel_9_5')){ param6h = '&tindakan_sel_9_5='+$('tindakan_sel_9_5').value; } else param6h =''
	if ($('keterangan_9_5')){ ket6h = '&keterangan_9_5='+$('keterangan_9_5').value; } else ket6h =''

	if ($('tindakan_sel_9_6')){ param7h = '&tindakan_sel_9_6='+$('tindakan_sel_9_6').value; } else param7h =''
	if ($('keterangan_9_6')){ ket7h = '&keterangan_9_6='+$('keterangan_9_6').value; } else ket7h =''

	if ($('tindakan_sel_9_7')){ param8h = '&tindakan_sel_9_7='+$('tindakan_sel_9_7').value; } else param8h =''
	if ($('keterangan_9_7')){ ket8h = '&keterangan_9_7='+$('keterangan_9_7').value; } else ket8h =''


	if ($('tindakan_sel_10_1')){ param2i = '&tindakan_sel_10_1='+$('tindakan_sel_10_1').value; } else param2i =''
	if ($('keterangan_10_1')){ ket2i = '&keterangan_10_1='+$('keterangan_10_1').value; } else ket2i =''

	if ($('tindakan_sel_10_2')){ param3i = '&tindakan_sel_10_2='+$('tindakan_sel_10_2').value; } else param3i =''
	if ($('keterangan_10_2')){ ket3i = '&keterangan_10_2='+$('keterangan_10_2').value; } else ket3i =''

	if ($('tindakan_sel_10_3')){ param4i = '&tindakan_sel_10_3='+$('tindakan_sel_10_3').value; } else param4i =''
	if ($('keterangan_10_3')){ ket4i = '&keterangan_10_3='+$('keterangan_10_3').value; } else ket4i =''

	if ($('tindakan_sel_10_4')){ param5i = '&tindakan_sel_10_4='+$('tindakan_sel_10_4').value; } else param5i =''
	if ($('keterangan_10_4')){ ket5i = '&keterangan_10_4='+$('keterangan_10_4').value; } else ket5i =''

	if ($('tindakan_sel_10_5')){ param6i = '&tindakan_sel_10_5='+$('tindakan_sel_10_5').value; } else param6i =''
	if ($('keterangan_10_5')){ ket6i = '&keterangan_10_5='+$('keterangan_10_5').value; } else ket6i =''

	if ($('tindakan_sel_10_6')){ param7i = '&tindakan_sel_10_6='+$('tindakan_sel_10_6').value; } else param7i =''
	if ($('keterangan_10_6')){ ket7i = '&keterangan_10_6='+$('keterangan_10_6').value; } else ket7i =''

	if ($('tindakan_sel_10_7')){ param8i = '&tindakan_sel_10_7='+$('tindakan_sel_10_7').value; } else param8i =''
	if ($('keterangan_10_7')){ ket8i = '&keterangan_10_7='+$('keterangan_10_7').value; } else ket8i =''


	if ($('tindakan_sel_11_1')){ param2j = '&tindakan_sel_11_1='+$('tindakan_sel_11_1').value; } else param2j =''
	if ($('keterangan_11_1')){ ket2j = '&keterangan_11_1='+$('keterangan_11_1').value; } else ket2j =''

	if ($('tindakan_sel_11_2')){ param3j = '&tindakan_sel_11_2='+$('tindakan_sel_11_2').value; } else param3j =''
	if ($('keterangan_11_2')){ ket3j = '&keterangan_11_2='+$('keterangan_11_2').value; } else ket3j =''

	if ($('tindakan_sel_11_3')){ param4j = '&tindakan_sel_11_3='+$('tindakan_sel_11_3').value; } else param4j =''
	if ($('keterangan_11_3')){ ket4j = '&keterangan_11_3='+$('keterangan_11_3').value; } else ket4j =''

	if ($('tindakan_sel_11_4')){ param5j = '&tindakan_sel_11_4='+$('tindakan_sel_11_4').value; } else param5j =''
	if ($('keterangan_11_4')){ ket5j = '&keterangan_11_4='+$('keterangan_11_4').value; } else ket5j =''

	if ($('tindakan_sel_11_5')){ param6j = '&tindakan_sel_11_5='+$('tindakan_sel_11_5').value; } else param6j =''
	if ($('keterangan_11_5')){ ket6j = '&keterangan_11_5='+$('keterangan_11_5').value; } else ket6j=''

	if ($('tindakan_sel_11_6')){ param7j = '&tindakan_sel_11_6='+$('tindakan_sel_11_6').value; } else param7j =''
	if ($('keterangan_11_6')){ ket7j = '&keterangan_11_6='+$('keterangan_11_6').value; } else ket7j =''

	if ($('tindakan_sel_11_7')){ param8j = '&tindakan_sel_11_7='+$('tindakan_sel_11_7').value; } else param8j =''
	if ($('keterangan_11_7')){ ket8j = '&keterangan_11_7='+$('keterangan_11_7').value; } else ket8j =''


	if ($('tindakan_sel_12_1')){ param2k = '&tindakan_sel_12_1='+$('tindakan_sel_12_1').value; } else param2k =''
	if ($('keterangan_12_1')){ ket2k = '&keterangan_12_1='+$('keterangan_12_1').value; } else ket2k =''

	if ($('tindakan_sel_12_2')){ param3k = '&tindakan_sel_12_2='+$('tindakan_sel_12_2').value; } else param3k =''
	if ($('keterangan_12_2')){ ket3k = '&keterangan_12_2='+$('keterangan_12_2').value; } else ket3k =''

	if ($('tindakan_sel_12_3')){ param4k = '&tindakan_sel_12_3='+$('tindakan_sel_12_3').value; } else param4k =''
	if ($('keterangan_12_3')){ ket4k = '&keterangan_12_3='+$('keterangan_12_3').value; } else ket4k =''

	if ($('tindakan_sel_12_4')){ param5k = '&tindakan_sel_12_4='+$('tindakan_sel_12_4').value; } else param5k =''
	if ($('keterangan_12_4')){ ket5k = '&keterangan_12_4='+$('keterangan_12_4').value; } else ket5k =''

	if ($('tindakan_sel_12_5')){ param6k = '&tindakan_sel_12_5='+$('tindakan_sel_12_5').value; } else param6k =''
	if ($('keterangan_12_5')){ ket6k = '&keterangan_12_5='+$('keterangan_12_5').value; } else ket6k=''

	if ($('tindakan_sel_12_6')){ param7k = '&tindakan_sel_12_6='+$('tindakan_sel_12_6').value; } else param7k =''
	if ($('keterangan_12_6')){ ket7k = '&keterangan_12_6='+$('keterangan_12_6').value; } else ket7k =''

	if ($('tindakan_sel_12_7')){ param8k = '&tindakan_sel_12_7='+$('tindakan_sel_12_7').value; } else param8k =''
	if ($('keterangan_12_7')){ ket8k = '&keterangan_12_7='+$('keterangan_12_7').value; } else ket8k =''


	$(objLoad1).innerHTML = MsgLoad;
	var opt	= {
		method: 'get',
		parameters: pars+"&"+param1+param2+param3+param4+param5+param6+param7+param8+param2a+param3a+param4a+param5a+param6a+param7a+param8a+ket1+ket2+ket3+ket4+ket5+ket6+ket7+ket8+ket2a+ket3a+ket4a+ket5a+ket6a+ket7a+ket8a+param2b+param3b+param4b+param5b+param6b+param7b+param8b+ket2b+ket3b+ket4b+ket5b+ket6b+ket7b+ket8b+param2c+param3c+param4c+param5c+param6c+param7c+param8c+ket2c+ket3c+ket4c+ket5c+ket6c+ket7c+ket8c+param2d+param3d+param4d+param5d+param6d+param7d+param8d+ket2d+ket3d+ket4d+ket5d+ket6d+ket7d+ket8d+param2e+param3e+param4e+param5e+param6e+param7e+param8e+ket2e+ket3e+ket4e+ket5e+ket6e+ket7e+ket8e+param2f+param3f+param4f+param5f+param6f+param7f+param8f+ket2f+ket3f+ket4f+ket5f+ket6f+ket7f+ket8f+param2g+param3g+param4g+param5g+param6g+param7g+param8g+ket2g+ket3g+ket4g+ket5g+ket6g+ket7g+ket8g+param2h+param3h+param4h+param5h+param6h+param7h+param8h+ket2h+ket3h+ket4h+ket5h+ket6h+ket7h+ket8h+param2i+param3i+param4i+param5i+param6i+param7i+param8i+ket2i+ket3i+ket4i+ket5i+ket6i+ket7i+ket8i+param2j+param3j+param4j+param5j+param6j+param7j+param8j+ket2j+ket3j+ket4j+ket5j+ket6j+ket7j+ket8j+param2k+param3k+param4k+param5k+param6k+param7k+param8k+ket2k+ket3k+ket4k+ket5k+ket6k+ket7k+ket8k,
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);
}

function savePenyebab(urls,pars,objLoad1,MsgLoad){
	if ($('penyebab_sel')){ param1 = '&penyebab_sel='+$('penyebab_sel').value; } else param1 =''
	if ($('penyebab_sel_1_1')){ param2 = '&penyebab_sel_1_1='+$('penyebab_sel_1_1').value; } else param2 =''
	if ($('penyebab_sel_2_1')){ param3 = '&penyebab_sel_2_1='+$('penyebab_sel_2_1').value; } else param3 =''
	if ($('penyebab_sel_3_1')){ param4 = '&penyebab_sel_3_1='+$('penyebab_sel_3_1').value; } else param4 =''
	if ($('penyebab_sel_4_1')){ param5 = '&penyebab_sel_4_1='+$('penyebab_sel_4_1').value; } else param5 =''
	if ($('penyebab_sel_5_1')){ param6 = '&penyebab_sel_5_1='+$('penyebab_sel_5_1').value; } else param6 =''
	if ($('penyebab_sel_6_1')){ param7 = '&penyebab_sel_6_1='+$('penyebab_sel_6_1').value; } else param7 =''
	if ($('penyebab_sel_7_1')){ param8 = '&penyebab_sel_7_1='+$('penyebab_sel_7_1').value; } else param8 =''
	if ($('penyebab_sel_8_1')){ param9 = '&penyebab_sel_8_1='+$('penyebab_sel_8_1').value; } else param9 =''
	if ($('penyebab_sel_9_1')){ param10 = '&penyebab_sel_9_1='+$('penyebab_sel_9_1').value; } else param10 =''
	if ($('penyebab_sel_10_1')){ param11 = '&penyebab_sel_10_1='+$('penyebab_sel_10_1').value; } else param11 =''

	$(objLoad1).innerHTML = MsgLoad;
	var opt	= {
		method: 'get',
		parameters: pars+"&"+param1+param2+param3+param4+param5+param6+param7+param8+param9+param10+param11, 
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);
}

function callAjaxPage(urls,pars,objLoad1,MsgLoad){
	$(objLoad1).innerHTML = MsgLoad;
	var opt	= {
		method: 'get',
		parameters: pars, 
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);
}


function searchKeyword(urls,pars,objLoad1,MsgLoad){
	if ($('searchText')){
		var textSearch = $('searchText').value;
	}
	else{
		var textSearch = MM_findObj('searchText').value;
	}
	
	$(objLoad1).innerHTML = MsgLoad;
	var opt	= {
		method: 'get',
		parameters: pars+'&searchText='+textSearch,
		onComplete: function(t) {
			$(objLoad1).innerHTML = t.responseText;
			execJS($(objLoad1));
		},
		onFailure: function(t) {
			$(objLoad1).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);
}


function searchDataNext(host,imgloc){
	var opt	= {
		method: 'get',
		onLoading: function (t) {
			$('toolBarIcon').innerHTML = '';
			$('dataPage').innerHTML = '';
			$('griddiv').innerHTML = '<table border="0" width="100%" height="100"><tr valign="middle" align="center"><td align="center"><img src="'+imgloc+'" border="0"><br>Loading Page ...</td></tr></table>';
		},
		onSuccess: function(t) {
			$('griddiv').innerHTML = t.responseText;
			execJS($('griddiv'));
		},
		onFailure: function(t) {
			$('griddiv').innerHTML = t.status;
		}
	};
	new Ajax.Request(host,opt);
}

function blocking(nr,st){
	if (st == 'on'){
		current = 'block';
	}
	else{
		current = 'none';
	}
	if (document.layers)
	{
//		current = (document.layers[nr].display == 'none') ? 'block' : 'none';
		document.layers[nr].display = current;
	}
	else if (document.all)
	{
//		current = (document.all[nr].style.display == 'none') ? 'block' : 'none';
		document.all[nr].style.display = current;
	}
	else if (document.getElementById)
	{
//		current = (document.getElementById(nr).style.display == 'none') ? 'block' : 'none';
		document.getElementById(nr).style.display = current;
	}
}
function getDl(urlGet) {
	window.location=urlGet;
	clearInterval(intervals);
}
function submitAddUser(host,docGet){
	var username = MM_findObj('username', docGet.document).value;
	var admstatus = MM_findObj('access', docGet.document).value;
	var opt	= {
		method: 'post',
		parameters: 'username='+username+'&status='+admstatus, 
		onLoading: function(t) {
			$('Submit').value = 'Loading';
			$('Submit').enable = false;
		},
		onComplete: function(t) {
			window.close();
		},
		onFailure: function(t) {
			$('divajax').innerHTML = t.status;
		}
	};
	new Ajax.Request(host+'usermanage.php',opt);
}
function ajaxRequestGet(urls,objSel,msgWait,errMsg){
	msgWait = msgWait || 'Wait.....';
	errMsg = errMsg || 'Error Request';
	var opt	= {
		method: 'get',
		onLoading: function(t) {
			$(objSel).innerHTML = msgWait;
		},
		onComplete: function(t) {
			$(objSel).innerHTML = t.responseText;
			execJS($(objSel));
		},
		onFailure: function(t) {
			$(objSel).innerHTML = t.status;
		}
	};
	new Ajax.Request(urls,opt);
}

function checkLoginAjax(host,formserialze,imgloc){
	var username = '';
	var password = '';
	var nextid = '';
	var nextjenis = '';
	var nextstinput = '';
	if ($('usernamefield')){ username = '&usernamefield='+$('usernamefield').value; }
	if ($('passwordfield')){ password = '&passwordfield='+$('passwordfield').value; }
	if ($('nextid')){ nextid = '&nextid='+$('nextid').value; }
	if ($('nextjenis')){ nextjenis = '&nextjenis='+$('nextjenis').value; }
	if ($('nextstinput')){ nextstinput = '&nextstinput='+$('nextstinput').value; }
	var opt	= {
		method: 'get',
		parameters: 't=script&id=login&'+username+password+nextid+nextjenis+nextstinput, 
		onComplete: function(t) {
			$('login').innerHTML = t.responseText;
			execJS($('login'));
		},
		onFailure: function(t) {
			$('login').innerHTML = t.status;
		}
	};
	new Ajax.Request(host,opt);
}

function questLogout(urlNext,txtQuest){
	if (confirm(txtQuest)) {
		var opt	= {
			method: 'get',
			onComplete: function(t) {
				$('login').innerHTML = t.responseText;
				execJS($('login'));
			},
			onFailure: function(t) {
				$('login').innerHTML = t.status;
			}
		};
		new Ajax.Request(urlNext,opt);
	}	
}

function showPageX(ids, urls)
{	$(ids).innerHTML = '<table><tr><td><img src="/images/loading.gif"></td><td>Tunggu..</td></tr></table>';
	var opt	= 
		{	method: 'get',
			onComplete: function(t) 
			{	$(ids).innerHTML = t.responseText;
				execJS($(ids));
			},
			onFailure: function(t) 
			{	$(ids).innerHTML = t.status;
			}
		};
	new Ajax.Request(urls, opt);
}

function execRoadShow(aId, aDesc)
{	
	if (aDesc == null)
	{	
		$('idApp').innerHTML = '<table><tr><td><img src="/images/loading.gif"></td><td>Tunggu..</td></tr></table>';
		var opt	= 
		{	
			method: 'get',
			onComplete: function(t) 
			{	
				$('idApp').innerHTML = t.responseText;
				appX.url = 'http://' + document.location.host + '/scripts/padati.dll/download?id=slide/roadshow/data/' + aId + '.ini';
				appX.ExecApp;
			},
			onFailure: function(t) 
			{	
				$('idApp').innerHTML = t.status;
			}
		};
		new Ajax.Request( 'http://' + document.location.host + '?t=page&id=roadshow.script&header=off', opt);
	}
}

function changePass(stGet,urlroot,urlnext){
	if (!stGet) stGet='open';
	nm = "addUser";
	atts = "noresizable,scrollbars";
	w = 400; 
	h = 250;
	x = (typeof x=="number")? x: window.opera? 100: Math.round( (screen.availWidth - w)/2 );
	y = (typeof y=="number")? y: window.opera? 20: Math.round( (screen.availHeight - h)/2 );
	atts += ',width='+w+',height='+h+',left='+x+',top='+y;
	var win = window.open('', nm, atts); 
	if (stGet == 'closed'){
		if (win) {
			if (!win.closed) { 
				win.focus();
				win.close();
				alert('Password Anda Telah Di ganti');
			}
		}
	}
	else{
		if (win) {
			if (!win.closed) { 
				if (win.document.getElementById('ErrMsg')){
					win.close();
					changePass();
				}
				win.resizeTo(w,h); 
				win.moveTo(x,y);
				win.focus();
				win.document.write('<html><head><title>GantiPassword</title><style type="text/css"><!-- body { font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #EFEFEF; color:#333333; } table { font-family: Arial, Helvetica, sans-serif; font-size: 12px; color:#333333; } --></style></head><body><form id="passChange" name="passChange" method="GET" onSubmit="javascript: test(); return false;"><div id="ErrMsg" style="color: #FF0000;"></div><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr><td width="150">Password Lama </td><td width="20" align="center">:</td><td><input name="oldpass" type="password" id="oldpass" size="25"></td></tr><tr><td width="150">&nbsp;</td><td width="20" align="center">&nbsp;</td><td>&nbsp;</td></tr><tr><td width="150">Password Baru </td><td width="20" align="center">:</td><td><input name="newpass" type="password" id="newpass" size="25"></td></tr><tr><td width="150">&nbsp;</td><td width="20" align="center">&nbsp;</td><td>&nbsp;</td></tr><tr><td width="150">Ulang Password Baru </td><td width="20" align="center">:</td><td><input name="newpass1" type="password" id="newpass1" size="25"></td></tr><tr><td width="150">&nbsp;</td><td width="20" align="center">&nbsp;</td><td>&nbsp;</td></tr><tr><td width="150">&nbsp;</td><td width="20" align="center">&nbsp;</td><td><input type="submit" id="Submit" name="Submit" value="Submit"></td></tr></table></form><script>document.getElementById(\'oldpass\').focus();  function test(){ var objX = document.getElementById(\'ErrMsg\'); var x1 = document.forms[0].oldpass.value; var x2 = document.forms[0].newpass.value; var x3 = document.forms[0].newpass1.value; if (x1 == \'\'){ objX.innerHTML = \'Password Lama Masih Kosong\'; document.forms[0].oldpass.focus(); } else if (x2 == \'\'){ objX.innerHTML = \'Password Baru Masih Kosong\'; document.forms[0].newpass.focus(); } else if (x3 == \'\'){ objX.innerHTML = \'Ulang Password Baru Masih Kosong\'; document.forms[0].newpass1.focus(); } else{ if (x2 != x3){ objX.innerHTML = \'Password Ulang Password Baru Tidak Sama \'+x2+\' \'+x3; document.forms[0].newpass.focus(); } else{ requestServer(); } } }  function requestServer(){ document.getElementById(\'Submit\').value = \'Loading ...\';  try { req = new XMLHttpRequest(); /* e.g. Firefox */  }  catch(e) {  try {  req = new ActiveXObject("Msxml2.XMLHTTP");  /* some versions IE */  }  catch (e) {  try {  req = new ActiveXObject("Microsoft.XMLHTTP");  /* some versions IE */  }  catch (E) {  req = false;  }   }   }  req.onreadystatechange = function() {  responseAHAH(\'Password Lama Salah\');  };  req.open("GET",\''+urlroot+'?t=script&id=changepass&oldpass=\'+document.forms[0].oldpass.value+\'&newpass=\'+document.forms[0].newpass.value,true);  req.send(null);  } function responseAHAH(errorMessage) {  var output = \'\';  var objX = document.getElementById(\'ErrMsg\');  if(req.readyState == 4) {  if(req.status == 200) {  output = req.responseText;  if (output == \'ok\'){  opener.changePass(\'closed\'); opener.location.href="'+urlnext+'";  }  else {  objX.innerHTML = errorMessage; document.getElementById(\'Submit\').value = \'Submit\';  }  }  else {  objX.innerHTML = \'Error Request\';  document.getElementById(\'Submit\').value = \'Submit\';  }  }  } <\/script></body></html>');
				win.document.writeln();
				return true;
			}
		} 
	}
}

function formRequest(urlReq,paramsGet,methodGet,valueTrue){
	var opt	= {
		method: methodGet, 
		parameters: paramsGet, 
		onComplete: function(t) {
			if (t.responseText == valueTrue){
				document.location.reload();
			}
		}
	};
	new Ajax.Request(urlReq,opt);
}
