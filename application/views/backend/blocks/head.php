<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Administration panel of social networking site VideoGamesHub">
  <meta name="author" content="Karol Zygadło">
  <title>VideoGamesHub - Administration panel</title>

  <link rel="stylesheet" href="<?= assetsUrl() ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/mdb.min.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/backend.css">
  <link href="<?= assetsUrl() ?>css/addons/datatables2.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5ca0763d5d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/2se9ksx0xj8dxpsir7kpu156goqi36eqdyhfl3rzdgszd2sk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<?php if(isset($_SESSION['flashdata_false'])): ?>
<div id="hideInfo" class="alert alert-danger"><?php echo $_SESSION['flashdata_false']; ?></div>
<?php elseif(isset($_SESSION['flashdata_success'])): ?>
<div id="hideInfo" class="alert alert-success"><?php echo $_SESSION['flashdata_success']; ?></div>
<?php endif; ?>