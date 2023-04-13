<main class="main-section">
    <div class="page__section mb-5">
      <nav class="breadcrumb breadcrumb_type5 elegant-color-dark" aria-label="Breadcrumb">
        <ol class="breadcrumb__list r-list">
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend" class="breadcrumb__point r-link text-uppercase">Dashboard</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend/gamezone" class="breadcrumb__point r-link text-uppercase">Centrum pomocy</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <span class="breadcrumb__point text-uppercase" aria-current="page">
                <?php if($this->uri->segment(4) == 'insert'): ?>
                    Dodaj nowe pytanie
                <?php else: ?>
                    Edytuj dane na temat pytania o ID #<?= @$value->id; ?>
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

			    <span class="white-text mx-3 w-100">Dodaj nowe pytanie</span>

			  </div>
                <div class="container-fluid">

                    <div class="row px-5">
                        <div class="col-md-12">

                            <div class="md-form mb-5">
                                <input type="text" id="formTitle" class="form-control" name="title" value="<?= @$value->title; ?>" required>
                                <label for="formTitle"><span class="text-danger">*</span>Pytanie</label>
                            </div>

                            <span class="my-3">Odpowiedź na pytanie</span>

                            <div class="md-form">
                                <textarea class="tinymce" name="body"><?= @$value->body; ?></textarea>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-dark mb-5">Zapisz</button>
                        <button onclick="window.history.go(-1); return false;" class="btn btn-light mb-5 float-left">Cofnij</button>

                        </div>
                    </div>

                </div>
	</form>
</main>