<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark elegant-color-dark lighten-1 fixed-top scrolling-navbar">
  <a class="navbar-brand" href="<?= base_url(); ?>">VideoGamesHub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>aktualnosci">Aktualności</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>poradniki">Poradniki</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>recenzje">Recenzje</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>gamezone">Gamezone</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>pomoc-i-wsparcie">Pomoc</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>kontakt">Kontakt</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Język</a>
        <div class="dropdown-menu dropdown-dark" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#googtrans(pl|pl)" onclick="changeLang('pl');">PL</a>
          <a class="dropdown-item" href="#googtrans(pl|en)" onclick="changeLang('en');">EN</a>
          <a class="dropdown-item" href="#googtrans(pl|de)" onclick="changeLang('de');">DE</a>
          <a class="dropdown-item" href="#googtrans(pl|ja)" onclick="changeLang('ja');">JA</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a href="<?= base_url('profil-uzytkownika/'. $user->first_name . '-' . $user->last_name .'/'.$user->id); ?>" title="Przejdź do profilu użytkownika" class="nav-link waves-effect waves-light"><?= $user->first_name . ' ' . $user->last_name ?>
        </a>
      </li>

      <img src="" style="display: none;">
      <li class="nav-item avatar dropdown">

        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if ($user->photo != '') {
            echo '<img class="rounded-circle z-depth-0" src="' . base_url() . 'uploads/' . $user->photo . '"';
          } else {
            echo '<img class="rounded-circle z-depth-0" src="http://via.placeholder.com/64x64" alt="">';
          } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg-right dropdown-dark" aria-labelledby="navbarDropdownMenuLink-55">
          <a class="dropdown-item" href="<?= base_url(); ?>edycja-profilu/<?= $user->first_name . '-' . $user->last_name . '/' . $user->id ?>">Edycja profilu</a>
          <a class="dropdown-item" href="<?= base_url(); ?>twoje-poradniki">Twoje poradniki</a>
          <a class="dropdown-item" href="<?= base_url(); ?>twoje-recenzje">Twoje recenzje</a>
          <a class="dropdown-item" href="<?= base_url(); ?>twoja-biblioteka-gier">Twoja biblioteka gier</a>
          <?php if($user->group == "administration"): ?>
          <a class="dropdown-item" href="<?= base_url(); ?>backend">Przejdź do panelu administracyjnego</a>
          <?php endif; ?>
          <a class="dropdown-item" href="<?= base_url(); ?>users/logout">Wyloguj</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
