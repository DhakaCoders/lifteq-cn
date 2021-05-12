<?php 
get_header();
/*
  Template name: Contact Us
*/
?>


<section class="page-content">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-cnt-inner">
            <div class="cnt-form">
              <?php echo do_shortcode('[contact-form-7 id="21" title="Contact form"]'); ?>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>



<?php 
get_footer();
?>