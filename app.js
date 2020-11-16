window.onload = function() {
    const openMenu = $('show-menu')
    openMenu.addEventListener('click', toggleMenuShow);
    
    const hideMenuIcon = $('hide-menu')
    hideMenuIcon.addEventListener('click', toggleMenuHide);
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
