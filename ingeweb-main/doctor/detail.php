<?php
session_start();

$content = ' <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="img/test.png" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder">Join us !</h1>
                        <div class="fs-5 mb-5">
                            <!--span class="text-decoration-line-through">$45.00</span-->
                            <span>Duration : 25 minutes </span>
                        </div>
                        <p class="lead">Give us some money please</p>
                        <div class="d-flex">
                            <!--input class="form-control text-center me-3" id="inputQuantity" type="hidden" value="" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Take the Quizz
                            </button-->
                            <a class="btn btn-success py-2 px-4 d-none d-lg-block" href="#">
                                Take the Quizz
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>';

        include('../master.php');
        ?>