<?php 
if(isset($_POST['submit'])){
    $to = "arsenanai@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['name'];
    $subject = "Обратная связь с сайта";
    $subject2= "Спасибо за обращение";
    $message = $first_name . " " . " оставил заявку:" . "\n\n" . $_POST['message'];
    $message2 = "Спасибо за Вашу заявку, " . $first_name . ", мы ответим в ближайщее время\n\n";
    $headers = "От:" . $from;
    $headers2 = "От:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kaz National Group - Контакты</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>

    <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">Kaz National Group</div>
    <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">Казахстан, г.Астана, Г. Мустафина 15 | 8(701)9876485</div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">KNG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.html">Главная
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="about.html">О Нас</a>
            </li>
            <!--<li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="blog.html">Блог</a>
            </li>-->
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="contact.html">Контакты</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="bg-faded p-4 my-4">
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Связаться
          <strong>с нами</strong>
        </h2>
        <hr class="divider">
        <div class="row">
          <div class="col-lg-8">
            <div class="embed-responsive embed-responsive-16by9 map-container mb-4 mb-lg-0">
              <iframe src="https://yandex.kz/map-widget/v1/-/CBaWATsYlA" width="560" height="400" frameborder="0"></iframe>
            </div>
          </div>
          <div class="col-lg-4">
            <h5 class="mb-0">Телефон:</h5>
            <div class="mb-4"><a href="tel:87019876485">8 (701) 987 64 85</a><br>
              <a href="tel:87777977107">8 (777) 797 71 07</a></div>
            <h5 class="mb-0">Email:</h5>
            <div class="mb-4">
              <a href="mailto:name@example.com">info@kazng.com</a>
            </div>
            <h5 class="mb-0">Адрес:</h5>
            <div class="mb-4">
              Казахстан, г. Астана
              <br>
              Г. Мустафина 15
            </div>
          </div>
        </div>
      </div>

      <div class="bg-faded p-4 my-4">
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Оставить заявку
        </h2>
        <hr class="divider">
        <form id="submit-form">
          <div class="row">
            <div class="form-group col-lg-4">
              <label class="text-heading">Имя</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Телефон</label>
              <input type="tel" class="form-control" name="phone">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-12">
              <label class="text-heading">Сообщение</label>
              <textarea class="form-control" rows="6" name="message"></textarea>
            </div>
            <div class="form-group col-lg-12">
              <button
class="btn btn-secondary g-recaptcha"
data-sitekey="6LdNATwUAAAAAFDmU1Om0adeRcDlUB6t08Va9V-i"
data-callback="submitForm">
Отправить
</button>
            </div>
          </div>
        </form>
      </div>

    </div>
    <!-- /.container -->

    <footer class="bg-faded text-center py-5">
      <div class="container">
        <p class="m-0">Все права защищены &copy; Астана 2017</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Zoom when clicked function for Google Map -->
    <script>
      function submitForm(){
        document.getElementById("submit-form").submit();
      }
      (function() {
         
      })();
      $('.map-container').click(function () {
        $(this).find('iframe').addClass('clicked')
      }).mouseleave(function () {
        $(this).find('iframe').removeClass('clicked')
      });
    </script>

  </body>

</html>