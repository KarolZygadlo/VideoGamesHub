<main class="main-section">
    <div class="page__section mb-5">
      <nav class="breadcrumb breadcrumb_type5 elegant-color-dark" aria-label="Breadcrumb">
        <ol class="breadcrumb__list r-list">
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend" class="breadcrumb__point r-link text-uppercase">Dashboard</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend/mails" class="breadcrumb__point r-link text-uppercase">Skrzynka mailowa</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <span class="breadcrumb__point text-uppercase" aria-current="page">
                Odpowiedź na wiadomośc email o ID #<?= $value->id; ?>
            </span>
          </li>
        </ol>
      </nav>
    </div>  
	<div class="container mb-5">
	<?php if($this->session->flashdata('flashdata')) {
	  echo $this->session->flashdata('flashdata');
	} ?>
	</div>
		<div class="container-fluid px-md-5 mb-5">
			<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div class="view view-cascade narrower elegant-color-dark py-4 mx-4 mb-3 text-center">

			    <span class="white-text mx-3 w-100">Wiadomość od <?= $value->name; ?>, <?= @$value->email; ?></span>

			  </div>
                <div class="container-fluid">

                    <div class="row px-5">
                        <div class="col-md-6">

                            <div class="md-form mb-5">
                                <input type="text" id="formTitle" class="form-control" value="<?= @$value->name; ?>" readonly>
                                <label for="formTitle"><span class="text-danger">*</span>Imię i nazwisko</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formEmail" class="form-control" value="<?= @$value->email; ?>" readonly>
                                <label id="email" for="formEmail"><span class="text-danger">*</span>Email</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="formSubject" class="form-control" value="<?= @$value->subject; ?>" readonly>
                                <label for="formSubject"><span class="text-danger">*</span>Temat</label>
                            </div>

                            <span class="my-3">Treść wiadomości</span>

                            <div class="md-form mb-5">
                                <textarea class="tinymce"><?= @$value->message; ?></textarea>
                            </div>

                            <div class="form-check mb-5">
                                <input type="checkbox" class="form-check-input" id="materialUnchecked" <?php if($value->rodo1 == 1){echo 'checked';} ?> onclick="return false;">
                                <label class="form-check-label" for="materialUnchecked">Zgoda na przetwarzanie danych osobowych</label>
                            </div>

                            <div class="form-check mb-5">
                                <input type="checkbox" class="form-check-input" id="materialUnchecked" <?php if($value->rodo2 == 1){echo 'checked';} ?> onclick="return false;">
                                <label class="form-check-label" for="materialUnchecked">Zgoda na przetwarzanie danych osobowych</label>
                            </div>

                        </div>

                        <div class="col-md-6">

                        <div id="answer">
                                <?php if($value->answer == 1): ?>
                                <span class="text-success"><i class="fas fa-check"></i> Odpowiedź została wysłana!</span>
                                <?php endif; ?>
                        </div>

                        <div class="md-form mb-5">
                            <input type="text" id="formSubject" class="form-control" name="subject" required>
                                <label for="formSubject">Tytuł wiadomości<span class="text-danger">*</span></label>
                        </div>

                        <span class="my-3">Treść wiadomości</span>

                            <div class="md-form mb-5">
                            <textarea class="tinymce" name="message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-dark mb-5" onclick="sendMessage(<?= $value->id; ?>)">Wyślij</button>
                        <button onclick="window.history.go(-1); return false;" class="btn btn-light mb-5 float-left">Cofnij</button>
                            
                        </div>

                        </div>

                    </div>

                </div>

</main>

<script type="text/javascript">
      function sendMessage(id)
      {
        var id = id;
        var subject = document.getElementsByName('subject')[0].value;
        var message = document.getElementsByName('message')[0].value;
        var email = document.getElementById('email').value;
        $.ajax({  
             type: "post", 
             url:"<?php echo base_url(); ?>backend/mails/send", 
             data: {id:id, subject:subject, message:message, email:email}, 
             cache: false,
             beforeSend:function(html)
             {
                document.getElementById('answer').innerHTML = '<p class=""><i class="fas fa-spinner fa-pulse loader"></i></p>';
             },
             complete:function(html)
             {
                 console.log(html);
                document.getElementById('answer').innerHTML = '<p class="text-success"><i class="fas fa-check"></i> Odpowiedź została wysłana!</p>';
             }  
        });  
      }
    </script>