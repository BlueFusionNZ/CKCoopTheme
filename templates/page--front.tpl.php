<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="container">
    <div class="navbar-header col-sm-8 ">
      <?php if ($logo): ?>
        <a class="logo navbar-btn pull-left col-sm-6" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>
      <?php if (!empty($site_slogan)): ?>
        <a href="/" class="site-name-slogan col-sm-6"><span><?php print $site_slogan; ?></span></a>
      <?php endif; ?>
      <?php if (!empty($site_name)): ?>
        <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
    </div>

    <div class="col-xs-12 navbar-toggle-holder">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".top-menu-collapse">
        <span class="sr-only">Toggle site navigation</span>
        <span class="fa fa-bars"></span>
       </button>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".top-search-collapse">
        <span class="sr-only">Toggle Search</span>
        <span class="fa fa-search"></span>
      </button>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".user-menu-collapse">
        <span class="sr-only">Toggle user menu</span>
        <span class="fa fa-cog"></span>
      </button>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".side-cart-collapse">
        <span class="sr-only">Toggle Shopping Cart</span>
        <span class="fa fa-shopping-cart"></span>
      </button>
    </div>

    <div class="col-xs-12 col-sm-4 user-menu">
      <div class="navbar-collapse user-menu-collapse collapse">
        <nav role="navigation">
          <?php if (!empty($page['user'])): ?>
            <?php print render($page['user']); ?>
          <?php endif; ?>
        </nav>
      </div>
      <div class="navbar-collapse top-search-collapse collapse">
        <nav role="navigation">
          <?php if (!empty($page['top_search'])): ?>
            <?php print render($page['top_search']); ?>
          <?php endif; ?>
        </nav>
      </div>
    </div>
  </div>
</header>
<header role="nav" id="top-menu">
  <div class="navbar-collapse top-menu-collapse collapse">
    <nav role="navigation">
      <?php print render($page['top_menu']); ?>
    </nav>
  </div>
  <?php //if (!empty($side_cart)): ?>
    <div class="navbar-collapse side-cart-collapse collapse">
      <div class="hidden-sm hidden-md hidden-lg hidden-xl">
        <?php print render($side_cart); ?>
      </div>
    </div>
  <?php // /endif; ?>
</header> <!-- /#page-header -->

<div class="main-container jumbotron">
  <!--<div class="row">-->
  <img src="/sites/harbourcoop.co.nz/themes/hc_bootstrap/images/harbour-co-op-spoons-poster-vibrant.jpg" class="front-image">
  <div class="front-headline">
    <h1>Food that makes you feel good</h1>
  </div>
  <div class="container">
    <div class="front-search">
      <p>What is on your shopping list?</p>
      <form id="front-views-exposed-form-display-products-page" class="search-form" action="/products" method="get" accept-charset="UTF-8">
        <div>
          <div class="views-exposed-form">
            <div class="views-exposed-widgets clearfix">
              <div id="front-edit-search-api-views-fulltext-wrapper" class="views-exposed-widget views-widget-filter-search_api_views_fulltext">
                <div class="views-widget">
                  <div class="form-type-textfield form-item-search-api-views-fulltext form-autocomplete form-item form-group">
                    <div class="input-group">
                      <input id="front-edit-search-api-views-fulltext" name="search_api_views_fulltext"class="auto_submit form-control form-text" placeholder="Search (Eg. Peanut Butter)" type="text" value="" size="26" maxlength="128" />
                    </div>
                    <input type="hidden" id="front-edit-search-api-views-fulltext-autocomplete" value="http://www.harbourcoop.co.nz/search_api_autocomplete/search_api_views_display_products/-" disabled="disabled" class="autocomplete" />
                  </div>
                </div>
              </div>
              <div class="views-exposed-widget views-submit-button">
                <button id="front-edit-submit-display-products" class="btn btn-default form-submit" name="" value="&amp;#xf002;" type="submit">&#xf002;</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <section class="main-content"<?php //floatright print $content_column_class;  ?>>
      <a id="main-content"></a>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php //print render($page['content']); ?>
      <div class="front-thumb">
        <img src="/sites/harbourcoop.co.nz/themes/hc_bootstrap/images/free-shipping.png">
      </div>
      <div class="front-thumb">
        <img src="/sites/harbourcoop.co.nz/themes/hc_bootstrap/images/ownership.png">
      </div>
      <div class="front-thumb">
        <img src="/sites/harbourcoop.co.nz/themes/hc_bootstrap/images/anyone-can-shop.jpg">
      </div>
      <div class="front-thumb">
        <div class="fb-like-box" data-href="https://www.facebook.com/harbourcoop" data-width="248" data-height="323" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
      </div>
    </section>

  </div>
</div>

<div class="rope-border"></div>
<footer class="footer">
  <div class="footer-inner container">
    <div class="footer-first">
      <?php print render($page['footer_first']); ?>
    </div>
    <div class="footer-second row">
      <?php print render($page['footer_second']); ?>
    </div>
    <div class="footer-third row">
      <?php print render($page['footer_third']); ?>
    </div>
  </div>

  <?php //print render($page['footer']);  ?>
</footer>
