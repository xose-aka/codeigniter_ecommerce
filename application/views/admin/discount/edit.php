<?php $this->load->view('includes/admin/header'); ?>
<?php /** @var array $category */ ?>
    <div class="container-fluid">
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category list</h6>
            </div>
            <div class="card-body">
                <?= form_open('admin/category/update/' . $category['id']) ?>
                <div class="row form-group">
                    <div class="col-md-6">
                        <?= form_input(['name' => 'title', 'class' => 'form-control form-control-user', 'placeholder' => 'name', 'value' => set_value('title') == '' ? $category['title'] : set_value('title') ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= form_input(['name' => 'slug', 'class' => 'form-control form-control-user', 'placeholder' => 'slug',  'value' => set_value('slug')  == '' ? $category['slug'] : set_value('slug')]) ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <?= form_submit(['class' => 'btn btn-success', 'value' => 'Update']) ?>
                        <?= form_button(['class' => 'btn btn-danger',  'content' => 'Cancel', 'data-toggle' => 'modal', 'data-target'=>"#cancelModal"]) ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/admin/footer'); ?>