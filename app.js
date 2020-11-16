window.onload = function() {
    const openMenu = $('show-menu')
    openMenu.addEventListener('click', toggleMenuShow);
    
    const hideMenuIcon = $('hide-menu')
    hideMenuIcon.addEventListener('click', toggleMenuHide);
    
    const addVideo = $("add-video");
    addVideo.addEventListener('click',AddVideo);
};

function $(id) {
    return document.getElementById(id);
}

function toggleMenuShow() {
    var sideMenu = $('nav-menu');
    sideMenu.classList.add('active');
    
    var staticSideMenu = $('nav-left-static');
    staticSideMenu.classList.add('nav-left-static-disappear');
}

function toggleMenuHide() {
    var sideMenu = $('nav-menu');
    sideMenu.classList.remove('active');
    
    var staticSideMenu = $('nav-left-static');
    staticSideMenu.classList.remove('nav-left-static-disappear');
}
function openNav() {
    document.getElementById("mySidenav").style.display="block"
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.display="none"
    
  }

function AddVideo(){
    var mainBodyDiv = $("main-body");
    var boxDiv = document.createElement("div");
    boxDiv.classList.add("video-box-unit-main-page");
    mainBodyDiv.appendChild(boxDiv);
    var videoDiv = document.createElement("div");
    videoDiv.style.background = "red";
    videoDiv.style.height = "200px";
    videoDiv.classList.add("video-diplayed-main-page");
    boxDiv.appendChild(videoDiv);

    var infoDiv = document.createElement("div");
    infoDiv.classList.add("video-ifo");

    var divName = document.createElement("div");
    var divArtist = document.createElement("div");
    var divViews = document.createElement("div");

    divName.innerHTML = "Name: Ali Mazloum";
    divArtist.innerHTML = "Name again: Ali Mazloum again";
    divViews.innerHTML = "2.1M    views 3 years age";

    divViews.id = "divViews";

    infoDiv.appendChild(divName);
    infoDiv.appendChild(document.createElement("br"));
    infoDiv.appendChild(divArtist);
    infoDiv.appendChild(document.createElement("br"));
    infoDiv.appendChild(divViews);

    boxDiv.appendChild(infoDiv);

}
