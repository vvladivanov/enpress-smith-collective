import 'popper.js';
import 'bootstrap/js/dist/util';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/dropdown';
import 'slick-carousel';
import '@fancyapps/fancybox';

import AnimationIcon from './components/animation-icon';
import Navigation from './components/navigation';
import Gallery from './components/gallery';
import ParallaxAnimation from './components/parallax-animation';
import HomeHero from './components/home-hero';
import Connected from './components/connected';
import Weather from './components/weather';
import RangeSlider from './components/range-slider';
import Apartment from './components/apartment';
import Apply from './components/apply';
import Tent from './components/tent';
import ApartmentCards from './components/apartment-cards';
import OptionsCards from './components/options-cards';

import Form from './shared/form';

window.customElements.define('app-animation-icon', AnimationIcon);
window.customElements.define('app-navigation', Navigation);
window.customElements.define('app-parallax', ParallaxAnimation);
window.customElements.define('app-gallery', Gallery);
window.customElements.define('app-home-hero', HomeHero);
window.customElements.define('app-connected', Connected);
window.customElements.define('app-apply', Apply);
window.customElements.define('app-weather', Weather);
window.customElements.define('app-rangeslider', RangeSlider);
window.customElements.define('app-apartment', Apartment);
window.customElements.define('app-tent', Tent);
window.customElements.define('app-apartment-cards', ApartmentCards);
window.customElements.define('app-options-cards', OptionsCards);

//a little delay to let Ninja Forms initialize
window.addEventListener('load', () => setTimeout(() => new Form(), 100));