class Apply extends HTMLElement {
  
  constructor() {
    super();
    this.init();
  }

  init() {
    const onChange = event => {
      const too_soon = event.target.getAttribute('data-timestamp') < this.notice.getAttribute('data-timestamp');
      this.notice.classList.toggle('hidden', !too_soon);
    }
    if (this.notice = this.querySelector('.hidden[data-timestamp]')) {
      [].forEach.call(this.querySelectorAll('input[data-timestamp]'), input => input.addEventListener('change', onChange));
    }
  }

}

export default Apply;