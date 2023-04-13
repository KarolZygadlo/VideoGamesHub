<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Panel administracyjny do zarządzania portalem VideoGamesHub">
  <meta name="author" content="Karol Zygadło">
  <title>VideoGamesHub - Panel administracyjny</title>

  <link rel="stylesheet" href="<?= assetsUrl() ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/mdb.min.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/login.css">

</head>
<body>
  
  <div class="view full-page-intro" style="background-image: url('https://source.unsplash.com/p0j-mE6mGo4'); background-repeat: no-repeat; background-size: cover;">

    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <div class="container">

        <div class="row wow fadeIn">

          <div class="col-md-6 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold">VideoGamesHub</h1>

            <hr class="hr-light">

            <p class="mb-4 d-none d-md-block">
              <strong>Logowanie do panelu administracyjnego.</strong>
            </p>

          </div>

          <div class="col-md-6 col-xl-5 mb-4">

            <div class="card">

              <div class="card-body">

                <form method="post" action="<?php echo base_url(); ?>backend/home/login">
                <?php if(isset($_SESSION['flashdata'])): ?>
                    <p><?php echo $_SESSION['flashdata']; ?></p>
                <?php endif; ?>

                  <h3 class="dark-grey-text text-center">
                    <strong>Zaloguj się</strong>
                  </h3>
                  <hr>

                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="login" class="form-control" name="login">
                    <label for="login">Login</label>
                  </div>
                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="password" id="password" class="form-control" name="password">
                    <label for="password">Hasło</label>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-dark">Zaloguj się</button>
                  </div>

                </form>

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

</body>
</html>