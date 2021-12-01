<?php if ( !empty($this->session->flashdata('success')) ): ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>
<?php if ( !empty($this->session->flashdata('error')) ): ?>
    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>
<?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
