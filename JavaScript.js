
function Copy(id){
var a = document.getElementById(id).innerHTML;
document.getElementById("Fname").value = a;
}
function change(){
    alert("somya");
    var x = document.getElementsByClassName("username");
    x[0].setAttribute("style", "background-color: red;");  
}