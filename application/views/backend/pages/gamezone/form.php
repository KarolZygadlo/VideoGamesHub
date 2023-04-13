<main class="main-section">
    <div class="page__section mb-5">
      <nav class="breadcrumb breadcrumb_type5 elegant-color-dark" aria-label="Breadcrumb">
        <ol class="breadcrumb__list r-list">
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend" class="breadcrumb__point r-link text-uppercase">Dashboard</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend/gamezone" class="breadcrumb__point r-link text-uppercase"><?= $this->uri->segment(2); ?></a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <span class="breadcrumb__point text-uppercase" aria-current="page">
                <?php if($this->uri->segment(4) == 'insert'): ?>
                    Dodaj nową grę
                <?php else: ?>
                    Edytuj dane na temat gry o ID #<?= @$value->id; ?>
                <?php endif; ?>
            </span>
          </li>
        </ol>
      </nav>
    </div>  
    <form class="form-layout form-layout-2" action="<?= base_url(); ?>backend/<?= $this->uri->segment(2); ?>/action/<?= $this->uri->segment(4) . '/' . $this->uri->segment(2); ?>/<?= @$value->id; ?>" method="post"  enctype="multipart/form-data">
	<div class="container mb-5">
	<?php if($this->session->flashdata('flashdata')) {
	  echo $this->session->flashdata('flashdata');
	} ?>
	</div>
		<div class="container-fluid px-md-5 mb-5">
			<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div class="view view-cascade narrower elegant-color-dark py-4 mx-4 mb-3 text-center">

			    <span class="white-text mx-3 w-100">Dodaj nową grę</span>

			  </div>
                <div class="container-fluid">

                    <div class="row px-5">
                        <div class="col-md-6">

                            <div class="md-form mb-5">
                                <input type="text" id="formTitle" class="form-control" name="title" value="<?= @$value->title; ?>" required>
                                <label for="formTitle"><span class="text-danger">*</span>Tytuł gry</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formFilesId" class="form-control" name="files_id" value="<?= @$value->files_id; ?>">
                                <label for="formFilesId"><span class="text-danger">*</span>ID pliku</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="md-form mb-5">
                                    <div class="md-form">
                                        <div class="file-field">
                                            <div id="photoViewer_1" class="text-center" onclick="clear_box(1);"><?php if(@$value->photo != '') {
                                echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . $value->photo . '" width=75%>';
                            } else {
                                echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/64x64" alt="">';
                            } ?></div>
                                            <div class="btn btn-dark btn-sm float-left">
                                                <span>Wybierz zdjęcie</span>
                                                <input type="hidden" id="name_photo_1" name="name_photo_1">
                                                <input type="file" name="photo_1" id="photo_1">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input name="name_photo_1" class="file-path validate" type="text" placeholder="Wybierz zdjęcie główne" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="md-form">
                                    <input type="text" id="formAlt" class="form-control" name="alt" value="<?= @$value->alt; ?>">
                                    <label for="formAlt">Tekst alternatywny zdjęcia</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">

                        <spam class="my-3">Opis gry</spam>

                        <div class="md-form">
                            <textarea class="tinymce" name="body"><?= @$value->body; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-dark mb-5">Zapisz</button>
                        <button onclick="window.history.go(-1); return false;" class="btn btn-light mb-5 float-left">Cofnij</button>

                        </div>
                    </div>

                </div>
	</form>
</main>