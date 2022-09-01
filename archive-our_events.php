<?php

get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">All Events</h1>
    <div class="page-banner__intro">
      <p>See what is going on in our world.</p>
    </div>
  </div>  
</div>

<div class="container container--narrow page-section">
  <form class="search" action="/" method="get" autocomplete="off">
    <input type="text" name="s" placeholder="Search" id="keyword" class="input_search" data-page="1" onkeyup="">
  </form>
<?php 
   $today = date('Ymd');
  $homepageEvents = new WP_Query(array(
    'posts_per_page' => 3,
    'post_type' => 'our_events',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
      )
    )
  ));
  if($homepageEvents->have_posts()){
  while($homepageEvents->have_posts()) {
    $homepageEvents->the_post(); ?>
    <div class="event-summary">
      <a class="event-summary__date t-center" href="#">
        <span class="event-summary__month"><?php
          $eventDate = new DateTime(get_field('event_date'));
          echo $eventDate->format('M')
        ?></span>
        <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>  
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
      </div>
    </div>
  <?php }
  echo paginate_links();
  } wp_reset_query();
?>

<hr class="section-break">

<p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events') ?>">Check out our past events archive</a>.</p>

</div>

<?php get_footer();

?>