<nav class="navbar" id="custom-nav">
  <div class="navbar-toggle">
    <span class="toggle-icon"></span>
    <span class="toggle-icon"></span>
    <span class="toggle-icon"></span>
  </div>
  <div class="navbar-menu">
    <!-- Add your menu items here -->
    <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
      ));
      ?>
  </div>
</nav>

<script>
(function() {
  var toggleButton = document.querySelector('.navbar-toggle');
  var menu = document.querySelector('.navbar-menu');

  toggleButton.addEventListener('click', function() {
    menu.classList.toggle('active');
  });
})();
</script>