<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Instituto Somos Ágape - Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/login.css" rel="stylesheet">
</head>

<body class="page-contact">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center"><img src="assets/img/logo_limpa.png" alt=""></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="active">Home</a></li>
          <li><a href="index.html#why-us">Projetos</a></li>
          <li><a href="index.html#services-list">Serviços</a></li>
          <li><a href="index.html#call-to-action">Missão</a></li>
          <li><a href="index.html#team">Quem somos</a></li>
          <li><a href="index.html#recent-posts">Ações</a></li>
          <li><a href="contact.html">Contato</a></li>
          <li><a class="login btn" href="login.html">Login</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center">
      <div class="container position-relative d-flex flex-column align-items-center">



      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="login" class="login">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!-- <h1>Login</h1> -->
        </div>

        <div class="row mt-5 justify-content-center" id="corpo-form">
          <div class="col-sm-6">
            <form action="forms/processa.php" method="POST">
              <div class="d-flex justify-content-between">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                  <label class="form-check-label" for="inlineRadio1">Família</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                  <label class="form-check-label" for="inlineRadio2">Voluntário</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                  <label class="form-check-label" for="inlineRadio3">Parceiro</label>
                </div>
              </div>
              <div>
                <p></p>
              </div>
              
              <div class="row">
                <p>Usuário:</p>
                <div class="col-md-12 form-group">
                  <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" required>
                </div>
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <p></p>
                  <p>Senha:</p>
                  <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                </div>
              </div>
              <div><p></p></div>
              <div class="d-flex justify-content-between flex-fill>">
                <a href="cadastro_familia.html" class="mr-auto">Cadastre-se</a>
                <a href="#" class="ml-auto">Esqueci minha senha</a>
                <!-- <button type="submit">Avançar</button> -->
              </div>
              <div class="text-center"><button type="submit">Avançar</button></div>
            </form>
          </div>
        </div>

      </div>
    </section>
    <!-- End login Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>Instituto Somos Ágape</span>
            </a>
            <p>Ajude a propagar o Amor.</p>
            <div class="social-links d-flex  mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a target="_blank" href="https://www.instagram.com/institutosomosagape/" class="instagram"><i class="bi bi-instagram"></i></a>
              <a target="_blank" href="https://api.whatsapp.com/send?phone=554796905460" class="linkedin"><i class="bi bi-whatsapp"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Links úteis</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Sobre nós</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Serviços</a></li>
              <!-- <li><i class="bi bi-dash"></i> <a href="#">Terms of service</a></li> -->
              <li><i class="bi bi-dash"></i> <a target="_blank" href="https://drive.google.com/file/d/1CvVMq7YPQeUaAF-wxDKfb9F_fYGl2uC-/view?usp=share_link">Política de privacidade</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Mapa do site</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Preciso de ajuda</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Quero ser um voluntário</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Orientação carreira</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Empregabilidade</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Mentoria</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contato</h4>
            <p>
              Rua Veroni Pedro Graciano, 2954<br>
              Costa e Silva - 89.220-660<br>
              Joinville, SC
               <br><br>
               <strong>CNPJ:</strong> 46.190.994/0001-57<br> 
              <strong>Telefone:</strong> (47) 9 9690-5460<br>
              <strong>Email:</strong> somosagapejlle@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <!-- <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Nova</span></strong>. All Rights Reserved
        </div>
        <div class="credits"> -->
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div> -->
  <!-- </footer> -->
  <!-- End Footer --><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>