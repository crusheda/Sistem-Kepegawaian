<?php
echo view('layout/v_header');
echo view('layout/v_nav');
echo view('layout/v_side'); ?>

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

      <div class="card">
        <div class="card-header">
          <a href="<?= base_url('admin/datakepeg/tambah') ?>" class="btn btn-sm btn-primary">Tambah Pegawai</a>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <?php if (session()->getFlashdata('pesan')) {
              echo '<div class="alert alert-success" role="alert">';
              echo session()->getFlashdata('pesan');
              echo '</div>';
          } ?>
          
          <table id="tableku" class="table table-bordered table-striped">
            <thead>
            <tr class="text-center">
              <th>NIP/NIK</th>
              <th>Nama Pegawai</th>
              <th>TTL</th>
              <th>Jenis Kelamin</th>
              <th>Pendidikan Terakhir</th>
              <th>No.HP</th>
              <th>Alamat</th>
              <th>Unit</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($datakepeg > 0) : ?>
              <?php foreach ($datakepeg as $item):?>
              <tr>
                <td><?php echo $item->nip ?></td>
                <td><?php echo $item->nama_peg ?></td>
                <td><?php echo $item->t.', '.$item->tl ?></td>
                <td><?php echo $item->kelamin ?></td>
                <td><?php echo $item->pendidikan ?></td>
                <td><?php echo $item->no_hp ?></td>
                <td><?php echo $item->alamat ?></td>
                <td><?php echo $item->unit ?></td>
                <td><?php echo $item->jabatan ?></td>
                <td class="text-center">
                  <?php echo "<a class='btn btn-sm btn-warning' href='ubahpeg/$item->id_user'><i class='nav-icon fas fa-edit'></i></a>"; ?><hr>
                  <?php echo "<a class='btn btn-sm btn-danger' href='hapuspeg/$item->id_user'><i class='nav-icon fas fa-trash-alt'></i></a>"; ?>
                </td>
              </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr><td colspan="9">Tidak Ada Data</td></tr>
            <?php endif ?>
            </tbody>
            <tfoot>
            <tr class="text-center">
              <th>NIP/NIK</th>
              <th>Nama Pegawai</th>
              <th>TTL</th>
              <th>Jenis Kelamin</th>
              <th>Pendidikan Terakhir</th>
              <th>No.HP</th>
              <th>Alamat</th>
              <th>Unit</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>

    </section>
</div>

<?php echo view('layout/v_footer'); ?>