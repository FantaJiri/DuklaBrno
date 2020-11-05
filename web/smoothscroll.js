$(document).ready(function () {
  $('a[href*="#"]').on('click', function (e) {
    e.preventDefault()

    $('body').animate(
      {
        scrollTop: $($(this).attr('href')).offset().top;
      },
      500,
      'linear'
    )
  })

})
