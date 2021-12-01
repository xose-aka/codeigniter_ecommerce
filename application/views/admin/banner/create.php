<?php $this->load->view('includes/admin/header'); ?>
<?php
/**
 * @var array $banner_orders
 */
?>
    <div class="container-fluid">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
        <h1 class="h3 mb-2 text-gray-800">Brands</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Brand list</h6>
            </div>
            <div class="card-body">
                <?= form_open_multipart('admin/banner/store') ?><!--                <div class="row">-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_input(['name' => 'main_text', 'class' => 'form-control form-control-user', 'placeholder' => 'Main text', 'value' => set_value('main_text')], '', 'required') ?>
                        </div>
                        <div class="form-group">
                            <?= form_input(['name' => 'second_text', 'class' => 'form-control form-control-user', 'placeholder' => 'Second text',  'value' => set_value('second_text')], '', 'required') ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_upload(['name' => 'image', 'class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="banner_order">
                                <option value="">Choose banner order</option>
                                <?php foreach ($banner_orders as $key => $banner_order): ?>
                                    <option value="<?= $key ?>"><?= $key + 1 ?> <?= $banner_order ? 'reserved' : 'free' ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_submit(['class' => 'btn btn-success', 'value' => 'Save']) ?>
                    <?= form_button(['class' => 'btn btn-danger',  'content' => 'Cancel', 'data-toggle' => 'modal', 'data-target'=>"#cancelModal"]) ?>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/admin/footer'); ?>