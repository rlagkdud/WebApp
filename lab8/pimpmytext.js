function bigger(){ 
    setInterval(object,500);
}

function object(){

    if($("content").style.fontSize===""){
        $("content").style.fontSize="12pt";
    }
    else{
        $("content").style.fontSize=parseInt($("content").style.fontSize)+2+"pt";
    }
}

function deco(){
    
    alert("test");    
    var body = document.getElementsByTagName("body");
    
    if($("bling").checked){
        $("content").style.fontWeight="bold";
        $("content").style.color="green";
        $("content").style.textDecoration="underline";
        body[0].style.backgroundImage = "url(https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg)";
        // content.style.backgroundImage = "url(https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg)"
    }else{
        $("content").style.fontWeight="normal";
        $("content").style.textDecoration="none";
        $("content").style.color="black";
        body[0].style.backgroundImage="none";
    }
}

function snoopify(){
    $("content").value=$("content").value.toUpperCase();
    var s_content =$("content").value.split(".");
    $("content").value=s_content.join("-izzle.");
}

function pigLatin(){
    while(1){
        if($("content").value[0] == "a"||$("content").value[0] == "e" ||$("content").value[0] == "i" ||$("content").value[0] == "o" ||$("content").value[0] == "u" ){
            $("content").value=$("content").value+"ay";
            break;
        }
        else{
            var first = $("content").value[0];
            $("content").value=$("content").value.substr(1,)+first;
        }
    }
}
function mal(){
    if($("content").value.length>=5){
        $("content").value="Malkovitch";
    }
}

window.onload = function(){
    
    $("biggerbutton").onclick = bigger;
    $("bling").onchange = deco;
    $("snoopify").onclick=snoopify;
    $("pigLatin").onclick=pigLatin;
    $("mal").onclick=mal;
}