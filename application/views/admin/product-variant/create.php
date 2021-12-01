<?php $this->load->view('includes/admin/header'); ?>
<?php /**
         * @var array $products
         * @var array $brands
 */ ?>
<div class="container-fluid">
    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
    <h1 class="h3 mb-2 text-gray-800">Product</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
        </div>
        <div class="card-body">
            <?= form_open_multipart('admin/product-variant/store') ?>
            <div class="row form-group">
                <div class="col-md-6">
                    <?= form_input(['name' => 'title', 'class' => 'form-control form-control-user', 'placeholder' => 'name', 'value' => set_value('title')], '', 'required') ?>
                </div>
                <div class="col-md-6">
                    <select name="product_id" class="form-control form-control-user" required>
                        <option value="" selected>Select product</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id'] ?>">
                                <?= $product['title'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <?= form_input(['name' => 'price', 'class' => 'form-control form-control-user', 'type' => 'number', 'placeholder' => 'Price', 'value' => set_value('price')], '', 'required') ?>
                </div>
                <div class="col-md-6">
                    <?= form_input(['name' => 'weight', 'class' => 'form-control form-control-user', 'type' => 'number', 'placeholder' => 'Weight', 'value' => set_value('weight')], '') ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <?= form_input(['name' => 'material', 'class' => 'form-control form-control-user', 'placeholder' => 'Material', 'value' => set_value('material')], '', 'required') ?>

                </div>
                <div class="col-md-6">
                    <?= form_input(['name' => 'color', 'class' => 'form-control form-control-user', 'placeholder' => 'Color', 'value' => set_value('color')], '', 'required') ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <textarea name="description" class="form-control" rows="4" cols="50" placeholder="Description"></textarea>
                </div>
            </div>

            <div class="row form-group" id="imageInputs">
                <div class="input-group mb-3">
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success" onclick="addImageInput()"><i class="fa fa-plus"></i> Add Image</button>
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