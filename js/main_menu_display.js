 jQuery(document).ready(function(){
  jQuery(".region-top-menu ul li").hoverIntent(makeActive);
  /* If there is not an active category here - we're probably on the home page, 404, 403, search etc
   * then make the products the active menu item
   *
   *Check the menu and see if have an element with an active-trail
   *If yes then nothing
   *If no then activate the groceries route
   */

  if (jQuery(".region-top-menu ul li.active-trail").size() == 0) {
    makeActive('default');
  }
});

function makeActive(el) {
  if (el === 'default') {
    el = jQuery(".region-top-menu ul li a[href='/food-and-groceries']").parent().get(0);
  } else {
    el = this;
  }
  if (!jQuery(el).hasClass('active-trail')) {
    jQuery(".region-top-menu .active-trail").removeClass("active-trail");
    jQuery(el).addClass("active-trail");
    jQuery(el).children().addClass("active-trail").stop();  /* Remove the "hover" class , then stop animation queue buildup*/
    jQuery(el).find("ul *").addClass("active-trail").stop();
  }

}