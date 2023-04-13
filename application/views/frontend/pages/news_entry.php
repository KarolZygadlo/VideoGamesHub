<div class="container s-margin">

  <!-- Section: Blog v.4 -->
  <section class="my-5">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12">

        <!-- Card -->
        <div class="card card-cascade wider reverse">

          <!-- Card image -->
          <div class="view view-cascade overlay">
            <img class="card-img-top" src="<?= base_url('uploads/' . $entry->photo); ?>" alt="<?= $entry->alt ?>">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade text-center">

            <!-- Title -->
            <h2 class="font-weight-bold"><?= $entry->title ?></h2>
            <!-- Data -->
            <p>Dodany przez: <strong><?= $entry->user_name ?></strong> <?= date("d/m/Y", strtotime($entry->created)) ?></p>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

        <!-- Excerpt -->
        <div class="mt-5">

          <p><?= $entry->body ?>
          </p>


        </div>

        <div class="container">
          <!--Section: Main info-->
          <section class="mt-5 mb-5">
            <div class="col-md-12">
              <div class="gallery_box">
                <?php foreach ($gallery as $photo) : ?>
                  <a href="<?= filesUrl() . $photo->photo; ?>" data-lightbox="image-1">
                    <img class="item wow fadeIn" src="<?= filesUrl() . $photo->photo; ?>" alt="<?= $photo->alt; ?>">
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          </section>
          <!--Section: Main info-->
        </div>

        <!-- Excerpt -->
        <div class="mt-5">

          <p><?= $entry->body_2 ?>
          </p>


        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->


</div>

</section>

<div class="container my-5">

  
  <!--Section: Block Content-->
  <section class="dark-grey-text mb-5">

    <!-- Section heading -->
    <h3 class="font-weight-bold text-center mb-5">Komentarze do wpisu</h3>

    <div id="refreshComments">
    <?php if(isset($_SESSION['flashdata_false'])): ?>
               <div id="hideInfo" class="alert alert-danger"><?php echo $_SESSION['flashdata_false']; ?></div>
               <?php elseif(isset($_SESSION['flashdata_success'])): ?>
               <div id="hideInfo" class="alert alert-success"><?php echo $_SESSION['flashdata_success']; ?></div>
               <?php endif; ?>
    <div class="container mb-5">
      <div id="validationMsg"></div>
      <div class="md-form">
        <textarea id="commentBody" class="md-textarea form-control" rows="5" name="body"></textarea>
        <label for="commentBody">Dodaj komentarz</label>
      </div>

    <button type="button" class="btn btn-dark align-right" onclick="sendComment('<?= $user->id ?>', '<?= $entry->id; ?>')">Wyślij</button>
    </div>

    <?php
      $data['comments'] = $this->backend->get_news_comments('news_comments', $entry->id);
    ?>

    <?php $i=0; foreach (array_reverse($data['comments']) as $v): $i++;
        if($v->active == '1'):
        $data['user'] = $this->backend->get_one_record('users', $v->user_id);
    ?>
    
    <div class="media mt-5 mb-5">
    <a title="Przejdź do profilu" class="text-dark" href="<?= base_url('profil-uzytkownika/' . $data['user']->first_name . '-' . $data['user']->last_name . '/' . $data['user']->id); ?>"><img class="card-img-100 rounded-circle z-depth-1-half d-flex mr-3" src="<?= base_url('uploads/' . $data['user']->photo); ?>" alt="users avatar"></a>
      <div class="media-body">
        <a title="Przejdź do profilu" class="text-dark" href="<?= base_url('profil-uzytkownika/'. $data['user']->first_name . '-' . $data['user']->last_name .'/'. $data['user']->id); ?>">
          <h5 class="user-name font-weight-bold"><?= $data['user']->first_name . ' ' . $data['user']->last_name ?></h5>
        </a>

        <div class="card-data">
          <ul class="list-unstyled mb-1">
            <li class="comment-date font-small grey-text">
              <i class="far fa-clock"></i> <?= date("d/m/Y", strtotime($v->created)) ?></li>
          </ul>
        </div>
        <p class="dark-grey-text article"><?= $v->message ?></p>
      </div>
    </div>

    <?php endif; endforeach; ?>

    </div>

	</section>


</div>


<script>

function sendComment(user_id, news_id) {

var message=document.getElementById("commentBody").value;  

if (message == '') {

  document.getElementById('validationMsg').innerHTML = "<span class='text-danger comments_val'>Pole Wiadomość jest wymagane</span>";

} else {

   $.ajax({
   type: "post",
   url: "<?php echo base_url(); ?>actions/sendComment",
   data: {
         news_id: news_id,
         user_id: user_id,
         message: message
   },
   cache: false,
   complete: function(html) {
   console.log(html);
   $('#refreshComments').load(document.URL + ' #refreshComments', function() {
      $('#hideInfo').delay(5000).fadeOut(1000);
   });
   }
});

}

}

</script>