<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title><?php echo $user_ebook->book_title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url(); ?>assets/css/pdf_style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=latin-ext" rel="stylesheet">


<body>
<?php $user = $this->backend->get_user_data($user_ebook->user_id); ?>
<?php $content = $this->backend->get_chapters('write_tutorials', $user_ebook->id); ?>
<div class="ebook_info">

<img src="<?= base_url().'/uploads/'.$user_ebook->photo; ?>" width="100%">

<h1 class="chapter_title"><?php echo $user_ebook->book_title ?></h1>
<h3 class="">Autor: <?php echo $user->first_name ?> <?php echo $user->last_name ?></h3>
<h3 class="">Opis: </h3>
<div class="book_description"><?php echo $user_ebook->body ?></div>

<pagebreak type="NEXT-ODD" pagenumstyle="1" />

<h1 class="">Spis treści: </h1>
<?php $i=1; foreach ($content as $value):?>
<h3 class=""> <?php echo $i ?> <?php echo $value->chapter_title ?></h3>
<?php $i++; endforeach; ?>

<pagebreak type="NEXT-ODD" pagenumstyle="1" />

<?php $i=0; foreach ($content as $value):?>
<h1 class=""><?php echo $value->chapter_title ?></h1>

<div>

<?php echo $value->chapter_content ?>

</div>
<?php $i++; endforeach; ?>

</div>


</body>
</html>