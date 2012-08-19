function addToBill(type,id,Name,price){
	
	//alert(Name);
	if(qty = window.prompt('Enter Quantity',1)){
	var dataURL = "id="+id+"&type="+type+"&Name="+Name+"&price="+price+"&qty="+qty+"&mode=add";
	
	$.ajax({
   type: "POST",
   url: "ajax_code/billingController.php",
   data: dataURL,
   success: function(msg){
    // alert(msg );
	 $('#test').html(msg);
	 
   }
 });
	}
	return false;
}
function CalculatetotalPrice(qty,id,price){
	//alert(id);
	
	var total = qty*price;
	document.getElementById("TOTAL"+id).value = total;
	
	var dataURL = "id="+id+"&total="+total+"&qty="+qty+"&mode=edit";
	
	$.ajax({
   type: "POST",
   url: "ajax_code/billingController.php",
   data: dataURL,
   success: function(msg){
    // alert(msg );
	 $('#test').html(msg);
	 
   }
 });
	
	}
function getSubmitAndPrint(){

var dataURL = "id=1";
	$.ajax({
   type: "POST",
   url: "../_controllers/billingController.php",
   data: dataURL,
   success: function(msg){
     ///alert(msg);
	 if(msg == 1){
	 $('#test').html(" ");
	 //window.print();
	 }
   }
 });
	
	}
	
function getLatestHTML(){
	
	$.ajax({
  url: "ajax_code/billingController.php",
  cache: false,
  success: function(html){
	  //alert(html);
    $('#test').html(html);
  }
});
	}

function printContent(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n<HEAD>\n')
newwin.document.write('<TITLE>Print Page</TITLE>\n')
newwin.document.write('<script>\n')
newwin.document.write('function chkstate(){\n')
newwin.document.write('if(document.readyState=="complete"){\n')
newwin.document.write('window.close()\n')
newwin.document.write('}\n')
newwin.document.write('else{\n')
newwin.document.write('setTimeout("chkstate()",2000)\n')
newwin.document.write('}\n')
newwin.document.write('}\n')
newwin.document.write('function print_win(){\n')
newwin.document.write('window.print();\n')
newwin.document.write('chkstate();\n')
newwin.document.write('}\n')
newwin.document.write('<\/script>\n')
newwin.document.write('</HEAD>\n')
newwin.document.write('<BODY onload="print_win()">\n')
newwin.document.write(str)
newwin.document.write('</BODY>\n')
newwin.document.write('</HTML>\n')
newwin.document.close()

this.getSubmitAndPrint();
}

function deleteFunction(trid,id,msg){

//alert(id);
jConfirm(msg,'Please Confirm', function(result){
if (result) {
$.ajax({
type: "POST",
url: "../_controllers/deleteTempBill.php",
data: "id="+id ,
success: function(msg){
//alert(msg);
if(msg==1){
	getLatestHTML();
document.getElementById(trid).style.display='none';

}else{

}
}

});

}else{


}
});


}