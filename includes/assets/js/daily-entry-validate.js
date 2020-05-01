function check(){
  if(document.getElementById('type').value=="laptop"){
 device_entry_form.entry_number.value="A-";
    document.getElementById("category_desktop").style.display = "none";
    document.getElementById("category_laptop").style.display = "";
    document.getElementById("category_recovery").style.display = "none";
  }
  else if(document.getElementById('type').value=="desktop"){
 device_entry_form.entry_number.value="D-";
    document.getElementById("category_desktop").style.display = "";
    document.getElementById("category_laptop").style.display = "none";
    document.getElementById("category_recovery").style.display = "none";
  }   
  else{
 device_entry_form.entry_number.value="D-";
   document.getElementById("category_desktop").style.display = "none";
    document.getElementById("category_laptop").style.display = "none";
    document.getElementById("category_recovery").style.display = ""; 
  }
 
}

function check1(){
  var customer_name = document.forms['device_entry_form']['customer_name'].value;
  var address = document.forms['device_entry_form']['address'].value;
  var contact = document.forms['device_entry_form']['contact'].value;

  if (customer_name == ""||address==""||contact=="") {
    document.getElementById('c_name_error').innerHTML="* this field is required";  
    document.getElementById('contact_error').innerHTML="* this field is required";  
    document.getElementById('address_error').innerHTML="* this field is required";  
  }
  else{
    document.getElementById('c_name_error').innerHTML="";  
    document.getElementById('contact_error').innerHTML="";  
    document.getElementById('address_error').innerHTML="";  
  }
}


function validate(){
  var customer_name = document.forms['device_entry_form']['customer_name'].value;
  var address = document.forms['device_entry_form']['address'].value;
  var contact = document.forms['device_entry_form']['contact'].value;
  var status = document.forms['device_entry_form']['status'].value;
 
 
  var device_detail = document.forms['device_entry_form']['device_detail'].value;
  
  var dates = document.forms['device_entry_form']['dates'].value;
  var problem = document.forms['device_entry_form']['problem'].value;
  var type = document.forms['device_entry_form']['type'].value;

  if (customer_name == ""||address==""||contact==""||status==""
    ||device_detail==""||problem==""){
   alert("please fill all the fields");
   return false;

  }

}

function as(){

}
