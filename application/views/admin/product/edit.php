<?php $this->load->view('includes/admin/header'); ?>
<?php
/**
 * @var array $categories
 * @var array $brands
 * @var array $product
 * @var array $discounts
 */

    $recommended_options = ['No', 'Yes'];
    $publish_options = [
            "public"   =>'Publish',
            "upcoming" =>'Upcoming',
            "hidden"   =>'Not publish yet'
    ];

?>
    <div class="container-fluid">
        <?php $this->load->view('includes/admin/messages'); ?>
        <h1 class="h3 mb-2 text-gray-800">Product</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
            </div>
            <div class="card-body">
                <?= form_open_multipart('admin/product/update/' . $product['id']) ?>
                <div class="form-row">
                    <div class="col-md-4 form-group required">
                        <?= form_label('Title', 'title', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'title', 'id' => 'title', 'class' => 'form-control form-control-user', 'placeholder' => 'name', 'maxlength' => 100], ( set_value('title') == '' ? $product['title'] : set_value('title') ), 'required') ?>
                    </div>
                    <div class="col-md-4 form-group required">
                        <label for="category_id" class="control-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control form-control-user" required>
                            <option value="" selected>Select category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>" <?= $category['id'] == $product['category_id'] ? 'selected' : '' ?>>
                                    <?= $category['title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group required">
                        <label for="brand_id" class="control-label">Brand</label>
                        <select name="brand_id" id="brand_id" class="form-control form-control-user" required>
                            <option value="" selected>Select brand</option>
                            <?php foreach ($brands as $brand): ?>
                                <option value="<?= $brand['id'] ?>" <?= $brand['id'] == $product['brand_id'] ? 'selected' : '' ?>>
                                    <?= $brand['title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 form-group required">
                        <?= form_label('Style', 'style', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'style', 'id' => 'style', 'class' => 'form-control form-control-user', 'placeholder' => 'Style', 'maxlength' => 20], set_value('style')  == '' ? $product['style'] : set_value('style'), 'required') ?>
                    </div>
                    <div class="col-md-4 form-group required">
                        <?= form_label('Price Euro', 'price_euro', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'price_euro', 'id' => 'price_euro', 'class' => 'form-control form-control-user', 'type' => 'number', 'placeholder' => 'Price Euro', 'maxlength' => 5],set_value('price_euro')  == '' ? $product['price_euro'] : set_value('price_euro'), 'required') ?>
                    </div>
                    <div class="col-md-4 form-group required">
                        <?= form_label('Price Dollar', 'price_dollar', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'price_dollar', 'id' => 'price_dollar', 'class' => 'form-control form-control-user', 'type' => 'number', 'placeholder' => 'Price Euro', 'maxlength' => 5], set_value('price_dollar')  == '' ? $product['price_dollar'] : set_value('price_dollar'), 'required') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 form-group required">
                        <?= form_label('Weight', 'weight', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'weight', 'id' => 'weight', 'class' => 'form-control form-control-user', 'type' => 'number', 'placeholder' => 'Weight', 'maxlength' => 10], set_value('weight') == '' ? $product['weight'] : set_value('weight'), 'required') ?>
                    </div>
                    <div class="col-md-4 form-group required">
                        <?= form_label('Material', 'material', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'material', 'id' => 'material', 'class' => 'form-control form-control-user', 'placeholder' => 'Material', 'maxlength' => 200], set_value('material') == '' ? $product['material'] : set_value('material'), 'required') ?>
                    </div>
                    <div class="col-md-4 form-group required">
                        <?= form_label('Color', 'color', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'color', 'id' => 'color', 'class' => 'form-control form-control-user', 'placeholder' => 'Color', 'maxlength' => 20], set_value('color') == '' ? $product['color'] : set_value('color'), 'required') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 form-group required">
                        <?= form_label('Quantity', 'quantity', ['class' => 'control-label']) ?>
                        <?= form_input(['name' => 'quantity', 'id' => 'quantity', 'class' => 'form-control form-control-user', 'placeholder' => 'Quantity', 'type' => 'number', 'maxlength' => 10], set_value('quantity') == '' ? $product['quantity'] : set_value('quantity'), 'required') ?>
                    </div>
                    <div class="col-md-4 form-group required">
                        <label for="recommended" class="control-label">Recommended ?</label>
                        <select name="recommended" id="recommended" class="form-control form-control-user" required>
                            <option value="" selected>Choose</option>
                            <?php foreach ($recommended_options as $key => $option): ?>
                                <option value="<?= $key ?>" <?= $key == $product['recommended'] ? 'selected' : '' ?>><?= $option ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group required">
                        <label for="status" class="control-label">Publish ?</label>
                        <select name="status" id="status" class="form-control form-control-user" required>
                            <option value="" selected>Choose publish status</option>
                            <?php foreach ($publish_options as $key => $option): ?>
                                <option value="<?= $key ?>" <?= $key == $product['status'] ? 'selected' : '' ?>><?= $option ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 form-group">
                        <label for="discount_id" class="control-label">Discounts</label>
                        <select name="discount_id" id="discount_id" class="form-control form-control-user">
                            <option value="" selected>Select discount</option>
                            <option value="" selected>No discount</option>
                            <?php foreach ($discounts as $discount): ?>
                                <option value="<?= $discount['id'] ?>" <?= $discount['id'] == $product['discount_id'] ? 'selected' : '' ?>>
                                    <?= $discount['title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group required">
                        <label for="description" class="control-label">Describe</label>
                        <textarea name="description" id="description" class="form-control" rows="4" cols="50" placeholder="Description"><?= $product['description'] ?></textarea>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-4" id="imageInputs">
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" name="images[]" id="image" class="form-control" multiple>
                        </div>
                    </div>
                </div>
                <div class="form-row form-group">
                    <div class="col-md-8">
                        <button type="button" class="btn btn-primary" onclick="addImageInput()"><i class="fa fa-plus"></i> Add Image</button>
                    </div>
                    <div class="col-md-4">
                        <?= form_submit(['class' => 'btn btn-success', 'value' => 'Update']) ?>
                        <?= form_button(['class' => 'btn btn-danger',  'content' => 'Cancel', 'data-toggle' => 'modal', 'data-target'=>"#cancelModal"]) ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/admin/footer'); ?>