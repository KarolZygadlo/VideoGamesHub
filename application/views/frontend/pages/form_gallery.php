<main>

    <div class="container pt-5 mt-5">

        <section class="text-center team-section wow fadeIn" data-wow-delay="0.3s">

            <!--Grid row-->
            <div class="row text-center">

                <!--Grid column-->
                <div class="col-md-12 mt-5 mb-5">

                    <section class="wow fadeIn" data-wow-delay="0.5s">

                        <h3 class="font-weight-bold black-text text-center">Formularz dodawania zdjęć do galerii</h3>

                        <section>
                            <form action="<?= base_url(); ?>actions/gallery_action/<?= $this->uri->segment(3) . '/' . $this->uri->segment(4); ?>" method="post" enctype="multipart/form-data">
                                <div class="container-fluid px-md-5 mt-5">
                                    <div class="card card-cascade narrower">

                                        <!--Card image-->
                                        <div class="view view-cascade narrower elegant-color-dark py-4 mx-4 mb-3 text-center">

                                            <span class="white-text mx-3 w-100">Dodaj nowe zdjęcia do galerii</span>

                                        </div>

                                        <div class="row px-5">
                                            <div class="col-md-7">
                                                <div id="update"></div>
                                                <div class="row" id="table_photos">

                                                    <?php foreach (array_reverse($rows) as $row) : ?>
                                                        <div class="pl-md-0 px-3 col-md-3 mg-t--1 mg-md-t-0 mb-2 ">
                                                            <div style="height: auto;cursor: pointer;">
                                                                <img src="<?= base_url(); ?>uploads/<?= $row->photo ?>" width="100%" class="m-auto">
                                                            </div>
                                                            <div class="row">

                                                                <div class="md-form pr-md-0 col-md-8 px-0">
                                                                    <div class="form-group bd-t-0-force bd-l-0-force bd-r-0-force bd-b-0-force mt-2 pl-4">
                                                                        <input class="form-control" type="text" name="alt" id="alt<?= $row->id; ?>" value="<?= $row->alt; ?>" onchange="updateAlt(<?= $row->id; ?>, 'gallery');" placeholder="Alternatywny tekst">

                                                                    </div>
                                                                </div><!-- col-12 -->

                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <div class="file-field">
                                                    <div id="infoGallery"></div>
                                                    <div class="btn btn-dark btn-sm float-left">
                                                        <span>Wybierz pliki</span>
                                                        <input id="length" type="file" multiple name="gallery[]" onchange="uploadGallery()">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text" placeholder="Wyślij jedno bądź więcej zdjęć">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-dark mt-3 mb-3 float-left">Zapisz</button>
                                                <button onclick="window.history.go(-1); return false;" class="btn btn-light mt-3 mb-3 float-left">Cofnij</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                        </form>




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

<script type="text/javascript">
    function updateAlt(id, table) {
        var value = document.getElementById('alt' + id).value;
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>actions/updatealt",
            data: {
                id: id,
                value: value,
                table: table
            },
            cache: false,
            beforeSend: function(html) {
                document.getElementById('update').innerHTML = '<span class="text-center"><i class="fas fa-spinner fa-pulse loader"></i></span>';
            },
            complete: function(html) {
                document.getElementById('update').innerHTML = '<span class="text-success"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
            }
        });
    }

    function uploadGallery() {
        document.getElementById('infoGallery').innerHTML = '<span class="text-center"><i class="fas fa-spinner fa-pulse loader"></i></span>';
        setTimeout(function() {
            document.getElementById('infoGallery').innerHTML = '<span class="text-success"><i class="fas fa-check"></i> Zdjęcia zostały przygotowane do wysłania!</span>';
        }, 1500);
    }
</script>