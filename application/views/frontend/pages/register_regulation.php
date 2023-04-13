<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Regulamin - VideoGamesHub</title>
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

          <div class="col-md-12 mb-4">

            <div class="card">

              <div class="card-body">

                  <h3 class="dark-grey-text text-center">
                    <strong>Regulamin portalu VideoGamesHub</strong>
                  </h3>
                  
                  <div><?= $settings->regulations ?></div>

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