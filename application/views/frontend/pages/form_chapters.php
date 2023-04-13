
<main>

<div class="container pt-5 mt-5">

    <section class="text-center team-section wow fadeIn" data-wow-delay="0.3s">

        <!--Grid row-->
        <div class="row text-center">

            <!--Grid column-->
            <div class="col-md-12 mt-5 mb-5">

                <section class="wow fadeIn" data-wow-delay="0.5s">

                    <h2 class="h1-responsive font-weight-bold text-center ">Rodział książki</h2>
                    <hr class=" hr-dark ">


                    <!--Tab panels -->
                    <div class="tab-content">

                        <!--personal data-->
                        <div class="tab-pane fade show active" id="PersonalData" role="tabpanel">
                            <br>
                            <form action="<?php echo base_url(); ?>write_tutorials/action/<?php echo $this->uri->segment(3) . '/write_tutorials/' . $this->uri->segment(4) . '/' . @$value->id; ?>" method="post" class="modal-body mb-1" enctype="multipart/form-data">
                            <div class="row text-center">
                                <div class="col-md-12 mt-5">
                                    <div class="md-form">
                                    <input type="text" id="book_title" class="form-control mb-4"
                                           placeholder="Tytuł rodziału" value="<?php echo @$value->chapter_title; ?>" name="chapter_title">
                                    </div>

                                    <div class="md-form">
                                        <textarea id="form10" class="tinymce" name="chapter_content"><?php echo @$value->chapter_content; ?></textarea>
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