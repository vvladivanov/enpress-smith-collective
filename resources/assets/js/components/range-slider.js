import Slider from 'nouislider';

class RangeSlider extends HTMLElement {
  constructor() {
    super();
    const data = this.dataset;
    this.options = JSON.parse(data.options);
    
    this.connectedElements = [];
    if (this.options.connectedElements) {
      for(let i=0, ni=this.options.connectedElements.length; i<ni; i++) {
        this.connectedElements.push(document.querySelector(this.options.connectedElements[i]));
      }
      delete this.options.connectedElements;
    }
    if (this.options.format) {
      const format = this.options.format;
      this.options.format = {
        to: (value) => {
          return (new Intl.NumberFormat(format.locales, format.options).format(value));
        },
        from: Number
      };
    }
    Slider.create(this, this.options);
    if (this.connectedElements) {
      this.noUiSlider.on('update', this.handleUpdate.bind(this));
    }
  }
  handleUpdate(values, handle) {
    this.connectedElements[handle].value = Number(values[handle].replace(/[^0-9.-]+/g,""));
  }
}

export default RangeSlider;