import Parallax from 'parallax-js';

class ParallaxAnimation extends HTMLElement {
  constructor() {
    super();
    this.parallax = new Parallax(this);
  }
}

export default ParallaxAnimation;