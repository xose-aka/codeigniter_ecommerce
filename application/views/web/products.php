<?php $this->load->view('includes/web/header'); ?>
<?php /** @var array $products */ ?>
<div class="row">
    <?php $this->load->view('includes/web/sidebar'); ?>
    <div class="span9">
        <!--
        New Products
        -->
        <div class="well well-small">
            <h3>Our Products </h3>
            <div class="row-fluid">
                <?php $flag = 0; ?>
                <?php foreach ($products as $key => $product): ?>
                    <?php if ($key % 3 == 0): ?>
                        <?php $flag = 0 ?>
                        <ul class="thumbnails">
                    <?php endif; ?>
                        <li class="span4">
                            <div class="thumbnail">
                                <a href="" class="overlay"></a>
                                <a class="zoomTool" href="<?= base_url('products/' . strtr(base64_encode($product['id']), '+/=', '-_~')) ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                <a href="<?= base_url('products/' . strtr(base64_encode($product['id']), '+/=', '-_~')) ?>"><img src="<?= $product['path'] . $product['file_name'] ?>" alt=""></a>
                                <div class="caption cntr">
                                    <p><?= $product['title'] ?></p>
                                    <p>
                                        <strong>
                                            <?= $this->session->userdata('unit') !== '' ? ( $this->session->userdata('unit') == 'euro' ? '&euro;' . $product['price_euro'] : '$' . $product['price_dollar'] ) : '$' . $product['price_dollar'] ?>
                                        </strong>
                                    </p>
                                    <h4><a class="shopBtn" href="<?= base_url('put_cart/' . strtr(base64_encode($product['id']), '+/=', '-_~')) ?>" title="add to cart"> Add to cart </a></h4>
                                    <div class="actionList">
                                        <a class="pull-left" href="#">Add to Wish List </a>
<!--                                        <a class="pull-left" href="#"> Add to Compare </a>-->
                                    </div>
                                    <br class="clr">
                                </div>
                            </div>
                        </li>
                    <?php $flag++; ?>
                    <?php if ($flag % 3 == 0): ?>
                        </ul>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/web/footer') ?>
