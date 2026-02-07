<footer class="theme-footer main overlay" style="">
        <div class="container">

          <div class="row footer-divider"><hr class="light-gray"></div>

          <div class="row footer-copy">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <p class="copyright">© <?php echo date('Y'); ?> ******************. <br>All Rights Reserved</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
              <?php echo wp_get_attachment_image( 2532, array('200', '150'), "", array( "class" => "img-responsive logo" ) );  ?>
            </div>
            
          </div>
        </div>	
      </footer>
    
    <?php wp_footer(); ?>
 
    </body>
</html>