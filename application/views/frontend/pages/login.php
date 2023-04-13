<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Logowanie - VideoGamesHub</title>
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/mdb.min.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/frontauth.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<?php if(isset($_SESSION['flashdata_false'])): ?>
<div id="hideInfo" class="alert alert-danger"><?php echo $_SESSION['flashdata_false']; ?></div>
<?php elseif(isset($_SESSION['flashdata_success'])): ?>
<div id="hideInfo" class="alert alert-success"><?php echo $_SESSION['flashdata_success']; ?></div>
<?php endif; ?>

<body>

<div class="view full-page-intro" style="background-image: url('https://source.unsplash.com/p0j-mE6mGo4'); background-repeat: no-repeat; background-size: cover;">

    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <div class="container">

        <div class="row wow fadeIn">

          <div class="col-md-6 mb-4 white-text text-center text-md-left d-none d-md-block">

            <h1 class="display-4 font-weight-bold d-none d-md-block">VideoGamesHub</h1>

            <p class="mb-4 d-none d-md-block">
              <strong>VideoGamesHub pomaga kontaktować się z innymi osobami oraz udostępniać im różne informacje i materiały. Dodatkowo każdy użytkownik ma możliwość grania bez ograniczeń w gry dostępne na portalu.</strong>
            </p>

          </div>

          <div class="col-md-6 col-xl-5 mb-4">

            <div class="card">

              <div class="card-body">

                <form method="post" action="<?php echo base_url('users/login'); ?>">

                  <h3 class="dark-grey-text text-center">
                    <strong>Zaloguj się do VideoGamesHub</strong>
                  </h3>

                  <?php if(isset($_SESSION['register_success'])): ?>
                  <p class="font-weight-bold text-success mb-3 text-left"><?= $_SESSION['register_success'] ?></p>
                  <?php endif; ?>
                  <?php if(isset($_SESSION['login_false'])): ?>
                      <p class="font-weight-bold text-danger mb-3 text-left"><?= $_SESSION['login_false'] ?></p>
                  <?php endif; ?>
                  <div class="md-form">
                    <input type="text" id="login" class="form-control" name="login">
                    <label for="login">Login</label>
                  </div>
                  <div class="md-form">
                    <input type="password" id="password" class="form-control" name="password">
                    <label for="password">Hasło</label>
                  </div>

                  <div class="text-left">
                    <button type="submit" class="btn btn-dark">Zaloguj się</button>
                  </div>

                </form>

                <div class="text-center">
                <span><a href="<?= base_url('zapomnialem_hasla'); ?>">Zapomniałeś hasła ?</span>
                </div>

                <hr>
                <div class="container text-center">
                <button type="button" class="btn btn-dark"><a class="text-white" href="<?= base_url('rejestracja'); ?>">Załóż bezpłatne konto</a></button>  
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>
  <script type="text/javascript" src="<?= assetsUrl() ?>js/jquery.min.js"></script>
  <script type="text/javascript" src="<?= assetsUrl() ?>js/popper.min.js"></script>
  <script type="text/javascript" src="<?= assetsUrl() ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= assetsUrl() ?>js/mdb.min.js"></script>
 
  <script>
    $('#hideInfo').delay(5000).fadeOut(1000);
  </script>

</body>

</html>