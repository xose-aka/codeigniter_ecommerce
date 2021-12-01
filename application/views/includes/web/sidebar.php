<?php
/**
 * @var array $categories
 * @var array $upcoming_products
 * @var int $sum_of_price_euro
 * @var int $sum_of_price_dollar
 */
?>
<aside>
    <div class="well well-small">
        <ul class="nav nav-list">
            <?php foreach ( $categories as $category ): ?>
                <li>
                    <a href="<?= base_url('category/' . $category['id']) ?>">
                        <span class="icon-chevron-right"></span><?= $category['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <li style="border:0"> &nbsp;</li>
            <li> <a class="totalInCart" href="<?= base_url('cart') ?>">
                    <strong>Total Amount  <span class="badge badge-warning pull-right" style="line-height:18px;"><?= $this->session->userdata('unit') !== '' ? ( $this->session->userdata('unit') == 'euro' ? '&euro; ' . $sum_of_price_euro : '$ ' . $sum_of_price_dollar ) : '$ ' . $sum_of_price_dollar ?></span></strong></a></li>
        </ul>
    </div>

    <div class="well well-small alert alert-warning cntr">
        <h2>50% Discount</h2>
        <p>
            only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
        </p>
    </div>
    <div class="well well-small" ><a href="#"><img src="/assets/images/paypal.jpg" alt="payment method paypal"></a></div>

    <div>
        <a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a>
        <br>
        <br>
        <ul class="nav nav-list promowrapper">
            <?php foreach ( $upcoming_products as $product ): ?>
                <li style="border:0"> &nbsp;</li>
                <li>
                    <div class="thumbnail">
                        <a class="zoomTool" href="<?= base_url('products/' . strtr(base64_encode($product['id']), '+/=', '-_~')) ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                        <img src="<?= $product['path'] . $product['file_name'] ?>" alt="bootstrap ecommerce templates">
                        <div class="caption">
                            <h4>
                                <a class="defaultBtn" href="<?= base_url('products/' . strtr(base64_encode($product['id']), '+/=', '-_~')) ?>">
                                    VIEW
                                </a>
                                <span class="pull-right"><?= $this->session->userdata('unit') !== '' ? ( $this->session->userdata('unit') == 'euro' ? '&euro;' . $product['price_euro'] : '$' . $product['price_dollar'] ) : '$' . $product['price_dollar'] ?></span>
                            </h4>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>