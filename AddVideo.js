
function AddVideo(){
    var mainBodyDiv = $("main-body");
    var boxDiv = document.createElement("div");
    boxDiv.classList.add("video-box-unit-main-page");
    mainBodyDiv.appendChild(boxDiv);
    var videoDiv = document.createElement("a");
    videoDiv.href = "DisplayVideo.php";
    videoDiv.style.background = "red";
    videoDiv.style.height = "200px";
    videoDiv.classList.add("video-diplayed-main-page");
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
    divName.innerHTML = "Name: Ali Mazloum";
    divArtist.innerHTML = "Name again: Ali Mazloum again";
    divViews.innerHTML = "2.1M    views 3 years age";

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