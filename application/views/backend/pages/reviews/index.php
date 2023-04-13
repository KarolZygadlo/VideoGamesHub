<main>
  <div class="page__section mb-5">
      <nav class="breadcrumb breadcrumb_type5 elegant-color-dark" aria-label="Breadcrumb">
        <ol class="breadcrumb__list r-list">
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend" class="breadcrumb__point r-link text-uppercase">Dashboard</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <a href="<?= base_url(); ?>backend/reviews" class="breadcrumb__point r-link text-uppercase">Recenzje</a>
            <span class="breadcrumb__divider" aria-hidden="true">›</span>
          </li>
          <li class="breadcrumb__group">
            <span class="breadcrumb__point text-uppercase" aria-current="page">Lista recenzji</span>
          </li>
        </ol>
      </nav>
  </div>   
  <div class="container-fluid">
    <div class="card card-cascade narrower mb-5">

      <div class="view view-cascade gradient-card-header elegant-color-dark narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <div class="md-form my-0">
          <a href="" class="white-text mx-3">Lista recenzji</a>
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
                <th class="th-sm">Id
                </th>
                <th class="th-sm">Tytuł
                </th>
                <th class="th-sm">Data utworzenia
                </th>
                <th class="th-sm">
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach (array_reverse($rows) as $key) : ?>
                <tr class="text-center">
                  <td><?= $key->id; ?></td>
                  <td><?= $key->title; ?></td>
                  <td><?= $key->created; ?></td>
                  <td>
                    <a target="_blank" href="<?= base_url('recenzja/'.slug($key->title).'/'.$key->id); ?>" type="button" class="btn btn-sm btn-light">Przejdź</a>
                    <a href="<?= base_url(); ?>backend/comments/index/reviews_comments/<?= $key->id; ?>" type="button" class="btn btn-sm btn-dark">Komentarze</a>
                    <a href="<?= base_url(); ?>backend/actions/delete/<?= $this->uri->segment(2); ?>/<?= $key->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć <?= $key->title; ?>? #<?= $key->id; ?>')">Usuń
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