<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="<?php echo URL::to('/') ?>/#" type="image/png">

  <title>404 Page</title>

  <link href="<?php echo URL::to('/') ?>/css/style.css" rel="stylesheet">
  <link href="<?php echo URL::to('/') ?>/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<?php echo URL::to('/') ?>/js/html5shiv.js"></script>
  <script src="<?php echo URL::to('/') ?>/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="error-page">

<section>
    <div class="container ">

        <section class="error-wrapper text-center">
            <h1><img alt="" src="<?php echo URL::to('/') ?>/images/404-error.png"></h1>
            <h2>Pagina N&atilde;o Encontrada</h2>
            <h3>Desculpe, nos n&atilde;o conseguimos encontrar esta pagina.</h3>
            <a class="back-btn" href="<?php echo URL::to('/') ?>">Voltar para Home</a>
        </section>

    </div>
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo URL::to('/') ?>/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo URL::to('/') ?>/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo URL::to('/') ?>/js/bootstrap.min.js"></script>
<script src="<?php echo URL::to('/') ?>/js/modernizr.min.js"></script>


<!--common scripts for all pages-->
<!--<script src="<?php echo URL::to('/') ?>/js/scripts.js"></script>-->

</body>
</html>
