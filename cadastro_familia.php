<?php
session_start();
include 'forms/db_connect.php';
include 'forms/functions.php';

if (!isset($userData)) {
  $userData = [];
}

// Verifica se o usuário está logado e tem um ID
if(isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM cadastro_familia WHERE id_usuario = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0){
      $userData = $result->fetch_assoc();
  } else {
      $_SESSION['error_message'] = "Atualize seu cadastro!";
  }

  $stmt->close();
} else {
  $_SESSION['error_message'] = "Usuário não logado.";
  header('Location: ../login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Instituto Somos Ágape - Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon/favicon-32x32.png" rel="icon">
  <link href="assets/img/favicon/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="assets/css/cadastro_familia.css" rel="stylesheet">
</head>

<body class="page-contact">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
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
          <li><a class="login btn" href="login.php">Login</a></li>
        </ul>
      </nav>

    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center">
      <div class="container position-relative d-flex flex-column align-items-center">
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Form Section ======= -->
    <section id="login" class="login">
      <div class="container" data-aos="fade-up">
          <h2 class="mt-3">Ficha Cadastral</h2>
          <?php    
          if (isset($_SESSION['error_message'])) {
              echo '<div class="alert alert-warning alert-dismissible fade show text-center mt-3 mx-auto col-xl-6 col-lg-6 col-md-6 col-sm-10" role="alert">'
                  . $_SESSION['error_message'] .
                  '</div>';
              unset($_SESSION['error_message']);
          }
          if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success alert-dismissible fade show text-center mt-3 mx-auto col-xl-6 col-lg-6 col-md-6 col-sm-10" role="alert">'
                . $_SESSION['success_message'] .
                '</div>';
            unset($_SESSION['success_message']);
          }
          ?>
          <hr>
          <!-- Seção de Identificação -->
          <h3>Identificação</h3>
          <form class="row mt-5 d-flex justify-content-between flex-fill container mt-5 form-container mx-auto" method="POST" action="forms/ficha_cadastral_familia.php">
          <div class="container mt-3">
            <!-- <form> -->
              <!-- Linha 1: Nome, CPF, Data de Nascimento -->
              <div class="row mb-3">
                <div class="col-md-3 col-sm-6 mt-2">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo getFieldValue('nome', $userData); ?>">
                </div>
                <div class="col-md-3 col-sm-6 mt-2">
                    <input type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="11" value="<?php echo getFieldValue('cpf', $userData); ?>">
                </div>
                <div class="col-md-2 col-sm-6 mt-2 text-center">
                    <span>Data de nascimento:</span>
                </div>
                <div class="col-md-4 col-sm-6 mt-2">
                  <input type="date" name="nascimento" class="form-control" value="<?php echo getFieldValue('nascimento', $userData); ?>">
              </div>
              </div>

              <!-- Linha 2: Naturalidade, Filiação, Etnia -->
              <div class="row mb-3 mt-2">
                <div class="col-md-4 col-sm-6">
                    <input type="text" name="naturalidade" class="form-control" placeholder="Naturalidade" value="<?php echo getFieldValue('naturalidade', $userData); ?>">
                </div>
                <div class="col-md-4 col-sm-6">
                    <input type="text" name="filiacao" class="form-control" placeholder="Filiação" value="<?php echo getFieldValue('filiacao', $userData); ?>">
                </div>
                <div class="col-md-4 col-sm-12 mt-2">
                  <select class="form-select" name="etnia">
                      <option selected disabled>Etnia</option>
                      <option value="branco" <?php echo isSelected($userData['etnia'], 'branco'); ?>>Branco</option>
                      <option value="preta" <?php echo isSelected($userData['etnia'], 'preta'); ?>>Preta</option>
                      <option value="parda" <?php echo isSelected($userData['etnia'], 'parda'); ?>>Parda</option>
                      <option value="indigena" <?php echo isSelected($userData['etnia'], 'indigena'); ?>>Indígena</option>
                      <option value="outro" <?php echo isSelected($userData['etnia'], 'outro'); ?>>Outro</option>
                  </select>
                </div>
              </div>

    
              <!-- Linha 3: Renda Familiar, Estado Civil -->
              <div class="row mb-3 mt-2">
                  <div class="col">
                      <input type="text" name="renda" class="form-control" placeholder="Renda Familiar">
                  </div>
                  <div class="col ">
                      <select class="form-select" name="estado_civil">
                          <option selected disabled>Estado Civil</option>
                          <option name="estado_civil" value="casado">Casado(a)</option>
                          <option name="estado_civil" value="uniao_estavel">União Estável</option>
                          <option name="estado_civil" value="solteiro">Solteiro(a)</option>
                          <option name="estado_civil" value="viuvo">Viúvo(a)</option>
                          <option name="estado_civil" value="divorciado">Divorciado(a)</option>
                          <option name="estado_civil" value="outro">Outro</option>
                      </select>
                  </div>
              </div>
    
              <!-- Linha 4: Trabalhando? -->
              <div class="mb-3 mt-2">
                <label class="form-label">Você está trabalhando?</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="situacao_emprego" id="trabalhandoSim" value="sim">
                    <label class="form-check-label" for="trabalhandoSim">Sim</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="situacao_emprego" id="trabalhandoNao" value="nao">
                    <label class="form-check-label" for="trabalhandoNao">Não</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="situacao_emprego" id="trabalhandoAposentado" value="aposentado">
                    <label class="form-check-label" for="trabalhandoAposentado">Aposentado(a)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="situacao_emprego" id="trabalhandoInvalidez" value="invalidez">
                    <label class="form-check-label" for="trabalhandoInvalidez">Invalidez</label>
                </div>
            </div>
              
    
            <!-- Linha 5: Telefone 1, Telefone 2, E-mail -->
            <div class="row mb-3">
                <div class="col">
                    <input type="tel" name="telefone1" class="form-control" placeholder="Telefone 1">
                </div>
                <div class="col">
                    <input type="tel" name="telefone2" class="form-control" placeholder="Telefone 2">
                </div>
                <div class="col">
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
            </div>
            <hr class="mt-5">
            <h3>Moradia</h3>
            <div class="container mt-3">
              <!-- <form> -->
              <!-- Linha 1: Nome, CPF, Data de Nascimento -->
              <div class="row mb-3">
                <div class="col-md-6 col-sm-6 mt-2">
                    <input type="text"name="endereco" class="form-control" placeholder="Endereço">
                </div>
                <div class="col-md-4 col-sm-4 mt-2">
                    <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                </div>
                <div class="col-md-2 col-sm-2 mt-2">
                  <input type="number" name="num_comodos" class="form-control" placeholder="Número de cômodos">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4 col-sm-4 mt-2">
                  <select class="form-select" name="internet">
                      <option selected disabled>Acesso a internet?</option>
                      <option name="internet" value="sim">Sim</option>
                      <option name="internet" value="nao">Não</option>
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 mt-2">
                  <select class="form-select" name="celular">
                      <option selected disabled>Possui celular?</option>
                      <option name="celular" value="sim">Sim</option>
                      <option name="celular" value="nao">Não</option>
                  </select>
                </div>
                <div class="col-md-4 col-sm-4 mt-2">
                  <select class="form-select" name="moradia">
                      <option selected disabled>Moradia</option>
                      <option name="moradia" value="propria">Própria</option>
                      <option name="moradia" value="financiada">Financiada</option>
                      <option name="moradia" value="alugada">Alugada</option>
                      <option name="moradia" value="cedido">Cedido</option>
                      <option name="moradia" value="invasão">Invasão</option>
                      <option name="moradia" value="outros">Outros</option>
                  </select>
                </div>
                <div class="col-md-12 col-sm-12 mt-2">
                  <p class="form-check form-check-inline">Dispõe de:</p>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="features" id="banheiro" value="banheiro">
                    <label class="form-check-label" for="banheiro">Banheiro</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="features" id="eletricidade" value="eletricidade">
                    <label class="form-check-label" for="eletricidade">Luz elétrica</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="features" id="agua" value="agua">
                    <label class="form-check-label" for="agua">Água encanada</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="features" id="esgoto" value="esgoto">
                    <label class="form-check-label" for="esgoto">Esgoto</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="features" id="freezer" value="freezer">
                    <label class="form-check-label" for="freezer">Freezer</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="features" id="geladeira" value="geladeira">
                    <label class="form-check-label" for="geladeira">Geladeira</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="features" id="computador" value="computador">
                    <label class="form-check-label" for="computador">Computador</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="features" id="carro" value="carro">
                    <label class="form-check-label" for="carro">Carro</label>
                  </div>

              </div>
              <hr class="mt-5">
              <h3 class="mt-3">Saúde e benefícios sociais</h3>
              <div class="container mt-3">
                <div class="row mb-3">
                  <div class="col-md-12 col-sm-12 mt-2">
                    <p class="form-check form-check-inline">Benefício social:</p>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="beneficio" id="bolsa_familia" value="bolsa_familia">
                      <label class="form-check-label" for="bolsa_familia">Bolsa Família</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="beneficio" id="mcmv" value="mcmv">
                      <label class="form-check-label" for="mcmv">MCMV / Casa Verde e Amarela</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="beneficio" id="cva" value="cva">
                      <label class="form-check-label" for="cva">Casa Verde e Amarela</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="beneficio" id="aux_emergencial" value="aux_emergencial">
                      <label class="form-check-label" for="aux_emergencial">Auxílio emergencial</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="beneficio" id="outro" value="outro">
                      <label class="form-check-label" for="outro">Outros:</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <!-- <div class="col-md-4 col-sm-4 mt-2"> -->
                        <input type="text" class="form-control" name="beneficio" id="outro_texto" placeholder="Escreva aqui">
                    <!-- </div>   -->
                    </div> 
                    <div class="row mb-3">
                      <div class="col-md-4 col-sm-4 mt-2">
                        <label for="">Faz tratamento de saúde?</label>
                        <select class="form-select" name="tratamento">
                            <option selected disabled>---</option>
                            <option name="tratamento" value="nao">Não</option>
                            <option name="tratamento" value="sim">Sim</option>
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 mt-2">
                        <label for="">Qual tratamento?</label>
                        <input type="text" class="form-control" name="qual_tratamento" id="qual_tratamento">
                      </div>
                      <div class="col-md-4 col-sm-4 mt-2">
                        <label for="">Fornecido pelo SUS?</label>
                        <select class="form-select" name="forn_sus_tratamento">
                            <option selected disabled>---</option>
                            <option name="forn_sus_tratamento" value="nao">Não</option>
                            <option name="forn_sus_tratamento" value="sim">Sim</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4 col-sm-4 mt-2">
                        <label for="">Medicamento controlado?</label>
                        <select class="form-select" name="medicamento">
                            <option selected disabled>---</option>
                            <option name="medicamento" value="nao">Não</option>
                            <option name="medicamento" value="sim">Sim</option>
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-4 mt-2">
                        <label for="">Qual medicamento?</label>
                        <input type="text" class="form-control" name="qual_medicamento" id="qual_medicamento">
                      </div>
                      <div class="col-md-4 col-sm-4 mt-2">
                        <label for="">Fornecido pelo SUS?</label>
                        <select class="form-select" name="forn_sus_medicamento">
                            <option selected disabled>---</option>
                            <option name="forn_sus_medicamento" value="nao">Não</option>
                            <option name="forn_sus_medicamento" value="sim">Sim</option>
                        </select>
                      </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
            <!-- Botão de envio -->
            <button type="submit" name="submit" class="btn btn-primary">Salvar</button>
            <!-- </form> -->
        </div>
      </form>
      </div>
    </section>
    <!-- End form Section -->
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