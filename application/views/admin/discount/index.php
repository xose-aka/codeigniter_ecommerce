<?php $this->load->view('includes/admin/header'); ?>
<?php /** @var array $discounts */ ?>
<div class="container-fluid">
    <?php $this->load->view('includes/admin/messages'); ?>
    <h1 class="h3 mb-2 text-gray-800">Discounts</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Discount list</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <a class="btn btn-success" href="<?= base_url('admin/discount/create') ?>"><i class="fa fa-plus"></i> Add discount</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Percent</th>
                                        <th>Image</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($discounts as $key => $discount): ?>
                                        <tr>
                                            <td><a href="<?= base_url('admin/discount/show/' . $discount['id']) ?>"><?= $key + 1 ?></a></td>
                                            <td><?= $discount['title'] ?></td>
                                            <td><?= $discount['percent'] ?></td>
                                            <td><img src="<?= $discount['image'] ?>" alt="<?= $discount['title'] ?>"></td>
                                            <td><?= $discount['created_at'] ?></td>
                                            <td>
                                                <a class="btn btn-danger" href="<?= base_url('admin/brand/delete/' . $discount['id']) ?>"><i class="fa fa-trash"> Delete</i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                    </li><li class="paginate_button page-item active">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                    </li>
                                    <li class="paginate_button page-item next" id="dataTable_next">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/admin/footer'); ?>