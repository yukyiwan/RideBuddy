console.log("OPEN!");
var bForm = document.querySelectorAll(".bForm");
var bProfileId = [];

console.log(bForm);


for(i=0; i<bForm.length; i++) {
    bProfileId.push(document.querySelectorAll(".bProfileId")[i]);
    console.log(bProfileId[i].value);}
    
    
    for(i=0; i<bForm.length; i++) {
        bForm[i].addEventListener("submit",function (event) {
            event.preventDefault();
            console.log(event.target);
            blocked(event.target)}, 
            false); 
        
    
        function blocked(i) {
    
            var xhr = new XMLHttpRequest();  
            console.log(i.bProfileId.value)
            xhr.onreadystatechange = function(e){     
            
                if(xhr.readyState === 4){        
                    location.reload(true);
    
                } 
            };
            xhr.open("POST","process-remove.php",true); 
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
            xhr.send("blocked=" + 1 +  "&bProfileId=" + i.bProfileId.value);
        }
    }
    
    