<?php 
get_header();
get_template_part('templates/breadcrumbs');
?>
<section class="page-content">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-cnt-inner">
				<?php the_content();?>
           </div>
        </div>
      </div>
  </div>    
</section>
<?php 
get_footer();
?>