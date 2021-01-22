
//var statusId = document.querySelectorAll("#statusId");
var statusId= document.getElementById("statusId");
console.log(statusId);
statusId.addEventListener('change', updateHeader, false);

function updateHeader(event) {

  //alert(this.value);
    if(this.value == 1){

        document.getElementById('body-content-wrapper').className = "available";
      }else{
        document.getElementById('body-content-wrapper').className = "offline";
      }
}