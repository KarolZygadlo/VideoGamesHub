<div class="s-margin">

<div class="container-fluid">
<iframe src="<?= $settings->google_maps ?>" width="100%" height="450" frameborder="0" style="border:0; margin-bottom: 76px" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

<div class="container py-5 mb-5 z-depth-1">

  <!--Section: Content-->
  <section class="text-center px-md-5 mx-md-5 dark-grey-text">

    <!-- Section heading -->
    <h3 class="font-weight-bold mb-4">Masz jakieś pytania? Nie wahaj się skontaktować z nami bezpośrednio.</h3>
    <!-- Section description -->
    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-9 mb-md-0 mb-5">

        <form action="<?= base_url('mailer/send'); ?>" method="post">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-6">
              <div class="md-form mb-0">
                <input type="text" id="contact-name" class="form-control" name="name">
                <label for="contact-name" class="">Imię i nazwisko</label>
              </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6">
              <div class="md-form mb-0">
                <input type="text" id="contact-email" class="form-control" name="email">
                <label for="contact-email" class="">E-mail</label>
              </div>
            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-12">
              <div class="md-form mb-0">
                <input type="text" id="contact-Subject" class="form-control" name="subject">
                <label for="contact-Subject" class="">Temat</label>
              </div>
            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-12">
              <div class="md-form">
                <textarea id="contact-message" class="form-control md-textarea" rows="3" name="message"></textarea>
                <label for="contact-message">Twoja wiadomość</label>
              </div>
            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

          <div class="text-center text-md-left">
          <button type="submit" class="btn btn-elegant btn-md">Wyślij</button>
        </div>

        </form>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 text-center">
        <ul class="list-unstyled mb-0">
          <li>
            <i class="fas fa-map-marker-alt fa-2x dark-text"></i>
            <p><?= $settings->address ?></p>
          </li>
          <li>
            <i class="fas fa-phone fa-2x mt-4 dark-text"></i>
            <p><?= $settings->phone ?></p>
          </li>
          <li>
            <i class="fas fa-envelope fa-2x mt-4 dark-text"></i>
            <p class="mb-0"><?= $settings->email ?></p>
          </li>
        </ul>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </section>
  <!--Section: Content-->


</div>

</div>