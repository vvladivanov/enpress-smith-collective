import { inherits } from "util";

class OptionsCards extends HTMLElement {
  constructor() {
    super();
    this.init();
  }

  init() {
    const elements = this.querySelectorAll('.card-options .card-content');
    let height = 0;
    for(let i=0, ni=elements.length; i<ni; i++) {
      const element = elements[i];
      if (element.offsetHeight > height) {
        height = element.offsetHeight;
      }
    }
    $(elements).outerHeight(height);
  }
}

export default OptionsCards;