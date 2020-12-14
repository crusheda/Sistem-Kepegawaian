<?php
echo view('layout/v_header');
echo view('layout/v_nav');
echo view('layout/v_side'); ?>

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4><?= $title ?></h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
    
    </section>
</div>

<?php echo view('layout/v_footer'); ?>