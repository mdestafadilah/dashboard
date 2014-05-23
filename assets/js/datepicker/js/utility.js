function pindah_ke_opener(pembuka, pindahValue){
    window.opener.document.getElementById(pembuka).value = pindahValue;
}
	
function pilih_eks_container(textContainer, idContainer){
	window.opener.document.getElementById("eks_container").value  = textContainer;
	
	window.close();
}
	
function pilih_kapal(textKapal, idKapal){
	window.opener.document.getElementById("eks_kapal").value  = textKapal;
	
	window.close();
}
function pilih_voyage(textKapal, idKapal){
	window.opener.document.getElementById("voyage").value  = textKapal;
	
	window.close();
}
function pilih_consignee(textKapal, idKapal){
	window.opener.document.getElementById("consignee").value  = textKapal;
	
	window.close();
}

function pilih_warehouse(textwarehouse){
	window.opener.document.getElementById("asal_container").value  = textwarehouse;
	window.close();
}

function pilih_pbm(text_idpbm){
	window.opener.document.getElementById("pbm").value  = text_idpbm;
	window.close();
}


function tutup(){
	window.opener.refresh();
	window.close();
}
function hitung () {
			window.alert('test');
		}
function focusNext(form, elemName, evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
    if (charCode == 13 || charCode == 3) {
        form.elements[elemName].focus( );
        return false;
    }
    return true;
}
