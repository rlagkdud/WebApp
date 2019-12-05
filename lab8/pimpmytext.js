function Bigger(){ 
    setInterval(Object,500);
}

function Object(){    
    var content = document.getElementById("content");

    if(content.style.fontSize===""){
        content.style.fontSize="12pt";
    }
    else{
        content.style.fontSize=parseInt(content.style.fontSize)+2+"pt";
    }
}

function Deco(){
    
    alert("test");
    var chkbox = document.getElementById("bling");
    var content = document.getElementById("content");
    var body = document.getElementsByTagName("body");
    var chk = false;

    if(chkbox.checked){
        chk=true;
    }
    else{
        chk==false;
    }
    if(chk==true){
        content.style.fontWeight="bold";
        content.style.color="green";
        content.style.textDecoration="underline";
        body[0].style.backgroundImage = "url(https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg)";
        // content.style.backgroundImage = "url(https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg)"
    }else{
        content.style.fontWeight="normal";
        content.style.textDecoration="none";
        content.style.color="black";
        body[0].style.backgroundImage="none";
    }
}

function Snoopify(){
    var content=document.getElementById("content");
    content.value=content.value.toUpperCase();
    var s_content =content.value.split(".");
    content.value=s_content.join("-izzle.");
}

function PigLatin(){
    var content=document.getElementById("content");
    while(1){
        if(content.value[0] == "a"||content.value[0] == "e" ||content.value[0] == "i" ||content.value[0] == "o" ||content.value[0] == "u" ){
            content.value=content.value+"ay";
            break;
        }
        else{
            var first = content.value[0];
            content.value=content.value.substr(1,)+first;
        }
    }
}
function Mal(){
    var content= document.getElementById("content");
    if(content.value.length>=5){
        content.value="Malkovitch";
    }
}

window.onload = function(){
    var biggerbutton = document.getElementById("biggerbutton");
    biggerbutton.onclick = Bigger;
    var blingcheck = document.getElementById("bling");
    blingcheck.onchange = Deco;
    var snoopify = document.getElementById("snoopify");
    snoopify.onclick=Snoopify;
    var pigLatin = document.getElementById("pigLatin");
    pigLatin.onclick=PigLatin;
    var mal = document.getElementById("mal");
    mal.onclick=Mal;
}