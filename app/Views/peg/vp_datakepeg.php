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
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('success');
                        echo '</div>';
                    } ?>
                
                    <table id="tableku" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if ($show > 0) : ?>
                                <?php foreach ($show as $item):?>
                                    <tr>
                                        <td><?php echo $item->id_user ?></td>
                                        <td><?php echo $item->nip ?></td>
                                        <td><?php echo $item->nama_peg ?></td>
                                        <td class="text-center">
                                            <?php if ($item->id_upload == null) { ?>
                                                <?php echo "<a class='btn btn-sm btn-info' href='uploadfile/$item->id_user'><i class='nav-icon fas fa-download'></i> Upload File</a>"; ?>
                                            <?php }else { ?>
                                                <span class="badge badge-success">Sudah Di Upload</span><hr>
                                                <?php echo "<a class='btn btn-sm btn-warning' href='lihat/$item->id_user'><i class='nav-icon fas fa-edit'></i> Lihat File</a>"; ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr><td colspan="4">Tidak Ada Data</td></tr>
                            <?php endif ?>
                        </tbody>

                        <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        
    </div>
    </section>
</div>

<?php echo view('layout/v_footer'); ?>