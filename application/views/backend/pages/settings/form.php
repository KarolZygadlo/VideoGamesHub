<main class="main-section">
    <div class="page__section mb-5">
      <nav class="breadcrumb breadcrumb_type5 elegant-color-dark" aria-label="Breadcrumb">
        <ol class="breadcrumb__list r-list">
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend" class="breadcrumb__point r-link text-uppercase">Dashboard</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend/gamezone" class="breadcrumb__point r-link text-uppercase">Ustawienia portalu</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <span class="breadcrumb__point text-uppercase" aria-current="page">Podstawowe ustawienia portalu</span>
          </li>
        </ol>
      </nav>
    </div>  
    <form class="form-layout form-layout-2" action="<?= base_url(); ?>backend/<?= $this->uri->segment(2); ?>/action/<?= $this->uri->segment(4) . '/' . $this->uri->segment(2); ?>/<?= @$value->id; ?>" method="post" enctype="multipart/form-data">
        <div class="container mb-5">
            <?php if ($this->session->flashdata('flashdata')) {
                echo $this->session->flashdata('flashdata');
            } ?>
        </div>
        <div class="container-fluid px-md-5 mb-5">
            <div class="card card-cascade narrower">

                <!--Card image-->
                <div class="view view-cascade narrower elegant-color-dark py-4 mx-4 mb-3 text-center">

                    <span class="white-text mx-3 w-100">Podstawowe ustawienia portalu</span>

                </div>
                <div class="container-fluid">

                    <div class="row px-5">
                        <div class="col-md-6">

                            <div class="md-form mb-5">
                                <input type="text" id="formMetaTitle" class="form-control" name="meta_title" value="<?= @$value->meta_title; ?>">
                                <label for="formMetaTitle">Meta title</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formMetaDescription" class="form-control" name="meta_description" value="<?= @$value->meta_description; ?>">
                                <label for="formMetaDescription">Meta description</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formKeywords" class="form-control" name="keywords" value="<?= @$value->keywords; ?>">
                                <label for="formKeywords">Keywords</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formEmail" class="form-control" name="email" value="<?= @$value->email; ?>">
                                <label for="formEmail">Mail kontaktowy</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formAddress" class="form-control" name="address" value="<?= @$value->address; ?>">
                                <label for="formAddress">Adres</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formGoogleMaps" class="form-control" name="google_maps" value="<?= @$value->google_maps; ?>">
                                <label for="formGoogleMaps">Mapa Google</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formPhone" class="form-control" name="phone" value="<?= @$value->phone; ?>">
                                <label for="formPhone">Telefon</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formFacebook" class="form-control" name="facebook" value="<?= @$value->facebook; ?>">
                                <label for="formFacebook">Facebook</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formInstagram" class="form-control" name="instagram" value="<?= @$value->instagram; ?>">
                                <label for="formInstagram">Instagram</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formTwitter" class="form-control" name="twitter" value="<?= @$value->twitter; ?>">
                                <label for="formTwitter">Twitter</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formGithub" class="form-control" name="github" value="<?= @$value->github; ?>">
                                <label for="formGithub">Github</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="md-form mb-5">
                                <div class="md-form">
                                    <div class="file-field">
                                        <div id="photoViewer_1" class="text-center" onclick="clear_box(1);"><?php if (@$value->favicon != '') {
                                            echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . $value->favicon . '" width=20%>';
                                        } else {
                                            echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/64x64" alt="">';
                                        } ?></div>
                                        <div class="btn btn-dark btn-sm float-left">
                                            <span>Wybierz favicon</span>
                                            <input type="hidden" id="name_photo_1" name="name_photo_1">
                                            <input type="file" name="photo_1" id="photo_1">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input name="name_photo_1" class="file-path validate" type="text" placeholder="Wybierz favicon" required readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md-form">
                                <input type="text" id="formAlt" class="form-control" name="alt" value="<?= @$value->alt; ?>">
                                <label for="formAlt">Tekst alternatywny zdjęcia</label>
                            </div>

                            <div class="md-form mb-5">
                                <div class="md-form">
                                    <div class="file-field">
                                        <div id="photoViewer_2" class="text-center" onclick="clear_box(2);"><?php if (@$value->photo != '') {
                                            echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . $value->photo . '" width=75%>';
                                        } else {
                                            echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/64x64" alt="">';
                                        } ?></div>
                                        <div class="btn btn-dark btn-sm float-left">
                                            <span>Wybierz logotyp</span>
                                            <input type="hidden" id="name_photo_2" name="name_photo_2">
                                            <input type="file" name="photo_2" id="photo_2">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input name="name_photo_2" class="file-path validate" type="text" placeholder="Wybierz logotyp" required readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="md-form">
                                <input type="text" id="formAlt" class="form-control" name="alt_2" value="<?= @$value->alt_2; ?>">
                                <label for="formAlt">Tekst alternatywny zdjęcia</label>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-12">
                        <p>Regulamin</p>
                        <div class="md-form">
                            <textarea class="tinymce" name="regulations"><?= @$value->regulations; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-dark mb-5">Zapisz</button>
                        <button onclick="window.history.go(-1); return false;" class="btn btn-light mb-5 float-left">Cofnij</button>

                    </div>
                </div>

            </div>
    </form>
</main>