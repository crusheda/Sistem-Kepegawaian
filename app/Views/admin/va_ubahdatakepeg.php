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
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <form action="<?php echo base_url(). '/admin/updatepegawai'; ?>" method="post">
        <input type="number" value="<?php echo $datakepeg[0]->id_user?>" name="id_user" hidden>
        <div class="card-body">
            <!-- /.card-header -->
            <?php $errors = session()->getFlashdata('errors'); 
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
            <?php } ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="number" value="<?php echo $datakepeg[0]->nip ?>" name="nip" class="form-control" placeholder="NIP / NIK">
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" value="<?php echo $datakepeg[0]->t ?>" name="t" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir</label>
                    <input type="text" value="<?php echo $datakepeg[0]->pendidikan ?>" name="pendidikan" class="form-control" placeholder="">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" value="<?php echo $datakepeg[0]->nama_peg ?>" name="nama_peg" class="form-control" placeholder="">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Tanggal Lahir</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" value="<?php echo $datakepeg[0]->tl ?>" name="tl" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control select2" name="kelamin" style="width: 100%;">
                                <option hidden>Pilih</option>
                                <option value="laki-laki" <?php if ($datakepeg[0]->kelamin == 'laki-laki') { ?>
                                    selected
                                <?php } ?>>Laki-laki</option>
                                <option value="perempuan" <?php if ($datakepeg[0]->kelamin == 'perempuan') { ?>
                                    selected
                                <?php } ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nomer Handphone</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" value="<?php echo $datakepeg[0]->no_hp ?>" name="no_hp" class="form-control" data-inputmask='"mask": "(999) 999-999-999"' data-mask>
                    </div>
                  <!-- /.input group -->
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea value="<?php echo $datakepeg[0]->alamat ?>" name="alamat" class="form-control" rows="3" placeholder=""><?php echo htmlspecialchars($datakepeg[0]->alamat); ?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>Unit</label>
                    <input type="text" value="<?php echo $datakepeg[0]->unit ?>" name="unit" class="form-control" placeholder="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" value="<?php echo $datakepeg[0]->jabatan ?>" name="jabatan" class="form-control" placeholder="">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <div class="card-footer">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
        </form>	
      </div>

    </section>
</div>

<?php echo view('layout/v_footer'); ?>