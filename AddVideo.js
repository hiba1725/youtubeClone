
function AddVideo(ID,Name,Namef,Description,username,email){
    // console.log("Ali");
    var mainBodyDiv = document.getElementById("main-body");
    var boxDiv = document.createElement("div");
    boxDiv.classList.add("video-box-unit-main-page");
    mainBodyDiv.appendChild(boxDiv);
    var videoDiv = document.createElement("a");
    videoDiv.href = "DisplayVideo.php?UploadedVideosName="+Name+"&UploadedVideosID="+ID;
    videoDiv.style.height = "200px";
    videoDiv.classList.add("video-diplayed-main-page");
    videoDiv.style.backgroundImage = "url('Thumbnail/"+Name+".jpg')";
    console.log(email+Name);
    videoDiv.style.backgroundSize = "cover";
    videoDiv.style.backgroundRepeat = "no-repeat";
    boxDiv.appendChild(videoDiv);

    var infoDiv = document.createElement("div");
    infoDiv.classList.add("video-ifo");

    var divImage = document.createElement("div");
    var divDetails = document.createElement("div");
    var divName = document.createElement("div");
    var divArtist = document.createElement("div");
    var divViews = document.createElement("div");

    divImage.style.width = "40px";
    divImage.style.height = "40px";
    divImage.style.borderRadius = "360px";
    divImage.style.background = "blue";
    divImage.style.display= "inline-block";
    divImage.style.marginBottom = "200px";
    divDetails.style.width = "300px";
    divDetails.style.paddingLeft = "45px";
    divName.innerHTML = "Name: "+Namef;
    divArtist.innerHTML = "Apploaded By: "+username;
    var ajax = new XMLHttpRequest();
    ajax.onload=function(){
        divViews.innerHTML = ""+this.responseText;
    }
    ajax.onerror = function(){
        console.log("Error occured");
    }
    ajax.open("GEt","VideoDetails.php?UploadedVideosID="+ID,true);
    ajax.send();

    divViews.id = "divViews";
    divArtist.id = "divArtist";

    // divName.appendChild(divImage);

    infoDiv.appendChild(divImage);
    divImage.appendChild(divDetails);
    divDetails.appendChild(divName);
    divDetails.appendChild(document.createElement("br"));
    divDetails.appendChild(divArtist);
    infoDiv.appendChild(document.createElement("br"));
    divDetails.appendChild(divViews);
    boxDiv.appendChild(infoDiv);

}

function $(id){
    return document.getElementById(id);
}