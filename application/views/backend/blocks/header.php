<body class="fixed-sn light-blue-skin">

  <header>
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">

        <li>
          <div class="logo-wrapper waves-light text-center">
            <a href="<?= base_url(); ?>backend">
              <h4 class="name-wrapper text-white">VideoGamesHub</h4>
            </a>
          </div>

        </li>

        <li>
          <ul class="collapsible collapsible-accordion">
            <li><a href="<?= base_url(); ?>backend/news" class="waves-effect <?php if ($this->uri->segment(2) == 'news') {
                  echo 'active';
              } ?>"><i class="fas fa-newspaper"></i> Aktualności </a></li>
            <li><a href="<?= base_url(); ?>backend/gamezone" class="waves-effect <?php if ($this->uri->segment(2) == 'gamezone') {
                  echo 'active';
              } ?>"><i class="fas fa-gamepad"></i> Gamezone </a></li>
            <li><a href="<?= base_url(); ?>backend/help_center" class="waves-effect <?php if ($this->uri->segment(2) == 'help_center') {
                  echo 'active';
              } ?>"><i class="fas fa-question-circle"></i> Centrum pomocy </a></li>
            <li><a href="<?= base_url(); ?>backend/tutorials" class="waves-effect <?php if ($this->uri->segment(2) == 'tutorials') {
                  echo 'active';
              } ?>"><i class="fas fa-book"></i> Poradniki użytkowników </a></li>
            <li><a href="<?= base_url(); ?>backend/users_posts" class="waves-effect <?php if ($this->uri->segment(2) == 'users_posts') {
                  echo 'active';
              } ?>"><i class="fas fa-clipboard"></i> Posty użytkowników </a></li>
            <li><a href="<?= base_url(); ?>backend/reviews" class="waves-effect <?php if ($this->uri->segment(2) == 'reviews') {
                  echo 'active';
              } ?>"><i class="fas fa-paste"></i> Recenzje użytkowników </a></li>
            <li><a href="<?= base_url(); ?>backend/users" class="waves-effect <?php if ($this->uri->segment(2) == 'users') {
                  echo 'active';
              } ?>"><i class="fas fa-users"></i> Użytkownicy </a></li>
            <li><a href="<?= base_url(); ?>backend/settings/form/update/1" class="waves-effect <?php if ($this->uri->segment(2) == 'settings') {
                  echo 'active';
            } ?>"><i class="fas fa-cog"></i> Ustawienia strony</a></li>
            <li><a href="<?= base_url(); ?>backend/mails" class="waves-effect <?php if ($this->uri->segment(2) == 'mails') {
                  echo 'active';
            } ?>"><i class="fas fa-envelope-open-text"></i> Wiadomości email</a></li>
            <li><a href="<?= base_url(); ?>" class="waves-effect"><i class="fas fa-align-center"></i> Przejdź do strony</a></li>
            <li><a href="<?= base_url(); ?>backend/home/logout" class="waves-effect"><i class="fas fa-power-off"></i> Wyloguj się</a></li>
          </ul>
        </li>

      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>
    
      <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item">
          <a class="nav-link"><span class="clearfix d-none d-sm-inline-block">VideoGamesHub</span></a>
        </li>
      </ul>
    </nav>
    <!-- /.Navbar -->
  </header>

  <img src="" style="display: none;">