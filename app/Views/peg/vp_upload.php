<?php
echo view('layout/v_header');
echo view('layout/v_nav');
echo view('layout/v_side'); ?>

<div class="content-wrapper">

    <br>

    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $title ?></h3>
        </div>
        <?= form_open_multipart(base_url('peg/upload')); ?>
            <input type="number" value="<?php echo $show[0]->id_user?>" name="id_user" hidden>
            <input type="number" value="<?php echo $show[0]->nip ?>" name="nip" class="form-control" hidden>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="number" value="<?php echo $show[0]->nip ?>" class="form-control" placeholder="NIP / NIK" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" value="<?php echo $show[0]->nama_peg ?>" class="form-control" placeholder="" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul File</label>
                            <input type="text" name="judul" value="" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Upload</label>
                            <input type="file" name="file_upload[]" class="form-control" multiple="true" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success float-right">Simpan</button>
            </div>
        <?= form_close() ?>	
      </div>

    </section>
</div>

<?php echo view('layout/v_footer'); ?>