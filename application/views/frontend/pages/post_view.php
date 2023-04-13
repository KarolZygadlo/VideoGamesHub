<div class="container s-margin">
  <?php
  $data['user_data'] = $this->backend->get_one_record('users', $post->user_id);
  ?>
  <div class="card news-card mb-5">

    <div class="card-body">
      <div class="content">
        <div class="right-side-meta"><?= date("Y-m-d H:i:s", strtotime($post->created)) ?></div>
        <img src="<?= base_url('uploads/' . $data['user_data']->photo); ?>" class="rounded-circle avatar-img z-depth-1-half"><?= $data['user_data']->first_name . ' ' . $data['user_data']->last_name ?>
      </div>
    </div>

    <div class="feed_background_image" style="background-image: url('<?= base_url('uploads/' . $post->photo); ?>');"></div>
    <div class="card-body">

      <div class="social-meta">
        <div class="mt-5 mb-5"><?= $post->body ?></div>
        <p><i class="fas fa-comment"></i><?= $this->backend->count_comments('post_comments', $post->id); ?> komentarz-y</p>
      </div>
      <hr>

    </div>

  </div>

  <div class="container my-5">

    <section class="dark-grey-text mb-5">

      <h3 class="font-weight-bold text-center mb-5">Komentarze do postu</h3>

      <div id="refreshComments">
        <?php if (isset($_SESSION['flashdata_false'])) : ?>
          <div id="hideInfo" class="alert alert-danger"><?php echo $_SESSION['flashdata_false']; ?></div>
        <?php elseif (isset($_SESSION['flashdata_success'])) : ?>
          <div id="hideInfo" class="alert alert-success"><?php echo $_SESSION['flashdata_success']; ?></div>
        <?php endif; ?>
        <div class="container mb-5">
          <div id="validationMsg"></div>
          <div class="md-form">
            <textarea id="commentBody" class="md-textarea form-control" rows="5" name="body"></textarea>
            <label for="commentBody">Dodaj komentarz</label>
          </div>

          <button type="button" class="btn btn-dark align-right" onclick="sendComment('<?= $user->id ?>', '<?= $post->id; ?>')">Wyślij</button>
        </div>

        <?php
        $data['comments'] = $this->backend->get_post_comments('post_comments', $post->id);
        ?>

        <?php $i = 0;
        foreach (array_reverse($data['comments']) as $v) : $i++;
          if ($v->active == '1') :
            $data['user'] = $this->backend->get_one_record('users', $v->user_id);
        ?>

            <div class="media mt-5">
            <a title="Przejdź do profilu" class="text-dark" href="<?= base_url('profil-uzytkownika/' . $data['user']->first_name . '-' . $data['user']->last_name . '/' . $data['user']->id); ?>"><img class="card-img-100 rounded-circle z-depth-1-half d-flex mr-3" src="<?= base_url('uploads/' . $data['user']->photo); ?>" alt="users avatar"></a>
              <div class="media-body">
                <a title="Przejdź do profilu" class="text-dark" href="<?= base_url('profil-uzytkownika/' . $data['user']->first_name . '-' . $data['user']->last_name . '/' . $data['user']->id); ?>">
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

        <?php endif;
        endforeach; ?>

      </div>

    </section>


  </div>

</div>
  <script>
    function sendComment(user_id, post_id) {

      var message = document.getElementById("commentBody").value;

      if (message == '') {

        document.getElementById('validationMsg').innerHTML = "<span class='text-danger comments_val'>Pole Wiadomość jest wymagane</span>";

      } else {

        $.ajax({
          type: "post",
          url: "<?php echo base_url(); ?>posts/sendComment",
          data: {
            post_id: post_id,
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
