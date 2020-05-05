const swup = new Swup();
let menu = document.getElementById('menu');
let clickState = 0;
let soundState = false;
let html = document.querySelector('html');

document.addEventListener("DOMContentLoaded", function() {
	html.classList.remove('is-animating');
});

function init() {
  volume.addEventListener('click', toggleVolume);

  for (var i = 0; i < menuItems.length; i++) {
    menuItems[i].addEventListener('click', playMenuItemsSound);
  }

  burgerToggle.addEventListener('click', toggleMenu);
  burgerToggle.addEventListener('click', playOpenDoor);

  for (var i = 0; i < soundhovers.length; i++) {
    soundhovers[i].addEventListener('mouseover', playSoundOnHover);
  }

  scrollToY(0, 1500, 'easeInOutQuint');
  menuItemHovers();

  if (document.querySelector('#astronaut')) {
    let astronaut = document.getElementById('astronaut');
    astronaut.addEventListener('click', floatAstronaut);
  }

}

function unload() {
  scrollToY(0, 1500, 'easeInOutQuint');
  menuItemHovers();
}

init();

swup.on('willReplaceContent', unload);
swup.on('contentReplaced', init);

window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

function scrollToY(scrollTargetY, speed, easing) {
    // scrollTargetY: the target scrollY property of the window
    // speed: time in pixels per second
    // easing: easing equation to use

    var scrollY = window.scrollY || document.documentElement.scrollTop,
        scrollTargetY = scrollTargetY || 0,
        speed = speed || 2000,
        easing = easing || 'easeOutSine',
        currentTime = 0;

    // min time .1, max time .8 seconds
    var time = Math.max(.1, Math.min(Math.abs(scrollY - scrollTargetY) / speed, .8));

    // easing equations from https://github.com/danro/easing-js/blob/master/easing.js
    var easingEquations = {
            easeOutSine: function (pos) {
                return Math.sin(pos * (Math.PI / 2));
            },
            easeInOutSine: function (pos) {
                return (-0.5 * (Math.cos(Math.PI * pos) - 1));
            },
            easeInOutQuint: function (pos) {
                if ((pos /= 0.5) < 1) {
                    return 0.5 * Math.pow(pos, 5);
                }
                return 0.5 * (Math.pow((pos - 2), 5) + 2);
            }
        };

    // add animation loop
    function tick() {
        currentTime += 1 / 60;

        var p = currentTime / time;
        var t = easingEquations[easing](p);

        if (p < 1) {
            requestAnimationFrame(tick);

            window.scrollTo(0, scrollY + ((scrollTargetY - scrollY) * t));
        } else {
            console.log('scroll done');
            window.scrollTo(0, scrollTargetY);
        }
    }

    // call it once to get started
    tick();
}

function toggleMenu() {
  if (clickState === 0) {
    menu.classList.add('active');
    this.classList.add('open');
    clickState = 1;
  }
  else if (clickState === 1) {
    menu.classList.remove('active');
    this.classList.remove('open');
    clickState = 0;
  }
}

function menuItemHovers() {
  // Menu item animation
  let menuItems = document.getElementsByClassName('menu-item');
  let menuIcons = document.getElementsByClassName('menu-icons');

  for (var i = 0; i < menuItems.length; i++) {
    menuItems[i].addEventListener('mouseover', function(){
      if (this === menuItems[0]) {
        menuIcons[0].style.transform = 'translateY(-200px)';
        menuIcons[1].style.transform = 'translateY(0px)';
        menuIcons[2].style.transform = 'translateY(-200px)';
        menuIcons[3].style.transform = 'translateY(-200px)';
      }
      else if (this === menuItems[1]) {
        menuIcons[0].style.transform = 'translateY(-200px)';
        menuIcons[1].style.transform = 'translateY(-200px)';
        menuIcons[2].style.transform = 'translateY(0px)';
        menuIcons[3].style.transform = 'translateY(-200px)';
      }
      else if (this === menuItems[2]) {
        menuIcons[0].style.transform = 'translateY(-200px)';
        menuIcons[1].style.transform = 'translateY(-200px)';
        menuIcons[2].style.transform = 'translateY(-200px)';
        menuIcons[3].style.transform = 'translateY(0px)';
      }
    });

    menuItems[i].addEventListener('mouseleave', function(){
      menuIcons[0].style.transform = 'translateY(0px)';
      menuIcons[1].style.transform = 'translateY(-200px)';
      menuIcons[2].style.transform = 'translateY(-200px)';
      menuIcons[3].style.transform = 'translateY(-200px)';
    });

    // Open doors after clicking menu item
    menuItems[i].addEventListener('click', function(){
      menu.classList.remove('active');
      burgerToggle.classList.remove('open');
      clickState = 0;
    });
  }
}

function floatAstronaut() {
  astronaut.classList.add('floatAway');

  setTimeout(function(){
    astronaut.classList.remove('floatAway');
    astronaut.classList.add('floatBack');
  }, 30000);

  setTimeout(function(){
    astronaut.classList.remove('floatBack');
  }, 39000);
}
