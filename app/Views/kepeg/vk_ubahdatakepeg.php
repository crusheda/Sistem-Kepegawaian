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
        <form action="<?php echo base_url(). '/kepeg/updatepegawai'; ?>" method="post">
            <input type="number" value="<?php echo $show[0]->id_user?>" name="id_user" hidden>
            <div class="card-body">
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
                            <label>Nomer SIK / SIP</label>
                            <input type="number" value="<?php echo $show[0]->no_sip ?>" name="no_sip" min="0" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Masa Berlaku SIK / SIP</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="exp_sip" value="<?php echo $show[0]->exp_sip ?>" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success float-right">Simpan</button>
            </div>
        </form>	
      </div>

    </section>
</div>

<?php echo view('layout/v_footer'); ?>