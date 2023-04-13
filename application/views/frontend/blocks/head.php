<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>VideoGamesHub</title>
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/mdb.min.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/style.css">
  <link rel="stylesheet" href="<?= assetsUrl() ?>css/lightbox.css">
  <link href="<?= assetsUrl() ?>css/addons/datatables2.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5ca0763d5d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/2se9ksx0xj8dxpsir7kpu156goqi36eqdyhfl3rzdgszd2sk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body onLoad="getPosts()">

<?php if(isset($_SESSION['flashdata_false'])): ?>
<div id="hideInfo" class="alert alert-danger"><?php echo $_SESSION['flashdata_false']; ?></div>
<?php elseif(isset($_SESSION['flashdata_success'])): ?>
<div id="hideInfo" class="alert alert-success"><?php echo $_SESSION['flashdata_success']; ?></div>
<?php endif; ?>
