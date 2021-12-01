<?php $this->load->view('includes/admin/header'); ?>
<?php /** @var array $discount */ ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Discount</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Discount <?= $discount['title'] ?></h6>
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-6">
                        <p>Title: <?= $discount['title'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <p>Slug: <?= $discount['percent'] ?></p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <a class="btn btn-success" href="<?= base_url('/admin/discount/' . $discount['id'] . '/edit') ?>">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/admin/footer'); ?>