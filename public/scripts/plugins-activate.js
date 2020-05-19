(function($jq) {
  $jq(document).ready(function() {

    //ajax
    $jq('#submitShort').submit(function (e) {
        e.preventDefault();
        $jq('#loadingModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        const action = $jq(this).attr('action');
        const params = `?url=${ encodeURIComponent($jq('input[name=short_an_url]').val()) }`
        const route = action + params;
        $jq.get( route, function(data) {
            $jq('#loadingModal').modal('hide');
            $jq('input[name=short_an_url]').val('');
            $jq('input[name=shorten_url]').val(data.result_data.shorten_url);
            $jq('#real_url').html(`Real URL : ${data.result_data.real_url}`);
            $jq('#hrefResult').click();
        }).fail(function (jqXHR, textStatus, error) {
            $jq('#loadingModal').modal('hide');
            setTimeout(() => {
                $jq('#responseModalTitle').html(error);
                $jq('#responseModalText').html(jqXHR.responseJSON.message);
                $jq('#responseModal').modal('show');
            }, 300);
        })
    });

    // Closes the sidebar menu
    $jq(".menu-toggle").click(function(e) {
      e.preventDefault();
      $jq("#sidebar-wrapper").toggleClass("active");
      $jq(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times");
      $jq(this).toggleClass("active");
    });
    // Smoothscroll script
    $jq(".smooth-scroll").click(function(e) {
      e.preventDefault();
      var dis = $jq(this),
        target = dis.attr("href"),
        offset = parseInt($jq(target).offset().top),
        header = $jq(".sidebar-nav");
      dis.addClass("active").parent().siblings().find(".smooth-scroll").removeClass("active");
      $jq('html,body').stop().animate({ scrollTop: offset }, 200);
    //   $jq(".menu-toggle").trigger("click");
    });
    // Closes responsive menu when a scroll trigger link is clicked
    $jq('#sidebar-wrapper .js-scroll-trigger').click(function() {
      $jq("#sidebar-wrapper").removeClass("active");
      $jq(".menu-toggle").removeClass("active");
      $jq(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times");
    });
    //  TESTIMONIALS CAROUSEL HOOK
    var owl = $jq('#customers-testimonials');
    owl.owlCarousel({
      loop: true,
      center: true,
      items: 3,
      margin: 0,
      autoplay: true,
      dots: true,
      autoplayTimeout: 8500,
      smartSpeed: 450,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1170: {
          items: 3
        }
      },
      navigation: true,
      navigationText: true
    });
  });
})(jQuery)
