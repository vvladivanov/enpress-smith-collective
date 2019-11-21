class Weather extends HTMLElement {

  constructor() {
    super();
    this.init();
  }

  populate(data) {

    const temperature = this.querySelector('.weather-temperature');
    if (temperature && data.temperature) {
      temperature.innerHTML = data.temperature + 'º';
    }

    const feels_like = this.querySelector('.weather-feels-like');
    if (feels_like && data.feels_like) {
      feels_like.innerHTML = 'Feels like ' + data.feels_like + 'º';
    }

    const activity = this.querySelector('.weather-activity');
    if (activity && data.activity && data.activity.description && data.activity.description.short) {
      const descr = activity.classList.contains('weather-activity-long') ? 'long' : 'short';
      activity.innerHTML = data.activity.description[descr];
    }

    const icon = this.querySelector('.weather-icon');
    if (icon && data.icon) {
      const suffix = icon.classList.contains('black-icon') ? '-black' : '';
      icon.classList.add('icon-' + data.icon + suffix);
    }

    const type = this.querySelector('.weather-type');
    if (type) {
      type.innerHTML = data.icon.replace(/-/g, ' ');
    }

    return data;
  }

  // cache(data) {
  //   data.expire = new Date().getTime()/1000 + 60;
  //   window.localStorage.forecast = JSON.stringify(data);
  // }

  init() {
    // if (window.localStorage.forecast) {
    //   const data = JSON.parse(window.localStorage.forecast);
    //   if (new Date().getTime()/1000 < data.expire) {
    //     return this.populate(data);
    //   }
    // }
    window.fetch('/forecast')
      .then(res => res.json())
      .then(res => this.populate(res));
      // .then(res => this.cache(res));
  }
}

export default Weather;
