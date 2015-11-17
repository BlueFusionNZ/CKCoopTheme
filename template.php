<?php
/**
 * @file
 * template.php
 */

drupal_add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array('type' => 'external'));
drupal_add_css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css', array('type' => 'external'));
drupal_add_js('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js', 'external');

drupal_add_css('//fonts.googleapis.com/css?family=Raleway', array('type' => 'external'));


function hc_bootstrap_menu_link(&$vars) {
  $link = $vars['element']['#original_link'];
  $menu_name = $link['menu_name'];

  if ('menu-user-menu' == $menu_name) {
    $vars['element']['#attributes']['class'][] = 'col-sm-4';
  }

  return theme_menu_link($vars);
}



function hc_bootstrap_preprocess_page(&$variables ) {
  //Set default section to display
  if (drupal_is_front_page()) {
    menu_set_active_item('food-and-groceries');
  }

  /**
* Add page template suggestions based on the aliased path. For instance, if the current
* page has an alias of about/history/early, we'll have templates of:
* page-about-history-early.tpl.php, page-about-history.tpl.php, page-about.tpl.php
* Whichever is found first is the one that will be used.
*/
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if ($alias != $_GET['q']) {
      $template_filename = 'page';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '-' . $path_part;
        $vars['template_files'][] = $template_filename;
      }
    }
  }

  //Add shopping cart to available output
  $variables['side_cart'] =  block_render('views', 'sidebar_cart-cart');
}



function hc_bootstrap_commerce_product_reference_default_delta_alter(&$delta, $products) {
  foreach ($products as $key => $product) {
    $p_wrapper = entity_metadata_wrapper('commerce_product', $product);
    $stock = $p_wrapper->commerce_stock->value();
    if ($stock > 0) {
      $delta = $key;
      break;
    }
  }
}


function hc_bootstrap_form_alter(&$form, &$form_state = array(), $form_id = NULL) {


  $id = $form['#id'];

  if ($id) {
    switch ($id) {
      case 'views-exposed-form-display-products-page':
        $form['#attributes']['class'][] = 'search-form';
        $form["submit"]= array(
            "#name" =>  "",
            "#type" => "submit",
            "#value" =>  "&#xf002;", //"Search",
            "#id" => "edit-submit-display-products",
            "#access"=> true,
        );
        break;
      case 'views-form-sidebar-cart-cart':
        break;

    }

  }
}





function hc_bootstrap_block_view_alter(&$data, $block) {
  if ($block->module == 'menu_block' && $block->delta == 5) {
    $output = block_render('views', '-exp-display_products-page');
    $data['content']['#content'][]['#markup'] = '<li class="search-block">' . $output . '</li>';
  }
}

function hc_bootstrap_preprocess_block(&$vars) {

  /* Set shortcut variables. Hooray for less typing! */
  $block_id = $vars['block']->delta;
  $classes = &$vars['classes_array'];

  /* Add classes based on the block delta. */
  switch ($block_id) {
    /* System Navigation block */
    /* footer blocks */
    case 'site_attribution':
  //  case '2': //register now button
   // case '9': //Footer Logo
      $classes[] = 'col-xs-12';
      break;
    /* All below are implemented in pure CSS as a flexbox, not bootstrap. */
//    case '5': //Food and Groceries menu
//      $classes[] = 'col-sm-offset-1';
    case '1': //Contact info - footer
    case '2': //Shop Hours - footer
    case '3': //Location - footer
    case 'menu-social-connection': //Footer
      $classes[] = 'col-sm-3';
//    case '6':
//    case '7':
//    case '8':
//  //  case '10':
//      $classes[] = 'col-sm-2';
      break;
    case 'sidebar_cart-cart':
      break;
  }



}



function hc_bootstrap_views_post_render(&$view) {
  if('sub_categories'== $view->name) {
  }
}

function block_render($module, $block_id) {
  $block = block_load($module, $block_id);
  $block_content = _block_render_blocks(array($block));
  $build = _block_get_renderable_array($block_content);
  $block_rendered = drupal_render($build);
  return $block_rendered;
}