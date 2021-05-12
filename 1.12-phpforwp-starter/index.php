<?php get_header(); ?>

    <div id="content">

      <!-- Static Front Page -->
      <?php if ( is_front_page() && !is_home() ) {
          echo "THis is the front page!";
      };

       ?>

      <!-- Blog Home -->
      <?php if ( is_home() ) {
          echo "This is the blog home";
      };

       ?>

      <!-- Page (Not Front Page) -->
      <?php if ( is_page() && !is_front_page() ) {
          echo "This is the page and not front page";
      };

       ?>

      <!-- Single Post -->
      <?php if ( is_single() && !is_attachment() ) {
          echo "This is the single page";
      };

       ?>
      <!-- Single Attachment (Media) -->
      <?php if ( is_singular() && is_attachment() ) {
          echo "This is the single attachment media page";
      };

       ?>
      <!-- Category Archive -->
      <?php if ( is_archive() && is_category() ) {
          echo "This is the category archive";
      };

       ?>
      <!-- Tag Archive -->
      <?php if ( is_tag() ) {
          echo "This is the tag archive";
      };

       ?>
      <!-- Author Archive -->
      <?php if ( is_archive() && is_author() ) {
          echo "This is the author archive page";
      };

       ?>
      <!-- Date Archive -->
      <?php if ( is_date() ) {
          echo "This is the date archive";
      };

       ?>
      <!-- 404 Page -->
      <?php if ( is_404() ) {
          echo "This is the 404 page";
      };

       ?>
    </div>

<?php get_footer(); ?>
