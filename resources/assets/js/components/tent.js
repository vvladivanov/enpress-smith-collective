class Tent extends HTMLElement {
  constructor() {
    super();
    setTimeout(() => {
      document.body.classList.remove('loading');
    }, 300);
    setTimeout(() => {
      // var event = new Event('loaded');
      if(document.createEventObject) {
          window.fireEvent("loaded");
      } else {
          var event = document.createEvent("HTMLEvents");
          event.initEvent("loaded", false, true);
          window.dispatchEvent(event);
      }
      window.documentLoaded = true;
    }, 500);
  }
}

export default Tent;