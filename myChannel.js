window.onload = function() {
    const openMenu = $('show-menu')
    openMenu.addEventListener('click', toggleMenuShow);
    
    const hideMenuIcon = $('hide-menu')
    hideMenuIcon.addEventListener('click', toggleMenuHide);


    $("nav_profile").style.width = screen.width+ "px";

    const homeBtn = $("home");
    const videosBtn = $("videos");
    const playlistsBtn = $("playlists");
    const channelsBtn = $("channels");

    homeBtn.click();
    homeBtn.focus();
};

function $(id) {
    return document.getElementById(id);
}

function toggleMenuShow() {
    var sideMenu = $('nav-menu');
    sideMenu.classList.add('active');
    
    var staticSideMenu = $('nav-left-static');
    staticSideMenu.classList.add('nav-left-static-disappear');

    var bodyDiv = $("main-body");
    bodyDiv.classList.remove("main-body-min-navbar");
    bodyDiv.classList.add("main-body-max-navbar");
}

function toggleMenuHide() {
    var sideMenu = $('nav-menu');
    sideMenu.classList.remove('active');
    
    var staticSideMenu = $('nav-left-static');
    staticSideMenu.classList.remove('nav-left-static-disappear');

    var bodyDiv = $("main-body");
    bodyDiv.classList.remove("main-body-max-navbar");
    bodyDiv.classList.add("main-body-min-navbar");
}
function openNav() {
    document.getElementById("mySidenav").style.display="block"
    document.getElementById("mySidenav").style.width = "250px";
}
  
function closeNav() {
    document.getElementById("mySidenav").style.display="none"
    
}

function ViewHome(){
    $("content").style.display = "block";
    $("channel_main_body").style.display="none";
    document.getElementById("Stat").display="none";

    // var ajax = new XMLHttpRequest();
    // ajax.onload = function(){

    // }
    // ajax.open("GEt","Homeinfo.php?UploadedVideosID="+VID+"&email="+email);
    // AddVideo(VID,email,VDes,username);
}

function AddVideo(ID,Name,Namef,Description,username,email){
    // console.log("Ali");
    var mainBodyDiv = document.getElementById("channel_main_body");
    var boxDiv = document.createElement("div");
    boxDiv.classList.add("video-box-unit-main-page");
    mainBodyDiv.appendChild(boxDiv);
    var videoDiv = document.createElement("a");
    videoDiv.href = "DisplayVideo.php?UploadedVideosName="+Name+"&UploadedVideosID="+ID;
    videoDiv.style.height = "200px";
    videoDiv.classList.add("video-diplayed-main-page");
    videoDiv.style.backgroundImage = "url('Thumbnail/"+Name+".jpg')";
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
function EditVideo(){
    $("Editdiv").style.display="block";
    $("content").style.display = "none";
    $("channel_main_body").style.display="none";
    $("Stat").style.display="none";

}
function GetStat(ID){
    $("Editdiv").style.display="none";
    $("content").style.display = "none";
    $("channel_main_body").style.display="none";
    $("Stat").style.display="block";
    $("Stat").innerHTML = "";
 var Stat =$("Stat");
 var totalNumberOFViews = document.createElement("div");
 var NumberOFViewsinLastMonth = document.createElement("div");
 var MostViewdin48 = document.createElement("div");
 var top10 = document.createElement("div");
 Stat.appendChild(totalNumberOFViews);
 Stat.appendChild(NumberOFViewsinLastMonth);
var ajax= new XMLHttpRequest();
ajax.onload = function(){
    var text = this.responseText.split("\n");
    totalNumberOFViews.innerHTML = text[0];
}
ajax.open("GET","Stat.php?userID="+ID,true);
ajax.send();
}
