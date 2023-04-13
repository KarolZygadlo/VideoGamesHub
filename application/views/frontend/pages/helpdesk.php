<div class="container s-margin">
    <!-- Section: Blog v.3 -->
    <section class="my-5">

        <h6 class="font-weight-normal text-uppercase font-small grey-text mb-4 text-center">FAQ</h6>
        <!-- Section heading -->
        <h3 class="font-weight-bold black-text mb-4 pb-2 text-center">Najczęściej zadawane pytania</h3>
        <hr class="w-header">
        <!-- Section description -->
        <p class="lead text-muted mx-auto mt-4 pt-2 mb-5 text-center">Masz pytania ? My mamy odpowiedzi. Skorzystaj z naszej bazy pytań poniżej, jeżeli to nadal nie rozwiązało twojego problemu skontaktuj się z nami za pomocą formularza kontaktowego.</p>

        <div class="row">
            <div class="col-md-12 col-lg-10 mx-auto mb-5">

                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card border-top border-bottom-0 border-left border-right border-light">

                    <?php $i=0; foreach($help_center as $value): $i++;?>
                        <!-- Card header -->
                        <div class="card-header border-bottom border-light" role="tab" id="headingOne<?= $i ?>">
                            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne<?= $i ?>" aria-expanded="true" aria-controls="collapseOne<?= $i ?>">
                                <h5 class="black-text font-weight-normal mb-0">
                                    <?= $value->title ?> <i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseOne<?= $i ?>" class="collapse <?php if($i==1) {echo 'show';} ?>" role="tabpanel" aria-labelledby="headingOne<?= $i ?>" data-parent="#accordionEx">
                            <div class="card-body">
                                <?= $value->body ?>
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->
                    <?php endforeach; ?>
            

                </div>
                <!-- Accordion wrapper -->

            </div>
        </div>

    </section>




</div>