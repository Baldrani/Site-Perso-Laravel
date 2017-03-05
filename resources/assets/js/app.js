
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Global Js Function */
$(document).ready(function() {
    //Scroll to bottom
    var $root = $('html, body');
    $('nav a').click(function() {
        var href = $(this).attr('href');
        hash = href.split('#');
        if(hash.length == 2){
            $root.animate({
                scrollTop: $('#'+hash[1]).offset().top
            }, 500, function () {
                window.location.hash = hash[1];
            });
        }
    });

    $(document).scroll(function() {
      var y = $(this).scrollTop();
      if (y > 30) {
          $('.returnTop').fadeIn();
      } else {
          $('.returnTop').fadeOut();
      }
    });

});
