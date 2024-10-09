let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');
let sections = document.querySelectorAll('section');
toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
  sections.forEach((item) => item.classList.toggle("active"));
}



// SwiperJS
var swiper = new Swiper(".books-slider", {
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 9500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});
