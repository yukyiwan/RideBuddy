
// console.log("OPEN!!!");

window.setInterval (loadHistory, 1000);

var send = document.querySelectorAll("#send")[0];
send.addEventListener("click", newFx, false);

function newFx(event) {
    var xhr = new XMLHttpRequest(); 
    //console.log(message.value);
    //console.log(chatId.value);
    xhr.onreadystatechange = function(e){     
        // console.log(xhr.readyState);     
        if(xhr.readyState === 4){        
            console.log(xhr.responseText);// modify or populate html elements based on response.
            console.log("CHECK YOUR DATABASE TABLE!");
            
           } 
    };
    xhr.open("POST","insert-chat.php",true); 
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("message=" + message.value + "&chatId=" + chatId.value);
            console.log(chatId.value);
            console.log(message.value);
    
    if (message.value !=="") {
        loadHistory();
    }
    //reset textfield to blank
    document.querySelectorAll("#message")[0].value="";
}

function loadHistory(event){
    //console.log("clicked on loadData!");
    var xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange = function(e){     
        // console.log(xhr.readyState);     
        if(xhr.readyState === 4){        
            // console.log(xhr.responseText);
        var response = JSON.parse(xhr.responseText); 
        // console.log(response);
        var history = document.querySelectorAll("#history")[0];
        // console.log(response.length);
        if (history.hasChildNodes()){
        for (var i=0; i<response.length;i++){
            // console.log(history.childNodes[i]);
            history.removeChild(history.childNodes[0])}
        }
        for (var i=0; i<response.length;i++){
            var pTag = document.createElement("p");
            var separation = document.createElement("p");
            pTag.appendChild(document.createTextNode(response[i].timeStamp));
            pTag.appendChild(document.createTextNode("  "));
            pTag.appendChild(document.createTextNode(response[i].fName));
            pTag.appendChild(document.createTextNode(": "));
            pTag.appendChild(document.createTextNode(response[i].message));
            pTag.appendChild(document.createElement("BR"));
            history.appendChild(pTag);
    }
}
};

    xhr.open("POST", "process-chat.php", true); //true means it is asynchronous // Send variables through the url
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send("chatId=" + chatId.value); 
}
