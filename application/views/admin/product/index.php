<?php $this->load->view('includes/admin/header'); ?>
<?php /**
 * @var array $products
 * @var array $paginate
 * @var int $limit
 */
?>
    <div class="container-fluid">
        <?php $this->load->view('includes/admin/messages'); ?>
        <h1 class="h3 mb-2 text-gray-800">Products</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Products list</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length">
                                    <a class="btn btn-success" href="<?= base_url('admin/product/create') ?>"><i class="fa fa-plus"></i> Add product</a>
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
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Discount</th>
                                        <th>Price</th>
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($products as $key => $product): ?>
                                        <tr>
                                            <td><a href="<?= base_url('admin/product/show/' . $product['id']) ?>"><?= ( ($paginate['page'] - 1) * $limit ) + $key + 1 ?></a></td>
                                            <td><?= $product['title'] ?></td>
                                            <td><?= isset($product['category']) ? $product['category'] : "no ralations" ?></td>
                                            <td><?= isset($product['brand'])    ? $product['brand'] : "no ralations" ?></td>
                                            <td><?= isset($product['discount']) ? $product['discount'] : "no discount" ?></td>
                                            <td><?= $product['price_dollar'] ?></td>
                                            <td><?= $product['color'] ?></td>
                                            <td><?= $product['quantity'] ?></td>
                                            <td><?= $product['created_at'] ?></td>
                                            <td>
                                                <a class="btn btn-danger" href="<?= base_url('admin/product/delete/' . $product['id']) ?>"><i class="fa fa-trash"> Delete</i></a>
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
                                        <li class="paginate_button page-item previous <?= $paginate['page'] > 1 ? '' : 'disabled' ?>" id="dataTable_previous">
                                            <a href="?page=<?= ( $paginate['page'] - 1 ) ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                        </li>
                                        <?php for ($i = 1; $i <= $paginate['pages']; $i++): ?>
                                            <li class="paginate_button page-item <?= $i == $paginate['page'] ? 'active' : '' ?>">
                                                <a href="?page=<?= $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>
                                        <li class="paginate_button page-item next <?= $paginate['page'] < $paginate['pages'] ? '' : 'disabled' ?>" id="dataTable_next">
                                            <a href="?page=<?= ( $paginate['page'] + 1 ) ?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
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