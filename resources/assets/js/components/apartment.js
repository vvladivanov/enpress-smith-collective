class Apartment extends HTMLElement {
  constructor() {
    super();
    this.fancyboxFloor = this.querySelector('[data-fancybox-floor]');
    if (this.fancyboxFloor) {
      $(this.fancyboxFloor).fancybox({
        buttons: [
          "close"
        ],
        baseClass: 'fancybox-apartment'
      });
      this.fancyboxToggler = this.querySelector('[data-fancybox-toggler]');
      this.fancyboxToggler.addEventListener('click', this.handleFancyboxOpen.bind(this));
    }
    
    this.fancyboxVideo = this.querySelector('[data-fancybox-video]');
    if (this.fancyboxVideo) {
      $(this.fancyboxVideo).fancybox({
        buttons: [
          "close"
        ],
        baseClass: 'fancybox-apartment'
      });
    }
  }

  handleFancyboxOpen() {
    this.fancyboxFloor.click();
  }
}

export default Apartment;