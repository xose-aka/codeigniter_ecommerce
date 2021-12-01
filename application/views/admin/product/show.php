<?php $this->load->view('includes/admin/header'); ?>
<?php /**
 * @var array $product
 * @var array $images
 */ ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Product</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" id="title" type="text" value="<?= $product['title'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input class="form-control" id="category" type="text" value="<?= $product['category_title'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="style">Style</label>
                            <input class="form-control" id="style" type="text" value="<?= $product['style'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input class="form-control" id="brand" type="text" value="<?= $product['bran_title'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input class="form-control" id="color" type="text" value="<?= $product['color'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input class="form-control" id="quantity" type="text" value="<?= $product['quantity'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input class="form-control" id="discount" type="text" value="<?= empty($product['product_discount']) ? 'No discount' : $product['product_discount'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input class="form-control" id="weight" type="text" value="<?= $product['weight'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Created_at</label>
                            <input class="form-control" id="created_at" type="text" value="<?= $product['created_at'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input class="form-control" id="price" type="text" value="$<?= $product['price_dollar'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="material">Material</label>
                            <input class="form-control" id="material" type="text" value="<?= $product['material'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Updated</label>
                            <input class="form-control" id="updated_at" type="text" value="<?= $product['updated_at'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" cols="30" rows="10" disabled><?= $product['description'] ?></textarea>
                        </div>
                    </div>
                    <?php foreach ($images as $image): ?>
                        <div class="col-md-3">
                            <img src="<?= $image['path'] . $image['title'] ?>" alt="<?= $image['title'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-success" href="<?= base_url('/admin/product/edit/' . $product['id']) ?>">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/admin/footer'); ?>