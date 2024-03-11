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


function autoSlide() {
  nextSlide();
}


setInterval(autoSlide, intervalTime);

document.addEventListener("DOMContentLoaded", function() {
    var menuItems = document.querySelectorAll("#menu li a");
    var informacionDetallada = document.getElementById("informacion-detallada");

    menuItems.forEach(function(item) {
        item.addEventListener("click", function(event) {
            event.preventDefault();
            var selectedItem = event.target;
            mostrarInformacion(selectedItem);
        });
    });

    function mostrarInformacion(selectedItem) {
      
        var infoDetallada = selectedItem.getAttribute("data-info");

       
        informacionDetallada.innerHTML = "<p>" + infoDetallada + "</p>";
    }
});