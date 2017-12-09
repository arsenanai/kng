<?php 
  $delivery=false;
  $delivery2=false;
  $captcha=false;
  if(isset($_POST['email'])){
    $post_data = http_build_query(
        array(
            'secret' => '6LdNATwUAAAAAGDb_24wJmeAkwPzA_KJbvF7C0Ka',
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        )
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context  = stream_context_create($opts);
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    $result = json_decode($response);
    if ($result->success===true) {
      $captcha=true;
      $to = "info@kazng.com"; // this is your Email address
      $from = $_POST['email']; // this is the sender's Email address
      $first_name = $_POST['name'];
      $phone = $_POST['phone'];
      $subject = "Обратная связь с сайта";
      $subject2= "Спасибо за обращение";
      $message = $first_name . ", тел: " .$phone. ", оставил заявку:" . "\n\n" . $_POST['message'];
      $message2 = "Спасибо за Вашу заявку, " . $first_name . ", мы ответим Вам в ближайщее время\n\n";
      $headers = 'From:' . $from . "\r\n" .
      'Reply-To: ' . $to . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
      $headers2 = 'From:' . $to . "\r\n" .
      'Reply-To: ' . $from . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
      $delivery = mail($to,$subject,$message,$headers);
      $delivery2= mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=cyrillic-ext" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>

    <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">Kaz National Group</div>
    <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">Казахстан, г.Астана, Г. Мустафина 15 | 8(701)3900764</div>

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
              <a class="nav-link text-uppercase text-expanded" href="contact.php">Контакты</a>
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
            <div class="mb-4"><a href="tel:87013900764">8 (701) 390 07 64</a><br>
              <a href="tel:87777977107">8 (777) 797 71 07</a></div>
            <h5 class="mb-0">Email:</h5>
            <div class="mb-4">
              <a href="mailto:info@kazng.com">info@kazng.com</a>
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
        <form id="submit-form" method="post" action="/contact.php">
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
              <!--<button class="btn btn-secondary" type=submit>
                Отправить
              </button>-->
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Zoom when clicked function for Google Map -->
    <script>
      function submitForm(){
        document.getElementById("submit-form").submit();
      }
      (function() {
         <?php 
          if(isset($_POST['email']) && $captcha===true){
            echo 'console.log("delivery1: '.$delivery.', delivery2: '.$delivery2.', captcha: '.$captcha.'");'."\n";
            ?>
            alert("Спасибо, Ваша заявка принята!");
            <?php
          }
          if(!isset($_POST['email']) || $captcha===false){
            echo 'console.log("delivery1: '.$delivery.', delivery2: '.$delivery2.', captcha: '.$captcha.'")';
          }
        ?>  
      })();
      $('.map-container').click(function () {
        $(this).find('iframe').addClass('clicked')
      }).mouseleave(function () {
        $(this).find('iframe').removeClass('clicked')
      });
    </script>

  </body>

</html>
