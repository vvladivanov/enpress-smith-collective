import Lottie from 'lottie-web';
import animationsData from '../animations';

class Connected extends HTMLElement {
  constructor() {
    super();
    this.init();
  }

  handleWindowScroll(event) {
      const { offsetTop: top } = this;
      if(window.pageYOffset + window.innerHeight > top) {
        if(!this.classList.contains('entered')) {
          this.classList.add('entered');
        }
      // } else {
      //   this.classList.remove('entered');
      }
  }

  init() {
    const map = this.querySelector('.connected-map');
    if (map) {
      const params = {
        container: map,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        animationData: animationsData.map
      };
      Lottie.loadAnimation(params);
    }
    this.handleWindowScroll();
    window.addEventListener('scroll', this.handleWindowScroll.bind(this));
  }
}

export default Connected;
