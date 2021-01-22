console.log("OPEN!");
var aForm = document.querySelectorAll(".aForm");
var profileId = [];



console.log(aForm);


// for(i=0; i<aForm.length; i++) {
// profileId.push(document.querySelectorAll(".profileId")[i]);
// console.log(profileId[i].value);}


for(i=0; i<aForm.length; i++) {
    aForm[i].addEventListener("submit",function (event) {
        event.preventDefault();
        console.log(event.target);
        addBuddy(event.target)}, 
        false); 
    

    function addBuddy(i) {

        var xhr = new XMLHttpRequest();  
        console.log(i.profileId.value)
        xhr.onreadystatechange = function(e){     
        
            if(xhr.readyState === 4){        
                location.reload(true);

            } 
        };
        xhr.open("POST","process-add.php",true); 
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
        xhr.send("addBuddy=" + 1 +  "&profileId=" + i.profileId.value);
    }
}

