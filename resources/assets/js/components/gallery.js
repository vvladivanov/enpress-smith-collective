class Gallery extends HTMLElement {
  constructor() {
    super();
    this.init();
  }

  handleChange(event, slick, currentSlide) {
    this.updateActiveContent(slick, currentSlide);
  }

  updateActiveContent(slick, currentSlide) {
    const $slide = $(slick.$slides[currentSlide]);
    const $content = $slide.find('script[data-item="content-info"]');
    const data = $content.data();
    const content = $content.html();
    this.$component.find('.gallery-content').html(content);
    const $galleryMark = this.$component.find('.gallery-control .gallery-mark');
    if ($galleryMark.length > 0 && data.mark) {
      $galleryMark.html(data.mark);
    }
  }

  init() {
    this.$component = $(this);
    this.$display = this.$component.find('.gallery-collection .gallery-collection-display');
    this.$navigation = this.$component.find('.gallery-collection .gallery-collection-nav');
    if (this.$navigation.length > 0) {
      this.$display.slick({
        appendArrows: this.$component.find('.gallery-arrows'),
        appendDots: this.$component.find('.gallery-dots'),
        arrows: true,
        autoplay: true,
        autoplaySpeed: 500000,
        dots: true,
        asNavFor: this.$navigation,
      })
      this.$navigation.slick({
        centerMode: true,
        variableWidth: true,
        arrows: false,
        dots: false,
        asNavFor: this.$display,
        focusOnSelect: true,
      });
    } else {
      this.$display.slick({
        appendArrows: this.$component.find('.gallery-arrows'),
        appendDots: this.$component.find('.gallery-dots'),
        arrows: true,
        autoplay: true,
        autoplaySpeed: 500000,
        dots: true,
      });
    }
    this.$display.on('afterChange', this.handleChange.bind(this));
    this.updateActiveContent(this.$display.slick('getSlick'), 0);
  }
}

export default Gallery;
