<section>
    <div class="container pt-5 mt-5">

        <div class="row text-center">

            <div class="col-md-12 mt-5 mb-5">

            <h3 class="font-weight-bold black-text text-center">Twoje recenzje</h3>

            </div>

        </div>

        <div class="card card-cascade narrower mb-5">

            <div class="view view-cascade gradient-card-header elegant-color-dark narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <div class="md-form my-0">
                    <a href="" class="white-text mx-3">Dodaj nową recenzję</a>
                </div>



                <div class="text-right" style="width: 181px;">
                    <a href="<?php echo base_url(); ?>reviews/form/insert">
                        <button type="button" class="btn btn-outline-white btn-rounded btn-hover-alt btn-sm px-2">
                            <i class="fas fa-plus mt-0"></i>
                        </button>
                    </a>
                </div>

            </div>

            <div class="px-4 pb-3">


                <div class="table-responsive">
                    <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Id
                                </th>
                                <th class="th-sm">Tytuł
                                </th>
                                <th class="th-sm">Dodano
                                </th>
                                <th class="th-sm">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (array_reverse($rows) as $key) : ?>
                                <tr>
                                    <td class="text-center"><?= $key->id; ?></td>
                                    <td class="text-center"><?= $key->title; ?></td>
                                    <td class="text-center"><?= $key->created; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url(); ?>actions/gallery/reviews/<?= $key->id; ?>" class="btn btn-sm btn-light">Galeria</a>
                                        <a href="<?php echo base_url(); ?>reviews/form/update/<?php echo $key->id; ?>" class="btn btn-sm btn-dark">Edytuj</a>
                                        <a href="<?php echo base_url(); ?>actions/delete/reviews/<?php echo $key->id; ?>" onclick="return confirm('Czy na pewno chcesz usunąć <?php echo $key->title; ?>? #<?php echo $key->id; ?>')" class="btn btn-sm btn-danger">Usuń
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>


            </div>

        </div>

    </div>
</section>