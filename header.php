<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>
    

    <header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="#"><strong>WP Custom</strong> Theme</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Programs</a></li>
              <li><a href="#">Events</a></li>
              <li><a href="#">Campuses</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <!-- <span class="search-trigger js-search-trigger">
              <i class="fa fa-search" aria-hidden="true"></i>
            </span> -->
            <div class="search_bar">
              <form action="/" method="get" autocomplete="off">
                  <input type="text" name="s" placeholder="Search Code..." id="keyword" class="input_search" onkeyup="fetch()">
                  <button>
                      Search
                  </button>
              </form>
              <div class="search_result" id="datafetch">
                  <ul>
                      <li>Please wait..</li>
                  </ul>
              </div>
          </div>
          </div>
          
        </div>
      </div>
    </header>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

    <script type="text/javascript">
      jQuery("input#keyword").keyup(function() {
      if (jQuery(this).val().length > 2) {
        jQuery("#datafetch").show();
      } else {
        jQuery("#datafetch").hide();
      }
    });
    </script>

    <style type="text/css">
      div.search_result {
        display: none;
      }
    </style>