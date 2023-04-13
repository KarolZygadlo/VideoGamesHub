<div class="container s-margin">

    <!--Grid row-->
    <div class="row text-center">

        <!--Grid column-->
        <div class="col-md-12 mt-5 mb-5">

            <h3 class="font-weight-bold black-text text-center">Edycja profilu</h3>

            <form action="<?php echo base_url(); ?>users/update_client" method="post" enctype="multipart/form-data">
                <div class="row text-center">
                    <div class="col-md-6 mt-5">
                        <div class="file-field">
                            <div id="photoViewer_1" class="mb-4 delete_photo cursor" onclick="clear_box(1);">
                                <?php if ($user->background_photo != '') {
                                    echo '<img class="img-fluid" src="' . base_url() . 'uploads/' . $user->background_photo . '" width=200px>';
                                } else {
                                    echo '<img class="img-fluid" src="http://via.placeholder.com/64x64" alt="">';
                                } ?>
                            </div>

                            <div class="md-form">
                                <div class="file-field d-flex justify-content-center">
                                    <div class="btn btn-dark btn-md">
                                        <span>Dodaj zdjęcie w tle</span>
                                        <input type="file" name="photo_1" id="photo_1">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input name="name_photo_1" id="name_photo_1" class="file-path validate" type="text" placeholder="Dodaj zdjęcie w tle" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="file-field">
                            <div id="photoViewer_2" class="mb-4 delete_photo cursor" onclick="clear_box(2);">
                                <?php if ($user->photo != '') {
                                    echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . $user->photo . '" width=200px>';
                                } else {
                                    echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/64x64" alt="">';
                                } ?>
                            </div>

                            <div class="md-form">
                                <div class="file-field d-flex justify-content-center">
                                    <div class="btn btn-dark btn-md">
                                        <span>Dodaj avatar</span>
                                        <input type="file" name="photo_2" id="photo_2">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input name="name_photo_2" id="name_photo_2" class="file-path validate" type="text" placeholder="Dodaj avatar" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="md-form">
                            <input type="text" id="name" class="form-control mb-4" placeholder="Imie" value="<?php echo @$user->first_name; ?>" name="first_name" required>
                        </div>
                        <div class="md-form">
                            <input type="text" id="surname" class="form-control mb-4" placeholder="Nazwisko" value="<?php echo @$user->last_name; ?>" name="last_name" required>
                        </div>
                        <div class="md-form">
                            <input type="email" id="email" class="form-control mb-4 validate" placeholder="Email" value="<?php echo @$user->email; ?>" readonly required>
                        </div>
                        <div class="md-form">
                            <input type="text" id="facebook_link" class="form-control mb-4 validate" placeholder="Link do profilu na Facebooku" value="<?php echo @$user->facebook_link; ?>" name="facebook_link">
                        </div>
                        <div class="md-form">
                            <input type="text" id="twitter_link" class="form-control mb-4 validate" placeholder="Link do profilu na Twitterze" value="<?php echo @$user->twitter_link; ?>" name="twitter_link">
                        </div>
                        <div class="md-form">
                            <input type="text" id="instagram_link" class="form-control mb-4 validate" placeholder="Link do profilu na Instagramie" value="<?php echo @$user->instagram_link; ?>" name="instagram_link">
                        </div>
                        <div class="md-form">
                            <input type="text" id="steam_link" class="form-control mb-4 validate" placeholder="Link do profilu na Steamie" value="<?php echo @$user->steam_link; ?>" name="steam_link">
                        </div>
                        <div class="md-form">
                            <textarea id="form10" class="md-textarea form-control" rows="3" name="description" required><?php echo @$user->description; ?></textarea>
                            <label for="form10">Opis</label>
                        </div>
                        <button  class="btn btn-dark float-right">
                            Zapisz zmiany
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
