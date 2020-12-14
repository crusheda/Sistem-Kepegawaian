<?php
echo view('layout/v_header');
echo view('layout/v_nav');
echo view('layout/v_side'); ?>

<div class="content-wrapper">

    <br>

    <section class="content">

      <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $title ?> - <?php echo $show[0]->id_upload ?></h3>
            <form action="<?php echo base_url(). '/peg/hapus'; ?>" method="post">
                <input type="number" value="<?php echo $show[0]->id_user?>" name="id_user" hidden>
                <center><button type="submit" class="btn btn-sm btn-danger float-right" disabled>Hapus</button></center>
            </form>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <a><b>NIP</b></a><br>
                        <a><b>Nama Pegawai</b></a><hr>
                        <a><b>Judul</b></a><br>
                        <a><b>Keterangan</b></a><br>
                        <a><b>Ditambahkan pada</b></a>
                    </div>
                    <div class="col-md-9">
                        <a>: <?php echo $show[0]->nip ?></a><br>
                        <a>: <?php echo $show[0]->nama_peg ?></a><hr>
                        <a>: <?php echo $show[0]->judul ?></a><br>
                        <a>: <?php echo $show[0]->keterangan ?></a><br>
                        <a>: <?php echo $show[0]->created_at ?></a><br>
                    </div>
                </div><br>
                <table id="tableku" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>File</th>
                        </tr>
                    </thead>

                    <tbody><?php $i = 1; ?>
                        <?php if ($show > 0) : ?>
                            <?php foreach ($show as $item):?>
                                <tr>
                                    <td><?php echo $i?> </td>
                                    <td><?php echo $item->file ?></td>
                                </tr><?php $i++ ?>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr><td colspan="2">Tidak Ada Data</td></tr>
                        <?php endif ?>
                    </tbody>

                    <tfoot>
                        <tr class="text-center">
                            <th>No</th>
                            <th>File</th>
                        </tr>
                    </tfoot>
                </table>
            
            </div>
      </div>

    </section>
</div>

<?php echo view('layout/v_footer'); ?>