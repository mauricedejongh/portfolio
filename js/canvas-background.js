let canvas = document.getElementById('animationscreen');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let ctx = canvas.getContext('2d');

var mouse = {
  x: undefined,
  y: undefined
}

var minRadius = 2;
var maxRadius = 8;

var colorArray = [
  '#060b2a',
]

var opacityArray = [
  'rgba(255,255,255,0.1)',
  'rgba(255,255,255,0.2)',
  'rgba(255,255,255,0.3)'
]

window.addEventListener('mousemove',
  function(e) {
    mouse.x = e.x;
    mouse.y = e.y;
  }
);

window.addEventListener('resize', function() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  init();
})

function Circle(x, y, speedX, speedY, radius) {
  this.x = x;
  this.y = y;
  this.speedX = speedX;
  this.speedY = speedY;
  this.radius = radius;
  this.innerRadius = radius / 2;
  this.outerRadius = radius;
  this.minRadius = radius;
  this.opacity = opacityArray[Math.floor(Math.random() * opacityArray.length)];
  this.opacityCopy = this.opacity;

  this.draw = function() {
    let radialGradient = ctx.createRadialGradient(this.x, this.y, this.innerRadius, this.x, this.y, this.outerRadius);
    radialGradient.addColorStop(0, this.opacity);
    radialGradient.addColorStop(1, 'rgba(255,255,255,0.1)');

    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, Math.PI * 2, false);
    ctx.fillStyle = radialGradient;
    ctx.fill();
  }
  this.update = function() {
    if (this.x + this.radius > window.innerWidth ||
      this.x - this.radius < 0) {
      this.speedX= -this.speedX;
    }

    if (this.y + this.radius > window.innerHeight ||
      this.y - this.radius < 0) {
      this.speedY = -this.speedY;
    }

    this.x += this.speedX;
    this.y += this.speedY;

    // Interactivity
    if (mouse.x - this.x < 85 && mouse.x - this.x > -85 &&
        mouse.y - this.y < 85 && mouse.y - this.y > -85) {

        this.x += this.speedX * 3;
        this.y += this.speedY * 3;
        this.opacity = 'rgba(255,255,255,0.8)';
        this.draw();
    }
    else {
      this.opacity = this.opacityCopy;
    }

    this.draw();
  }
}

// First we calc the distance between two objects with pythagoras theorem.
function distance(x1, x2, y1, y2) {
  let a = x1 - x2;
  let b = y1 - y2;

  let c = Math.sqrt(a*a + b*b);

  return c;
}

var circleArray = [];

function init() {
  circleArray = [];
  let starsAmount;

  if(navigator.userAgent.indexOf("Firefox") > -1){
    starsAmount = 25;
  } else {
    starsAmount = 400;
  }

  for (var i = 0; i < starsAmount; i++) {
    radius = Math.random() * 1 + 1;
    x = Math.random() * (innerWidth - radius * 2) + radius;
    y = Math.random() * (innerHeight - radius * 2) + radius;
    speedX = (Math.random() - 0.5) * 0.5;
    speedY = (Math.random() - 0.5) * 0.5;

    circleArray.push(new Circle(x, y, speedX, speedY, radius));
  }
}

function animation() {
  requestAnimationFrame(animation);

  ctx.clearRect(0, 0, innerWidth, innerHeight);

  for (var i = 0; i < circleArray.length; i++) {
    circleArray[i].update();
  }

}

animation();
init();
