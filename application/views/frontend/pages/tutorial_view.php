<div class="container s-margin">

<!--Grid row-->
<div class="row ">
    <?php $data['author'] = $this->backend->get_one_record('users', $tutorial->user_id); ?>
    <!--Grid column-->
    <div class="col-md-6 mt-5 mb-5">
        <img src="<?= base_url('uploads/'.$tutorial->photo); ?>" class="img-fluid z-depth-1"
             alt="image">
    </div>
    <!--Grid column-->
    <div class="col-md-6 mt-5 mb-5 text-left">
        <h2 class="font-weight-bold mb-4"><?= $tutorial->book_title ?></h2>
        <h5 class="font-weight-light">Gra: <?= $tutorial->game_title ?> </h5>
        <h5 class="font-weight-light">Autor: <?= $data['author']->first_name . ' ' .  $data['author']->last_name ?></h5>
        <h5 class="font-weight-light">Ocena: <?= round($average_grade) ?> </h5>

        <br>

        <a href="<?php echo base_url(); ?>czytaj-pdf/<?= slug($tutorial->book_title); ?>/<?= $tutorial->id; ?>"><button type="button" class="btn btn-dark">Czytaj</button></a>

        <?php if ($_SESSION['login'] ?? null): ?>
        <a href="<?php echo base_url(); ?>pobierz-pdf/<?= slug($tutorial->book_title); ?>/<?= $tutorial->id; ?>"><button type="button" class="btn btn-dark">Generuj plik PDF</button></a>
        <?php endif; ?>

    </div>
    <div class="col-md-12">
        <h2 class="font-weight-bold">Opis książki: </h2>
        <hr>
        <div class="my-5"><?= $tutorial->body ?></div>
        <hr>
    </div>
</div>
<!--Grid row-->

</div>

<div class="container my-5">

  
  <!--Section: Block Content-->
  <section class="dark-grey-text mb-5">

    <!-- Section heading -->
    <h3 class="font-weight-bold text-center mb-5">Komentarze dotyczące poradnika</h3>

    <div id="refreshComments">
    <?php $data['user_opinion'] = $this->backend->get_user_opinion_for_tutorials('tutorials_comments', $user->id, $tutorial->id);
    
    if(empty($data['user_opinion'])) :
    ?>
    <?php if(isset($_SESSION['flashdata_false'])): ?>
               <div id="hideInfo" class="alert alert-danger"><?php echo $_SESSION['flashdata_false']; ?></div>
               <?php elseif(isset($_SESSION['flashdata_success'])): ?>
               <div id="hideInfo" class="alert alert-success"><?php echo $_SESSION['flashdata_success']; ?></div>
               <?php endif; ?>
    <div class="container mb-5">
      <div id="validationMsg1"></div>
      <div class="md-form">
        <textarea id="commentBody" class="md-textarea form-control" rows="5" name="body" required></textarea>
        <label for="commentBody">Dodaj komentarz</label>
      </div>
      
      <div id="validationMsg2"></div>
      <div id="validationMsg3"></div>
      <div class="md-form">
        <input type="number" id="grade" class="form-control" name="grade" min="1" max="5" required>
        <label for="grade">Ocena [1-5]</label>
      </div>
      
    <button type="submit" class="btn btn-dark align-right" onclick="sendComment('<?= $user->id ?>', '<?= $tutorial->id; ?>')">Wyślij</button>
    </div>

    <?php
      endif;
      $data['comments'] = $this->backend->get_tutorials_comments('tutorials_comments', $tutorial->id);
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
              <i class="far fa-clock"></i> <?= date("d/m/Y", strtotime($v->created)) ?>
              <span class="ml-2">Ocena: <?= $v->grade ?></span></li>
              </li>
      
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

function sendComment(user_id, tutorial_id) {

var message=document.getElementById("commentBody").value;
var grade=document.getElementById("grade").value;

document.getElementById('validationMsg1').innerHTML = "";
document.getElementById('validationMsg2').innerHTML = "";
document.getElementById('validationMsg3').innerHTML = "";

if (message == '') {

  document.getElementById('validationMsg1').innerHTML = "<span class='text-danger comments_val'>Pole Wiadomość jest wymagane</span>";

}
else if (grade == '') {

document.getElementById('validationMsg2').innerHTML = "<span class='text-danger comments_val'>Pole Ocena jest wymagane</span>";

}
else if (isNaN(grade) || grade < 1 || grade > 5) {

document.getElementById('validationMsg3').innerHTML = "<span class='text-danger comments_val'>Pole Ocena musi być liczbą i być w zakresie od 1-5</span>";

} else {

   $.ajax({
   type: "post",
   url: "<?php echo base_url(); ?>actions/sendTutorialComment",
   data: {
         tutorial_id: tutorial_id,
         user_id: user_id,
         message: message,
         grade:grade
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