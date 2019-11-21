import Lottie from 'lottie-web';
import animationsData from '../animations';

class HomeHero extends HTMLElement {
  constructor() {
    super();
    this.animationTitles = this.querySelector('.animation-titles');
    this.video = this.querySelector('video');
    
    if (this.animationTitles) {
      this.animationTitlesElements = this.animationTitles.querySelectorAll('.animation-title');
      this.animationTitleIndex = this.animationTitlesElements.length - 1;
      this.animationTimeline = 1000;
    }
    
    this.animationLoaded = false;
    this.documentLoaded = false;

    this.initAnimationTitles();
    window.addEventListener('loaded', () => {
      this.documentLoaded = true;
      setTimeout(this.playVideo.bind(this), 100);
    });
  }

  playVideo() {
    if (!this.animationLoaded || !this.documentLoaded) {
      return;
    }
    this.video.play();
    this.video.addEventListener('timeupdate', this.handleVideoTimeupdate.bind(this));
  }

  initAnimationTitles() {
    if (this.animationTitlesElements) {
      for(let i=0, ni=this.animationTitlesElements.length; i<ni; i++) {
        const element = this.animationTitlesElements[i];
        const data = element.dataset;
        const params = {
          container: element,
          renderer: 'svg',
          loop: false,
          autoplay: false,
          animationData: animationsData[data.animation]
        };
        const lottieObj = Lottie.loadAnimation(params);
        element.lottie = lottieObj;
        lottieObj.addEventListener('DOMLoaded', () => {
          const svg = element.querySelector('svg');
          const svgWidth = svg.getAttribute('width');
          const svgHeight = svg.getAttribute('height');
          const elementHeight = element.parentElement.clientHeight;
          element.style.width = (elementHeight / svgHeight * svgWidth) + 'px';
          if (i === 0) {
            this.animationLoaded = true;
            this.playVideo();
          }
        });
        element.style.display = 'none';
        lottieObj.addEventListener('complete', this.handleAnimationTitleComplete.bind(this, element));
      }
    }
  }

  animateTitle(index) {
    if(index != this.animationTitleIndex) {
      this.animationTitlesElements[this.animationTitleIndex].style.display = 'none';
    }

    const element = this.animationTitlesElements[index];
    element.style.display = 'inline-block';
    element.lottie.goToAndPlay(0);
    this.animationTitleIndex = index;
  }

  handleAnimationTitleComplete(element) {
    element.style.display = 'none';
  }

  handleVideoTimeupdate() {
    let index = this.animationTitlesElements.length - 1;
    do {
      if (this.video.currentTime >= this.animationTitlesElements[index].dataset.timemark) {
        if (this.video.currentTime < this.animationTimeline) {
          this.animateTitle(index);
        }
        break;
      }
    } while(index--);
    this.animationTimeline = this.video.currentTime;
  }
}

export default HomeHero;