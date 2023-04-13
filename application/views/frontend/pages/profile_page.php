<div class="parallax" style="background-image: url('<?= base_url('uploads/' . $profile_data->background_photo); ?>');">
</div>

<!--Main Layout-->
<main>

  <div class="container">

    <!--Section: Team v.1-->
    <section class="text-center team-section">

      <!--Grid row-->
      <div class="row text-center">

        <!--Grid column-->
        <div class="col-md-12 mb-4" style="margin-top: -100px;">

          <div class="avatar mx-auto">
            <?php if ($user->photo ?? null) :
              echo '<img class="rounded-circle z-depth-0" src="' . base_url() . 'uploads/' . $profile_data->photo . '"';
            else :
              echo '<img class="rounded-circle z-depth-0" src="http://via.placeholder.com/64x64" alt="">';
            endif; ?>
          </div>
          <h3 class="my-3 font-weight-bold">
            <strong><?= $profile_data->first_name . ' ' . $profile_data->last_name ?></strong>
          </h3>

          <?php if ($profile_data->facebook_link ?? null) : ?>
            <a href="<?= $profile_data->facebook_link ?>" class="p-2 m-2 fa-lg fb-ic">
              <i class="fab fa-facebook-f grey-text"> </i>
            </a>
          <?php endif;
          if ($profile_data->twitter_link ?? null) :
          ?>
            <a href="<?= $profile_data->twitter_link ?>" class="p-2 m-2 fa-lg tw-ic">
              <i class="fab fa-twitter grey-text"> </i>
            </a>
          <?php endif;
          if ($profile_data->instagram_link ?? null) :
          ?>
            <a href="<?= $profile_data->instagram_link ?>" class="p-2 m-2 fa-lg ins-ic">
              <i class="fab fa-instagram grey-text"> </i>
            </a>
          <?php endif;
          if ($profile_data->steam_link ?? null) :
          ?>
            <a href="<?= $profile_data->steam_link ?>" class="p-2 m-2 fa-lg ins-ic">
              <i class="fab fa-steam grey-text"> </i>
            </a>
          <?php endif; ?>
          <p class="mt-5"><?= $profile_data->description ?></p>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </section>
    <!--Section: Team v.1-->

    <!--Section: Tabs-->
    <section>

      <ul class="nav md-pills pills-default d-flex justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#panel10" role="tab">
            <strong>Wpisy</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#panel11" role="tab">
            <strong>Poradniki</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#panel12" role="tab">
            <strong>Recenzje</strong>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#panel13" role="tab">
            <strong>Biblioteka gier</strong>
          </a>
        </li>
      </ul>

      <!-- Tab panels -->
      <div class="tab-content">

        <!--Panel 1-->
        <div class="tab-pane fade show active" id="panel10" role="tabpanel">
          <br>

          <!--Grid row-->
          <div class="row">

            <div class="col-md-12 mb-5">
              <?php if ($user->id == $profile_data->id) : ?>
                <h3 class="font-weight-bold black-text mb-5 pb-2 text-center">Dodaj wpis</h3>

                <div id="refreshPosts">

                <?php if (isset($_SESSION['post_flashdata_false'])) : ?>
                  <div id="hideInfo" class="alert alert-danger"><?php echo $_SESSION['post_flashdata_false']; ?></div>
                <?php elseif (isset($_SESSION['post_flashdata_success'])) : ?>
                  <div id="hideInfo" class="alert alert-success"><?php echo $_SESSION['post_flashdata_success']; ?></div>
                <?php endif; ?>
                  <div class="container mb-5">
                    <div class="file-field text-center">
                      <div id="photoViewer_1" class="mb-4 delete_photo cursor" onclick="clear_box(1);">
                        <img class="z-depth-1-half avatar-pic" src="http://via.placeholder.com/64x64" alt="placeholder img">
                      </div>

                      <div class="md-form">
                        <div class="file-field d-flex justify-content-center">
                          <div class="btn btn-dark btn-md">
                            <span>Dodaj zdjęcie</span>
                            <input type="file" name="photo_1" id="photo_1">
                          </div>
                          <div class="file-path-wrapper">
                            <input name="name_photo_1" id="name_photo_1" class="file-path validate" type="text" placeholder="Dodaj zdjęcie" required readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="validationMsg"></div>
                    <div class="md-form">
                      <textarea id="postBody" class="md-textarea form-control" rows="5" name="body"></textarea>
                      <label for="postBody">O czym myślisz, <?= $profile_data->first_name ?> ?</label>
                    </div>

                    <button type="button" class="btn btn-dark align-right" onclick="sendPost('<?= $profile_data->id ?>', 'posts')">Wyślij</button>
                  </div>

                <?php endif; ?>

                <?php
                $data['posts'] = $this->backend->get_all_active_user_posts('posts', $profile_data->id);
                ?>

                <?php $i = 0;
                foreach (array_reverse($data['posts']) as $v) : $i++; ?>



                  <div class="card news-card mb-5">

                    <div class="card-body">
                      <div class="content">
                        <div class="right-side-meta"><?= date("Y-m-d H:i:s", strtotime($v->created)) ?></div>
                        <img src="<?= base_url('uploads/' . $profile_data->photo); ?>" class="rounded-circle avatar-img z-depth-1-half"><?= $profile_data->first_name . ' ' . $profile_data->last_name ?>
                      </div>
                    </div>


                    <?php if ($v->photo ?? null) : ?>
                      <div class="feed_background_image" style="background-image: url('<?= base_url('uploads/' . $v->photo); ?>');"></div>
                    <?php endif; ?>

                    <div class="card-body">

                      <div class="social-meta">
                        <div class="mt-5 mb-5"><?= $v->body ?></div>
                        <a href="<?= base_url('post/' . $v->id); ?>">
                          <p><i class="fas fa-comment"></i><?= $this->backend->count_comments('post_comments', $v->id); ?> komentarz-y</p>
                        </a>
                      </div>
                      <hr>

                      <?php if ($user->id == $profile_data->id) : ?>

                        <a href="<?php echo base_url(); ?>actions/delete/posts/<?php echo $v->id; ?>" onclick="return confirm('Czy na pewno chcesz usunąć wpis? #<?php echo $v->id; ?>')" class="btn btn-sm btn-danger">Usuń
                        </a>

                      <?php endif; ?>

                    </div>

                  </div>

                <?php endforeach; ?>

                </div>

            </div>

          </div>
          <!--Grid row-->

        </div>
        <!--/.Panel 1-->

        <!--Panel 2-->
        <div class="tab-pane fade" id="panel11" role="tabpanel">
          <br>

          <div class="row">


            <?php foreach ($user_tutorials as $v) : ?>

              <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

                <a href="<?= base_url('poradnik/' . slug($v->game_title) . '/' . $v->id); ?>">
                  <div class="card hoverable">

                    <img class="card-img-top" src="<?= base_url('uploads/' . $v->photo); ?>" alt="<?= $v->game_title ?>">

                    <div class="card-body">

                      <p class="card-title text-muted text-uppercase font-small mt-1 mb-3"><?= $v->game_title ?></p>

                      <p class="mb-2 text-dark"><?= $v->book_title ?></p>

                    </div>

                  </div>

                </a>

              </div>

            <?php endforeach; ?>

          </div>

        </div>
        <!--/.Panel 2-->

        <div class="tab-pane fade" id="panel13" role="tabpanel">
          <br>

          <div class="container">
            <div class="row" id="gallery">
              <?php $i = 0;
              foreach ($library as $row) : ?>

                <div class="col-lg-4 col-md-6 mb-5 text-center">
                  <div class="photo_project" style="background-image: url('<?php echo base_url(); ?>uploads/<?php echo $row->photo; ?>')">
                  </div>
                  <h3 class="mt-3"><?= $row->title ?></h3>
                  <h5><?= $row->platform ?></h5>
                </div>

              <?php $i++;
              endforeach; ?>

            </div>
          </div>

        </div>

        <!--Panel 3-->
        <div class="tab-pane fade" id="panel12" role="tabpanel">
          <br>

          <?php foreach ($reviews as $v) : ?>
            <div class="row">

              <!-- Grid column -->
              <div class="col-lg-5 col-xl-4">

                <!-- Featured image -->
                <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                  <img class="img-fluid" src="<?= base_url('uploads/' . $v->photo); ?>">
                  <a>
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-lg-7 col-xl-8">

                <!-- Post title -->
                <h3 class="font-weight-bold mb-3"><strong><?= $v->title ?></strong></h3>
                <!-- Excerpt -->
                <p class="dark-grey-text"><?= substr($v->body, 0, 150); ?>...</p>

                <p><?= date("d/m/Y", strtotime($v->created)) ?></p>
                <!-- Read more button -->
                <a href="<?= base_url('recenzja/' . slug($v->title) . '/' . $v->id); ?>" class="btn btn-elegant btn-md">Czytaj więcej</a>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          <?php endforeach; ?>

        </div>
        <!--/.Panel 3-->



      </div>

    </section>
    <!--Section: Tabs-->

  </div>

</main>
<!--Main Layout-->

<script>
  function sendPost(user_id, table) {

    var body = document.getElementById("postBody").value;

    var data = new FormData();
    data.append(photo_1.name, photo_1.files[0]);
    data.append('user_id', user_id);
    data.append('body', body);
    data.append('table', table);

    if (body == '') {

      document.getElementById('validationMsg').innerHTML = "<span class='text-danger'>Pole Wiadomość jest wymagane</span>";

    } else {

      $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>posts/sendPost",
        data: data,
        contentType: false,
        processData: false,
        complete: function(html) {
          console.log(html);
          $('#refreshPosts').load(document.URL + ' #refreshPosts', function() {
            $('#hideInfo').delay(5000).fadeOut(1000);
          });
        }
      });

    }

  }
</script>