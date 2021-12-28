<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front page</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
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

    <div class="container">
      <div class="row">

        <div class="col-md-12 p-b-20">
          <h2>Minha conta</h2>
        </div>

        <div class="col-md-6 p-b-20">
          <a class="btn btn-primary" href="/criar-post">Criar post</a>
        </div>
        <div class="col-md-6 p-b-20">
          <a class="btn btn-warning float-right" href="">Sair da minha conta</a>
        </div>

        <div class="col-md-12">
          <form action="update" method="post">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" name="name" class="form-control" id="name" value="<?= $user['name'] ?>" aria-describedby="emailHelp" placeholder="Seu nome">
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Sua senha (vazio para não alterar)">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

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