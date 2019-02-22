function openSlideMenu(){
    document.getElementById('side-menu').style.width
    = '250px';        
    document.getElementById('main').style.marginLeft
    = '250px';        
    }

    function closeSlideMenu(){
    document.getElementById('side-menu').style.width
    = '0';        
    document.getElementById('main').style.marginLeft
    = '0';        
    }           

    /* progress bar */
    window.onload = function(){
  var elm = document.querySelector('#progress');
  setInterval(function(){
    if(!elm.innerHTML.match(/10%/gi)){
      elm.innerHTML = (parseInt(elm.innerHTML) + 1) + '%';
    } else {
      clearInterval();
    }
  }, 18)
}