var x= document.getElementsByClassName("inp");//donc x raja3tha array fiha kaml les inputes
var i;
for(i=0 ; i<x.length ; i++){
    x[i].addEventListener("click",function (){
      this.style.width = "250px";
      this.style.background = "none";
      this.style.transition = ".7s"
    }
    );
}