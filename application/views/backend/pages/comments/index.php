<main>
  <div class="page__section mb-5">
      <nav class="breadcrumb breadcrumb_type5 elegant-color-dark" aria-label="Breadcrumb">
        <ol class="breadcrumb__list r-list">
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend" class="breadcrumb__point r-link text-uppercase">Dashboard</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend/<?= $table; ?>" class="breadcrumb__point r-link text-uppercase"><?= $table ?></a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <span class="breadcrumb__point text-uppercase" aria-current="page">Lista komentarzy do wpisu o ID #<?= $entry_id ?></span>
          </li>
        </ol>
      </nav>
  </div>   
  <div class="container-fluid">
    <div class="card card-cascade narrower mb-5">

      <div class="view view-cascade gradient-card-header elegant-color-dark narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <div class="md-form my-0">
          <a href="" class="white-text mx-3">Lista komentarzy</a>
        </div>

        <div class="text-right" style="width: 181px;">
            <button type="button" class="btn btn-outline-white btn-rounded btn-hover-alt btn-sm px-2">
              <i class="fas fa-plus mt-0"></i>
            </button>
        </div>

      </div>

      <div class="px-4 pb-3">
        <div class="table-responsive">
          <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
            <thead>
              <tr class="text-center">
                <th class="th-sm">Aktywny
                </th>
                <th class="th-sm">Id
                </th>
                <th class="th-sm">Użytkownik
                </th>
                <th class="th-sm">Data utworzenia
                </th>
                <th class="th-sm">Treść komentarza
                </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach (array_reverse($rows) as $key) : 
                $data['user'] = $this->backend->get_one_record('users', $key->user_id);
            ?>
              
                <tr class="text-center">
                  <td>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkOpinion<?php echo $key->id; ?>" onchange="active_opinion(<?php echo $key->id; ?>, '<?= $table ?>');" <?php if($key->active == 1){echo 'checked';} ?>>
                    <label class="form-check-label" for="checkOpinion<?php echo $key->id; ?>"></label>
                  </div>
                  </td>
                  <td><?= $key->id; ?></td>
                  <td><?= $data['user']->first_name . ' ' . $data['user']->last_name ?></td>
                  <td><?= $key->created; ?></td>
                  <td><?= $key->message; ?></td>
                  <td><a href="<?= base_url(); ?>backend/actions/delete/<?= $table ?>/<?= $key->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć komentarz o id #<?= $key->id; ?> ?')">Usuń
                </a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>
        </div>


      </div>

    </div>

  </div>
</main>

<script type="text/javascript">
  function active_opinion(id, table) {
    value = document.getElementById('checkOpinion'+id).checked;
    if(value == true) { value = 1;} else {value = 0;}
    $.ajax({  
         type: "post", 
         url:"<?php echo base_url(); ?>backend/<?php echo $this->uri->segment(2); ?>/active_opinion", 
         data: {id:id, value:value, table:table}, 
         cache: false,
         beforeSend:function(html){
           console.log(html);
         },
         complete:function(html){
           console.log(html);
         }  
    });  
  }
</script>