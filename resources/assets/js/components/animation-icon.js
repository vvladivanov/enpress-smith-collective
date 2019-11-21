import Lottie from 'lottie-web';
import animationsData from '../animations';

class AnimationIcon extends HTMLElement {
  constructor() {
    super();
    const data = this.dataset;
    const params = {
      container: this,
      renderer: 'svg',
      loop: false,
      autoplay: false,
      animationData: animationsData[data.animation]
    };
    this.lottie = Lottie.loadAnimation(params);
    window.addEventListener('loaded', this.handlePlay.bind(this));
    this.addEventListener('mouseenter', this.handlePlay.bind(this));
  }

  handlePlay() {
    if (this.lottie.isPaused) {
      this.lottie.goToAndPlay(0);
    }
  }
}
export default AnimationIcon;
