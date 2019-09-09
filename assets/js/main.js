window.addEventListener('load', function() {
  var status = document.querySelector(".avatar-online i");
  function updateOnlineStatus(event) {
    var condition = navigator.onLine ? "online" : "offline";
    status.className = condition;
  }
  window.addEventListener('online',  updateOnlineStatus);
  window.addEventListener('offline', updateOnlineStatus);
});

// PPRODUCT PAGE SLIDER Script 
const slide = document.querySelectorAll('.slide');
const prev = document.querySelector('#prev');
const next = document.querySelector('#next');
const intervalTime = 3000;
const auto = true;
let slideInterval;

const nextSlide = () => {
  const current = document.querySelector('.current');
  current.classList.remove('current');
  if (current.nextElementSibling) {
    //Add .current to next slide element
    current.nextElementSibling.classList.add('current');
  } else {
    //Add .current to first slide element
    slide[0].classList.add('current');
  }
  setTimeout(() => current.classList.remove('current'));
}
const prevSlide = () => {
  const current = document.querySelector('.current');
  current.classList.remove('current');
  if (current.previousElementSibling) {
    //Add .current to previous slide element
    current.previousElementSibling.classList.add('current');
  } else {
    //Add .current to last slide element
    slide[slide.length - 1].classList.add('current');
  }
  setTimeout(() => current.classList.remove('current'));
}
//To add button events for next and previous functionality
prev.addEventListener('click', (e) => {
  prevSlide();
  if(auto) {
    clearInterval(slideInterval);
    slideInterval = setInterval (nextSlide, intervalTime);
  }
});
next.addEventListener('click',  (e) => {
  nextSlide();
  if(auto) {
    clearInterval(slideInterval);
    slideInterval = setInterval (nextSlide, intervalTime);
  }
});
// Auto Slider
if(auto) {
  //Run next slide at intervalTime which is 5 seconds
  slideInterval = setInterval (nextSlide, intervalTime);
}





  