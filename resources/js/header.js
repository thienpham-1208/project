window.Swiper = require('./libs/swiper/swiper-bundle.min.js');
require('./libs/swiper/swiper-bundle.min.css');

var date = new Date();
stringDayTime(date, 'date', 'time');

var mySwiper = new Swiper('.swiper-container', {
    direction: 'horizontal',
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

});
setTimeout(() => {
    mySwiper;
}, 500);
