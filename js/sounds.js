
//====== Create sound class ======//
class sound {
  constructor(src, volume, loop, speed) {
    this.sound = document.createElement("audio");
    this.sound.src = src;
    if (arguments.length > 1) {
      this.sound.volume = volume;
    }
    if (arguments.length > 2) {
      this.sound.loop = loop;
    }
    if (arguments.length > 3) {
      this.sound.playbackRate = speed;
    }
    this.sound.setAttribute("preload", "auto");
    this.sound.setAttribute("controls", "none");
    this.sound.style.display = "none";
    document.body.appendChild(this.sound);

    this.play = function(){
      this.sound.play();
    }
    this.stop = function(){
      this.sound.pause();
      this.sound.currentTime = 0;
    }
    this.pause = function(){
      this.sound.pause();
    }
  }
}

//====== Create sound instances ======//
let soundtrack = new sound(templateDirectoryUri + "/sounds/soundtrack-23.mp3", 1, true);
let openDoor = new sound(templateDirectoryUri + "/sounds/opendoor3.mp3", 0.30, false, 3);
let button = new sound(templateDirectoryUri + "/sounds/button.mp3", 0.50, false, 1.5);
let swoosh = new sound(templateDirectoryUri + "/sounds/swoosh.mp3", 0.50, false, 1);

//====== Initialize variables ======//
let burgerToggle = document.getElementById('burger-toggle');
let menuItems = document.getElementsByClassName('menu-item');
let volume = document.getElementById('volume');
let soundOff = document.getElementById('sound-off');
let soundOn = document.getElementById('sound-on');
let arrowLeft = document.getElementById('arrow-left');
let arrowRight = document.getElementById('arrow-right');
let soundhovers = document.getElementsByClassName('soundhover');
let realPushState = history.pushState;

history.pushState = function() {
    if (soundState) {
      swoosh.play();
    }
    return realPushState.apply(history, arguments);
};

function toggleVolume() {
  if (!soundState) {
    soundOff.style.display = "none";
    soundOn.style.display = "inline-block";
    soundtrack.play();
    soundState = true;
  }
  else if (soundState) {
    soundOn.style.display = "none";
    soundOff.style.display = "inline-block";
    soundState = false;
    soundtrack.pause();
  }
  button.play();
}

function playMenuItemsSound() {
  if (soundState) {
    button.play();
    openDoor.play();
  }
}

function playOpenDoor() {
  if (soundState) {
    openDoor.play();
  }
}

function playSoundOnHover() {
  if (soundState) {
    button.play();
  }
}
