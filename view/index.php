<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front page</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <div class="wrapper">
        
        <!-- HEADER -->
        <?php
            require_once __DIR__ . '/header.php';
        ?>

        <section class="blog-post-area">
            <div class="container">
                <div class="row">
                    <div class="blog-post-area-style">
			        	<div class="col-md-12 p-b-20">
			        		<h2>Confira os posts mais recentes do blog</h2>
			        	</div>

                        <?php foreach ($posts as $post) { ?>

                            <div class="col-md-12">
                                <div class="single-post-big">
                                    <div class="big-image">
                                        <img src="img/post-image1.jpg" alt="">
                                    </div>
                                    <div class="big-text">
                                        <h3><a href="#"><?= $post['title'] ?></a></h3>
                                        <?= $post['description'] ?>
                                        <h4>
                                            <span class="date">25 February 2017</span>
                                            <span class="author">Posted By:</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        <?php }?>
                    </div>
            </div>
            <div class="pegination">

                <div class="nav-links">
                    <span class="page-numbers current">1</span>
                    <a class="page-numbers" href="#">2</a>
                    <a class="page-numbers" href="#">3</a>
                    <a class="page-numbers" href="#">4</a>
                    <a class="page-numbers" href="#">5</a>
                    <a class="page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
        
        <!-- FOOTER -->
        <?php
            require_once __DIR__ . '/footer.html';
        ?>


    </div>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/active.js"></script>
</body>

</html>