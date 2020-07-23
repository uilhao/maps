jQuery(document).ready(function ($) {
  $(".navbar-toggler").each(function () {
    const $this = $(this);
    const $nav = $this.next();

    $this.click(function () {
      $nav.slideToggle(300, function () {
        // Animation complete.
      });
    });
  });
});
