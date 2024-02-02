const slider = document.querySelector(".slider");
const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");

let counter = 0;
const images = document.querySelectorAll(".slider img");
const slideWidth = images[0].clientWidth;
const intervalTime = 5000;
function nextSlide() {
  counter++;
  if (counter >= images.length) {
    counter = 0;
  }
  slider.style.transform = `translateX(${-slideWidth * counter}px)`;
}

function prevSlide() {
  counter--;
  if (counter < 0) {
    counter = images.length - 1;
  }
  slider.style.transform = `translateX(${-slideWidth * counter}px)`;
}

prevBtn.addEventListener("click", prevSlide);
nextBtn.addEventListener("click", nextSlide);

// Función para avanzar automáticamente
function autoSlide() {
  nextSlide();
}

// Iniciar el avance automático con setInterval
setInterval(autoSlide, intervalTime);