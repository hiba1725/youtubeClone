var vedioID;
var Name;
var Uid;
 function DisplayInfo(name,ID,uid){
    Name = name;
    vedioID = ID;
    Uid = uid;
    var Despcription="";
    var NumberOfLikes;
    var NumberOfDisLikes;
    var ajax = new XMLHttpRequest();
    ajax.onload = function(){
        var text = this.responseText;
        text=text.split("~");
        Despcription = text[0];
        NumberOfLikes = text[1];
        NumberOfDisLikes = text[2];
        $("NumberOfLikes").innerHTML = " "+NumberOfLikes+" ";
        $("NumberOfDisLikes").innerHTML = " "+NumberOfDisLikes+" ";
        $("divInfo").innerHTML = ""+Despcription+$("divInfo").innerHTML;
    }
    ajax.open("Get","ProcessDisplayVideo.php?UploadedVideosID="+ID+"&UploadedVideosName="+name+"&uid="+uid,true);
    ajax.send();
}
function AddLike(){
    var ajax = new XMLHttpRequest();
    ajax.onload = function(){
        $("NumberOfLikes").innerHTML = " "+this.responseText+" ";
    }
    ajax.open("Get","ProcessDisplayVideo.php?UploadedVideosID="+vedioID+"&UploadedVideosName="+Name+"&addLike=1"+"&uid="+Uid,true);
    ajax.send();
}
function AddDisLike(){
    var ajax = new XMLHttpRequest();
    ajax.onload = function(){
        $("NumberOfDisLikes").innerHTML = " "+this.responseText+" ";
    }
    ajax.open("Get","ProcessDisplayVideo.php?UploadedVideosName="+Name+"&UploadedVideosID="+vedioID+"&addDisLike=1"+"&uid="+Uid,true);
    ajax.send();
}

function $(id){return document.getElementById(id);}
