class Form {
  constructor() {
    const forms = document.body.querySelectorAll('form');
    for (let i=0, ni=forms.length; i<ni; i++) {
      const form = forms[i];
      const checkbox = form.querySelector('.checkbox-agree');
      if (checkbox) {
        const submit = form.querySelector('button[type="submit"]');
        checkbox.applyElements = {
          form,
          submit
        };
        this.handleCheckboxClick(checkbox);
        checkbox.addEventListener('click', this.handleCheckboxClick.bind(this, checkbox));
      }

      // add extra markup for ninja forms generated elements
      [].forEach.call(form.querySelectorAll('.ninja-forms-field.nf-element[type="checkbox"]'), checkbox => {
        const icon = document.createElement('label');
        icon.className = 'checkbox-icon';
        icon.for = checkbox.id;
        checkbox.parentNode.appendChild(icon);
      });

      [].forEach.call(form.querySelectorAll('.hidden-container, .hide'), container => {
        container.parentNode.classList.add('hide');
      });
    }
  }

  handleCheckboxClick(checkbox) {
    if (checkbox.applyElements.submit) {
      checkbox.applyElements.submit.disabled = !checkbox.checked;
    }
    
  }
}

export default Form;