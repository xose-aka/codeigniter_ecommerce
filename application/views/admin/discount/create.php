<?php $this->load->view('includes/admin/header'); ?>
    <div class="container-fluid">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
        <h1 class="h3 mb-2 text-gray-800">Discount</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Discount add</h6>
            </div>
            <div class="card-body">
                <?= form_open_multipart('admin/discount/store') ?>
                <div class="form-row">
                    <div class="col-md-6 form-group required">
                        <?= form_label('Title', 'title', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'title', 'id' => 'title', 'class' => 'form-control form-control-user', 'placeholder' => 'Title'], set_value('title')) ?>
                    </div>
                    <div class="col-md-6 form-group required">
                        <?= form_label('Percent', 'percent', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'percent', 'id' => 'percent', 'class' => 'form-control form-control-user', 'placeholder' => 'Percent'], set_value('slug')) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="offset-3"></div>
                    <div class="col-md-6 form-group required">
                        <?= form_label('Description', 'description', ['class' => 'control-label']) ?>
                        <?= form_textarea(['name' => 'description', 'id' => 'description', 'class' => 'form-control form-control-user'], set_value('description')) ?>
                    </div>
                    <div class="offset-3"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group required">
                        <?= form_label('Image', 'image', ['class' => 'control-label']) ?>
                        <?= form_upload(['name' => 'image', 'id' => 'image', 'class' => 'form-control']) ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <?= form_submit(['class' => 'btn btn-success', 'value' => 'Save']) ?>
                        <?= form_button(['class' => 'btn btn-danger',  'content' => 'Cancel', 'data-toggle' => 'modal', 'data-target'=>"#cancelModal"]) ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/admin/footer'); ?>