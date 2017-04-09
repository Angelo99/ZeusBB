//Autor AngeloRuwantha
function isempty(id){
	var value=document.getElementById(id).value;
	if(value=="" || value==null ){
		alert("Please Enter "+document.getElementById(id).name);
		return false;
		}else{
			return true;
		}
		
	 
}

function compare(str1,str2){
	
	var val1=document.getElementById(str1).value;
	var val2=document.getElementById(str2).value;
	 
	if(val1!=val2){
		alert(document.getElementById(str1).name+" is Not Match");
		return false;
	} else{
		return true;
	}
	 
}
 

function check_user() {
   if(document.getElementById("usernamecheck").innerHTML=="Username exist"){
        alert("username alredy exsits");
         document.getElementById("usernamecheck").style.display = 'block'
        return false;
    }else{
        return true;
    }
}

function check_email() {
    if(document.getElementById("emailcheck").innerHTML=="email exist"){
        alert("email alredy exsits");
         document.getElementById("emailcheck").style.display = 'block'
        return false;
    }else{
        return true;
    }
  
}
function checkuser(str) {
    if (str.length == 0) {
        document.getElementById("usernamecheck").innerHTML = "";
        document.getElementById("usernamecheck").style.display = 'none';
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("usernamecheck").innerHTML = xmlhttp.responseText;
                //document.getElementById("usernamecheck").style.display = 'block';
                USER=1;
                 
            }
        }
        xmlhttp.open("GET", "checker.php?user=" + str, true);
        xmlhttp.send();
    }
     
}

function checke_email(str) {
    if (str.length == 0) {
        document.getElementById("emailcheck").innerHTML = "";
        document.getElementById("emailcheck").style.display = 'none'
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("emailcheck").innerHTML = xmlhttp.responseText;
                 
            }
        }
        xmlhttp.open("GET", "checker.php?email=" + str, true);
        xmlhttp.send();
    }
     
}

 
function SubmitForm(x)
{
       document.getElementById("req").value=document.getElementById("que_con").innerHTML;
     // alert(document.getElementById("hidden-input").value=document.getElementById("que_con").innerHTML);
      return true;  
}
 
 
 function Rate(str) {
     
    if (str.length == 0) {
        
       
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
              alert(xmlhttp.responseText);
                 
            }
        }
        xmlhttp.open("GET", str, true);
       
        xmlhttp.send();
    }
     
}