<?php 
get_header();
/*
  Template name: Contact Us
*/
get_template_part('templates/breadcrumbs');
?>

<section class="page-content">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-cnt-inner">
            <div class="cnt-form">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
get_footer();
?>