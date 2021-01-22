console.log("OPEN!!!");

var statusId= document.querySelector("#statusId");
var statusNote = document.querySelector("#statusNote");

statusId.addEventListener("input", updateStatus, false);
statusNote.addEventListener("input", updateNote, false);

function updateStatus(event) {
    
    var xhr = new XMLHttpRequest(); 

    xhr.onreadystatechange = function(e){     
        if(xhr.readyState === 4){        
            console.log(xhr.responseText);
   
           } 
    };
    xhr.open("POST","process-status.php",true); 
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("statusId=" + statusId.value  + "&statusNote=" + statusNote.value);
}


function updateNote(event) {
    
    var xhr = new XMLHttpRequest(); 

    xhr.onreadystatechange = function(e){     
        if(xhr.readyState === 4){        
            console.log(xhr.responseText);    
           } 
    };
    xhr.open("POST","process-status.php",true); 
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("statusId=" + statusId.value  + "&statusNote=" + statusNote.value);
}