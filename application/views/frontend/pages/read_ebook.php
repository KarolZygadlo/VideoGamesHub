<div class="container s-margin">

    <div class="card card-cascade wider reverse">
        <div class="card-body card-body-cascade text-center mt-md-3 mb-5">

            <!--Section: Content-->
            <section class="px-md-5 mx-md-5 text-center text-lg-left">

                <!--Grid row-->
                <div class="row d-flex justify-content-center">

                    <!--Grid column-->
                    <div class="col-lg-8 text-center">

                        <h3 class="font-weight-bold mb-4"><?= $tutorial->book_title ?></h3>

                        <!--Image-->
                        <div class="view overlay z-depth-1-half">
                            <img src="<?= base_url('uploads/'.$tutorial->photo); ?>" class="img-fluid" alt="">
                            <a href="">
                                <div class="mask rgba-white-light"></div>
                            </a>
                        </div>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->


            </section>
            <!--Section: Content-->
            <?php $i = 0;
            foreach ($read_ebook as $value) : ?>
                <p class="h1 mt-5"><?php echo $value->chapter_title ?></p>
                <hr width="50" class=" mb-5">
                <div>

                    <?php echo $value->chapter_content ?>

                </div>
            <?php $i++;
            endforeach; ?>

        </div>
    </div>
</div>