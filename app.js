window.onload = function() {
    const openMenu = $('show-menu')
    openMenu.addEventListener('click', toggleMenuShow);
    
    const hideMenuIcon = $('hide-menu')
    hideMenuIcon.addEventListener('click', toggleMenuHide);

    // const addVideo = $("add-video");
    // addVideo.addEventListener('click',AddVideo);
    
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


