<?php
    Session::flush();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>

    <link href="<?php echo URL::to('/') ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo URL::to('/') ?>/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>                                   
<div id="loading-top" style="background: #333; color: #fff; font-weight: bold; display:none; padding: 1%; text-align: center;">
<span class="texto">Verificando....</span>
<img src="<?php echo URL::to("/") ?>/html/images/ajax-loader.gif" alt="">
</div>     
<body class="login-body">

<div class="container">

    <div style="float: left; width: 100%;">                                                                            
    @if(Session::has('message'))
    <div class="alert alert-info fade in">
        <button type="button" class="close close-sm" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <div class="alert-info">{{Session::get('message')}}</div>
    </div>
    @endif
    </div>
    <div style="clear: both;"></div>


    <form class="form-signin" id="form-signin">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Login</h1>
            <img src="<?php echo URL::to('/') ?>/images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input id="user" name="user" type="text" class="form-control" placeholder="Usu&aacute;rio" autofocus>
            <input id="senha" name="senha" type="password" class="form-control" placeholder="Senha">

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                N&atilde;o tem sua conta ?
                <a class="" href="<?php echo URL::to("novo") ?>">
                    Cadastre-se
                </a>
            </div>       
            <label class="checkbox">
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Esqueceu a Senha ?</a>
                </span>
            </label>

        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Esqueceu seu Senha ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Digite seu e-mail para recuperar sua senha.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                        <button class="btn btn-primary" type="button">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

        
        
    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo URL::to('/') ?>/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo URL::to('/') ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo URL::to('/') ?>/js/bootstrap.min.js"></script>
<script src="<?php echo URL::to('/') ?>/js/modernizr.min.js"></script>
<script type="text/javascript">
$(function(){
    $("#form-signin").submit(function(event){
                    event.preventDefault();
                    var main=$("#main");
                    //scroll to top                    
                    
                    main.animate({
                        scrollTop: 0
                    }, 500);                    
                    $("body").scrollTop(0);
                    $("#loading-top").slideDown();
                    // send username and password to php check login
             
                    $.ajax({
                          type: "POST",
                          url: "UserVerificar",
                          data: { username: $("#user").val(), password: $("#senha").val() },
                          dataType: 'json'
                        })
                          .done(function(e) {   
                                if(!e.status)  {
                                          $("#loading-top").slideUp(function(){  
                                              $("img","#loading-top").hide(); 
                                              $("span","#loading-top").html("Login ou Senha Incorreto, por favor confira");                                     
                                              $("#loading-top").css("background",'#cb0e0e'); 
                                              $("#loading-top").slideDown();
                                          });
                                      
                                      setTimeout(function () { $("#loading-top").slideUp(function(){
                                          $("#loading-top").css("background",'#333333'); 
                                          $("span","#loading-top").html("Analisando....");                                                                                                                   
                                          $("img","#loading-top").show();
                                      })  }, 3000); 
                                 return false;  
                                }
                                 setTimeout(function () { $("span","#loading-top").text("Ok, conta encontrada ...") }, 500);
                                 setTimeout(function () { $("span","#loading-top").text("Redirecionado para sua conta...")  }, 2500);
                                 setTimeout( "window.location.href='usuarios'", 3100 );    
                          });
            });
});
</script>
</body>
</html>
