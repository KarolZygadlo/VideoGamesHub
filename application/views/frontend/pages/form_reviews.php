<main>

    <div class="container pt-5 mt-5">

        <section class="text-center team-section wow fadeIn" data-wow-delay="0.3s">

            <!--Grid row-->
            <div class="row text-center">

                <!--Grid column-->
                <div class="col-md-12 mt-5 mb-5">

                    <section class="wow fadeIn" data-wow-delay="0.5s">

                        <h3 class="font-weight-bold black-text text-center">Formularz dodawania recenzji</h3>

                        <!--Tab panels -->
                        <div class="tab-content">

                            <!--personal data-->
                            <div class="tab-pane fade show active" id="PersonalData" role="tabpanel">
                                <br>
                                <form action="<?php echo base_url(); ?>reviews/action/<?php echo $this->uri->segment(3); ?>/reviews/<?= @$value->id; ?>" method="post" class="modal-body mb-1" enctype="multipart/form-data">
                                <div class="row text-center">
                                <div class="col-md-12 mt-5">
                                    <div class="file-field">
                                                <div id="photoViewer_1" class="mb-4 delete_photo cursor" onclick="clear_box(1);">
                                                <?php if(@$value->photo != '') {
                                                    echo '<img class="z-depth-1-half avatar-pic" src="' . base_url() . 'uploads/' . @$value->photo . '" width=200px>';
                                                } else {
                                                    echo '<img class="z-depth-1-half avatar-pic" src="http://via.placeholder.com/64x64" alt="">';
                                                } ?>
                                                </div>
                                                
                                                <div class="md-form">
                                                <div class="file-field d-flex justify-content-center">
                                                    <div class="btn btn-dark btn-md">
                                                    <span>Dodaj zdjęcie</span>
                                                    <input type="file" name="photo_1" id="photo_1">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                    <input name="name_photo_1" id="name_photo_1" class="file-path validate" type="text" placeholder="Dodaj zdjęcie" required readonly>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <div class="md-form">
                                        <input type="text" id="title" class="form-control mb-4"
                                               placeholder="Tytuł recenzji" value="<?= @$value->title; ?>" name="title" required>
                                        </div>
                                        <div class="md-form">
                                            <input type="number" id="grade" class="form-control" name="grade" min="1" max="5" value="<?= @$value->grade ?>" required>
                                            <label for="grade">Ocena [1-5]</label>
                                        </div>

                                        <span>Opis</span>
                                        <div class="md-form">
                                            <textarea id="form10" class="tinymce" name="body"><?= @$value->body; ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-md float-right">
                                            Wyślij
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <!--/personal data-->


                        </div>


                    </section>
                    <!--/Section: edit profile-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--/Section: about me-->


    </div>

</main>