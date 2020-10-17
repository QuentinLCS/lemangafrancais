$('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
});

setInterval(function () {
    $('.carousel-slider').carousel('next');
}, 10000);