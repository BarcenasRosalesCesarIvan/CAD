

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="bvSM65WMAcGopMXHy6T565GqasyxUVWB7wonMdul">

    <title>CETECH - Sistema de Información Escolar</title>
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/style_login.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/app.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/autocompleter.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/jqueryui-editable/css/jqueryui-editable.css">
    <link rel="stylesheet" href="https://cetech.sjuanrio.tecnm.mx/css/checkbox_off.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- chosen -->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">

</head>

<body class="body_login" id="body_login">

    <div class="content">

           
<section class="vh-100" style="background-color: #1B396A;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/logo_login_tecnm.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="{{ route ('login') }}">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="img/220034_login.png" width="90%" class="img-responsive" style="margin:0 auto;"/>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Plataforma CAD ITSJR Inicia sesión</h5>

                  <div class="form-outline mb-4">

                        <input id="email" type="email" class="form-control "
                            name="email" value="" required autocomplete="email" autofocus>
                        <label for="email" class="form-label">Correo electrónico</label>
                        
                  </div>

                  <div class="form-outline mb-4">
                        <input id="password" type="password" class="form-control "
                            name="password" required autocomplete="current-password">
                        <label for="password" class="text-md-rightform-label ">Contraseña</label>
                       
                        
                  </div>

                  <div class="pt-1 mb-4">
                        <button type="submit" class="btn btn-dark btn-lg btn-block">
                                Entrar
                        </button>
                  </div>

                  
                                            <a class="small text-muted" href="https://cetech.sjuanrio.tecnm.mx/password/reset">
                            ¿Olvidó su contraseña?
                        </a>
                    
                    <a href="#!" class="small text-muted">Terms of use. 220034</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
    document.getElementById("body_login").style.backgroundColor = "#1B396A";
</script>


    </div>

    <!-- REQUIRED SCRIPTS -->
    <script src="https://cetech.sjuanrio.tecnm.mx/js/app.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/js/bootstrap3-typeahead.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/jqueryui-editable/js/jqueryui-editable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.js"></script>
    <script src="https://cetech.sjuanrio.tecnm.mx/js/checkbox_off.js"></script>
        <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0MEY0YXK6T"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-0MEY0YXK6T');
    </script>
</body>

</html>
