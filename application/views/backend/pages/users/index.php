<main>
  <div class="page__section mb-5">
    <nav class="breadcrumb breadcrumb_type5 elegant-color-dark" aria-label="Breadcrumb">
      <ol class="breadcrumb__list r-list">
        <li class="breadcrumb__group">
          <a href="<?= base_url(); ?>backend" class="breadcrumb__point r-link text-uppercase">Dashboard</a>
          <span class="breadcrumb__divider" aria-hidden="true">›</span>
        </li>
        <li class="breadcrumb__group">
          <a href="<?= base_url(); ?>backend/users" class="breadcrumb__point r-link text-uppercase">Użytkownicy</a>
          <span class="breadcrumb__divider" aria-hidden="true">›</span>
        </li>
        <li class="breadcrumb__group">
          <span class="breadcrumb__point text-uppercase" aria-current="page">Lista użytkowników</span>
        </li>
      </ol>
    </nav>
  </div>
  <div class="container-fluid">
    <div class="card card-cascade narrower mb-5">

      <div class="view view-cascade gradient-card-header elegant-color-dark narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <div class="md-form my-0">
          <a href="" class="white-text mx-3">Lista użytkowników</a>
        </div>

        <div class="text-right" style="width: 181px;">
          <a href="<?= base_url(); ?>users/register_view">
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
              <tr class="text-center">
                <th class="th-sm">Id
                </th>
                <th class="th-sm">Status konta
                </th>
                <th class="th-sm">Login
                </th>
                <th class="th-sm">Created
                </th>
                <th class="th-sm">Email
                </th>
                <th class="th-sm">Imię i nazwisko
                </th>
                <th class="th-sm">Grupa
                </th>
                <th class="th-sm">
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach (array_reverse($rows) as $key) : ?>
                <tr class="text-center">
                  <td><?= $key->id; ?></td>
                  <td>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkStatus<?php echo $key->id; ?>" onchange="active_account(<?php echo $key->id; ?>, '<?= $table ?>');" <?php if($key->active == 1){echo 'checked';} ?>>
                    <label class="form-check-label" for="checkStatus<?php echo $key->id; ?>"></label>
                  </div>
                  </td>
                  <td><?= $key->login; ?></td>
                  <td><?= $key->created; ?></td>
                  <td><?= $key->email; ?></td>
                  <td><?= $key->first_name; ?> <?= $key->last_name; ?></td>
                  <td>
                  <select class="custom-select" id="group<?=$key->id?>" onchange="change_group(<?php echo $key->id; ?>, '<?= $table ?>');">
                    <option selected>Wybierz...</option>
                    <option value="administration">Administracja</option>
                    <option value="users">Użytkownicy</option>
                  </select> 
                  </td>
                  <td>
                    <a href="<?= base_url(); ?>backend/actions/delete/<?= $this->uri->segment(2); ?>/<?= $key->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć <?= $key->login; ?>? #<?= $key->id; ?>')">Usuń
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
</main>

<script type="text/javascript">
  function active_account(id, table) {
    value = document.getElementById('checkStatus'+id).checked;
    if(value == true) { value = 1;} else {value = 0;}
    $.ajax({  
         type: "post", 
         url:"<?php echo base_url(); ?>backend/<?php echo $this->uri->segment(2); ?>/active_account", 
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

<script type="text/javascript">
  function change_group(id, table) {
    value = document.getElementById('group'+id).value;

    $.ajax({  
         type: "post", 
         url:"<?php echo base_url(); ?>backend/<?php echo $this->uri->segment(2); ?>/change_group", 
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