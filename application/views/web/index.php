<?php $this->load->view('includes/web/header'); ?>
<?php
/**
 * @var array $categories
 * @var array $banners
 * @var array $last_products
 * @var array $viewed_products
 * @var array $brands
 */
?>
    <!--
    Body Section
    -->
    <main>
        <?php $this->load->view('includes/web/sidebar'); ?>
        <article>
            <div class="well np">
                <div id="myCarousel" class="carousel slide homCar">
                    <div class="carousel-inner">
                        <?php foreach ($banners as $key => $banner): ?>
                            <div class="item <?= $key == 0 ? 'active' : '' ?>">
                                <img style="width:100%" src="<?= $banner['img'] ?>" alt="bootstrap ecommerce templates">
                                <div class="carousel-caption">
                                    <h4><?= $banner['main_text'] ?></h4>
                                    <p><span><?= $banner['second_text'] ?></span></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
            <!--
            New Products
            -->
            <div class="well well-small">
                <h3>New Products </h3>
                <hr class="soften"/>
<!--                <div class="row-fluid">-->
<!--                    <div id="newProductCar" class="carousel slide">-->
<!--                        <div class="carousel-inner">-->
<!--                            --><?php //$flag = 0; ?>
<!--                            --><?php //foreach ($last_products as $key => $product): ?>
<!--                                --><?php //if ($key % 4 == 0): ?>
<!--                                    <div class="item --><?//= $key == 0 ? 'active' : '' ?><!--">-->
<!--                                        <ul class="thumbnails">-->
<!--                                    --><?php //$flag = 0 ?>
<!--                                --><?php //endif; ?>
<!--                                <li class="span3">-->
<!--                                    <div class="thumbnail">-->
<!--                                        <a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>-->
<!--                                        <a href="#" class="tag"></a>-->
<!--                                        <a href="product_details.html"><img src="assets/img/bootstrap-ring.png" alt="bootstrap-ring"></a>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                --><?php //$flag++; ?>
<!--                                --><?php //if ($flag % 4 == 0 ): ?>
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                --><?php //endif; ?>
<!--                            --><?php //endforeach; ?>
<!--                        </div>-->
<!--                        <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>-->
<!--                        <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row-fluid">-->
<!--                    <ul class="thumbnails">-->
<!--                        <li class="span4">-->
<!--                            <div class="thumbnail">-->
<!---->
<!--                                <a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>-->
<!--                                <a href="product_details.html"><img src="assets/img/b.jpg" alt=""></a>-->
<!--                                <div class="caption cntr">-->
<!--                                    <p>Manicure & Pedicure</p>-->
<!--                                    <p><strong> $22.00</strong></p>-->
<!--                                    <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>-->
<!--                                    <div class="actionList">-->
<!--                                        <a class="pull-left" href="#">Add to Wish List </a>-->
<!--                                        <a class="pull-left" href="#"> Add to Compare </a>-->
<!--                                    </div>-->
<!--                                    <br class="clr">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="span4">-->
<!--                            <div class="thumbnail">-->
<!--                                <a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>-->
<!--                                <a href="product_details.html"><img src="assets/img/c.jpg" alt=""></a>-->
<!--                                <div class="caption cntr">-->
<!--                                    <p>Manicure & Pedicure</p>-->
<!--                                    <p><strong> $22.00</strong></p>-->
<!--                                    <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>-->
<!--                                    <div class="actionList">-->
<!--                                        <a class="pull-left" href="#">Add to Wish List </a>-->
<!--                                        <a class="pull-left" href="#"> Add to Compare </a>-->
<!--                                    </div>-->
<!--                                    <br class="clr">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="span4">-->
<!--                            <div class="thumbnail">-->
<!--                                <a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>-->
<!--                                <a href="product_details.html"><img src="assets/img/a.jpg" alt=""></a>-->
<!--                                <div class="caption cntr">-->
<!--                                    <p>Manicure & Pedicure</p>-->
<!--                                    <p><strong> $22.00</strong></p>-->
<!--                                    <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>-->
<!--                                    <div class="actionList">-->
<!--                                        <a class="pull-left" href="#">Add to Wish List </a>-->
<!--                                        <a class="pull-left" href="#"> Add to Compare </a>-->
<!--                                    </div>-->
<!--                                    <br class="clr">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
            </div>
            <!--
            Featured Products
            -->
            <div class="well well-small">
                <h3><a class="btn btn-mini pull-right" href="products.html" title="View more">VIew More<span class="icon-plus"></span></a> Featured Products  </h3>
                <hr class="soften"/>
                <div class="test">
                    <?php $flag = 0 ?>
                    <?php foreach ($viewed_products as $key => $viewed_product): ?>
                        <div class="thumbnail">
                            <a class="zoomTool" href="<?= base_url('products/' . strtr(base64_encode($viewed_product['id']), '+/=', '-_~')) ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                            <a href="<?= base_url('products/' . strtr(base64_encode($viewed_product['id']), '+/=', '-_~')) ?>"><img src="<?= $viewed_product['path'] . $viewed_product['file_name'] ?>" alt=""></a>
                            <div class="caption">
                                <h5>Manicure & Pedicure</h5>
                                <h4>
                                    <a class="defaultBtn" href="<?= base_url('products/' . strtr(base64_encode($viewed_product['id']), '+/=', '-_~')) ?>" title="Click to view"><span class="icon-zoom-in"></span></a>
                                    <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
                                    <span class="pull-right"><?= $this->session->userdata('unit') !== '' ? ( $this->session->userdata('unit') == 'euro' ? '&euro;' . $viewed_product['price_euro'] : '$' . $viewed_product['price_dollar'] ) : '$' . $viewed_product['price_dollar'] ?></span>
                                </h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="well well-small">
                <a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
                Popular Products
            </div>
            <div class="well well-small">
                <a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
                Best selling Products
            </div>
        </article>
        <?php $this->load->view('includes/web/sidebar'); ?>
    </main>
    <!--
    Clients
    -->

    <section class="our_client">
        <h4 class="title cntr">
            <span class="text">Manufactures</span>
        </h4>
        <div>
            <?php foreach ($brands as $brand): ?>
                <div class="span2">
                    <a href="#"><img alt="" src="<?= $brand['image'] ?>"></a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!--
    Footer
    -->
<?php $this->load->view('includes/web/footer'); ?>