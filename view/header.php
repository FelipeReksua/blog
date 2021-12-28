<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                    <h2><a href="/">Classic</a></h2>
                </div>
            </div>
            <div class="col-md-10">
                <div class="menu">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="#">lifestyle</a></li>
                        <li><a href="#">Food</a></li>
                        
                        <li><a href="#">Nature</a></li>

                        <?php if($user) : ?>
                            <li><a id="my-account" href="/minha-conta">Minha conta</a></li>
                        <?php else : ?>
                            <li><a id="my-account" href="/login">Minha conta</a></li>
                        <?php endif; ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>