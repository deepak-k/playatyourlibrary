(function ($, Drupal) {

  Drupal.behaviors.kids_programmePhoneNumberLinksOnMobile = {
    attach: function(context, settings) {
      // var text = jQuery('#page-title').text();
      // if(text == 'Spanish my account') {
        
      //   var text = jQuery('#page-title').text('My Account'); 
      // }
        //message button change its background color by adding class new
        $('.msg:has(.new)').addClass('new');
        //announcement block change its image field as background image
      $('.annoncement-block .annocement').each(function() {
      if ($(this).find('img').length) {
        var imgURL = $(this).find('img').attr('src');
        $(this).css('background-image', 'url(' + imgURL + ')');
      }
    });
    //mobile menu
      $("button.hamburger").click(function() {
         $(".mobile-menu-wrapper").toggle();

      });
    //dashboard page overwrite homepage module jquery and make theming easier
    var activites =$('.homebox-draggable:has(.view-activities-dashboard)').addClass('dashboard-activities');
    var rewards =$('.homebox-draggable:has(.view-rewards-dashboard)').addClass('dashboard-rewards');
    var reviews =$('.homebox-draggable:has(.view-book-reviews-dashboard.review)').addClass('dashboard-reviews');
    var booklist =$('.homebox-draggable:has(.view-book-reviews-dashboard.booklist)').addClass('dashboard-booklists');
    var follow =$('.homebox-draggable:has(.view-follow-block-dashboard)').addClass('dashboard-following');
    var follow =$('.homebox-draggable:has(.msg-highlight)').addClass('dashboard-progress');
    var obj =$("#homebox-add ul li");
    $.each( obj , function( key, value ) {
    $(value).addClass($(value).find('a').text().toLowerCase());
     var crntState =$('.dashboard-'+$(value).find('a').text().toLowerCase()).css('display');
      if (crntState != 'undefined') {
        if (crntState == 'block') {
         $(value).hide();
        } else  {
         $(value).show();
        }
      }
    });


    }
  };

})(jQuery, Drupal);
