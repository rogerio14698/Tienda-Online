import { Carousel } from 'bootstrap';

const el = document.querySelector('#carouselLadingPageHeader');

if (el) {
    new Carousel(el, {
        //interval: 2000,
        wrap: true,
        ride: 'carousel',
    });
}
