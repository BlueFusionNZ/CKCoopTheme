(function ($) {
// Add a spinner on quantity widget in sidecart
  $("input[name='quantity']").TouchSpin({
    initval: 1
  });
})(jQuery);

  //jQuery().find('input[name=quantity').bind('click',function(){


if (jQuery.isFunction(jQuery.fn.spinner)) {
  Drupal.behaviors.quantityWidgetSpinnerSideCart = {
    attach: function ( context, settings ) {
//      jQuery('.quantity-price input').spinner({
//        min: 0,
//        max: 9999,
//        increment: 'fast'
//      });
    }
  }
}


//jQuery('.quantity-price input').change(function() {
//  if (jQuery(this).val() == 0) {
//    jQuery(this).closest("li").addClass('cancelled-item');
//  } else {
//    jQuery(this).closest("li").removeClass('cancelled-item');
//  }
//});

/* set up the accordion-esque collapsible fields, not really accordions at all as they are all independent */
//(function ($) {
//  $(".collapse").collapse();
//  $(".collapse").on('show', function() {
//    $(this).addClass('collapse-open');
//  });
//  $(".collapse").on('hide', function() {
//    $(this).addClass('collapse-closed');
//  });
//
//})(jQuery);

//})(jQuery);
//jQuery('#views-form-sidebar-cart-cart').on(function(){
//  alert('form is ready');
//});
//jQuery('#views-form-sidebar-cart-default').on(function(){
//  jQuery(this).find('a').bind('click',function(){
//    Drupal.ajax.prototype.commands.commerce_ajax_cart_update();
//  })
//})

