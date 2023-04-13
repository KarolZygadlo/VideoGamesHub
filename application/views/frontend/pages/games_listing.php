<div class="container s-margin">


  <!-- Section: Block Content -->
  <section>

    <h3 class="font-weight-bold black-text mb-4 pb-2 text-center">Nasze gry</h3>


    <!-- First row -->
    <div class="row">

      <?php foreach ($games as $v): ?>
      <!-- First column -->
      <div class="col-md-6 mb-5">

        <!-- Card -->
        
        <div class="card">
          <div class="view overlay">
            <img class="card-img-top" src="<?= base_url('uploads/'.$v->photo); ?>" alt="<?= $v->alt ?>">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <a href="<?= base_url('gamezone/'.slug($v->title).'/'.$v->id); ?>" class="btn-floating btn-action ml-auto mr-4 mdb-color"><i class="fas fa-chevron-right pl-1"></i></a>

          <div class="card-body">

            <h4 class="card-title"><?= $v->title ?></h4>
            <hr>
            <p class="card-text text-muted font-weight-light"><?= $v->body ?></p>

          </div>
        </div>
        <!-- Card -->

      </div>
      <!-- First column -->

      <?php endforeach; ?>

    </div>
    <!-- First row -->

  </section>
  <!-- Section: Block Content -->
  
  
</div>
