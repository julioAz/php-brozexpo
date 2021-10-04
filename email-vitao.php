<?php
//Variáveis

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['msg'];


// Compo E-mail
$arquivo = "
<style type='text/css'>
body {
margin:0px;
font-family:Arial;
font-size:12px;
color: #666666;
}
a{
color: #666666;
text-decoration: none;
}
a:hover {
color: #FF0000;
text-decoration: none;
}
</style>
  <html>
      <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
          <tr>
            <td>
<tr>
               <td width='500'>Nome:$nome</td>
              </tr>
              <tr>
                <td width='320'>E-mail:<b>$email</b></td>
   </tr>
    <tr>
                <td width='320'>Mensagem:<b>$mensagem</b></td>
              </tr>
          </td>
        </tr>
      </table>
  </html>
";

//enviar

  // emails para quem será enviado o formulário
  $emailenviar = "contato@brzexpo.com.br";
  $destino = $emailenviar;
  $assunto = "Contato pelo Site - Form Vitao";

  // É necessário indicar que o formato do e-mail é html
  $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nome <$email>';
  //$headers .= "Bcc: $EmailPadrao\r\n";

  $enviaremail = mail($destino, $assunto, $arquivo, $headers);
  if($enviaremail){
  $mgm = "
  <head>
  <link rel='stylesheet' href='/css/email.css'>
  <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700&display=swap' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>
  <script src='https://kit.fontawesome.com/6e789bbea8.js' crossorigin='anonymous'></script>
  </head>
  <body>
  <div class='modal' id='contatoModalSucesso' style='display:block!important;'>
  <div class='modal-dialog'>
      <div class='modal-content container p-0'>
          <div class='modal-header'>
              <a class='navbar-brand' href='/''>
                  <img src='/img/logo.png' alt='Logo'>
              </a>
              <div class='col-12 text-center'>
                  <h2>Let's work together on your next import project.</h2>
                  <div class='sucess-form'>
                      <i class='far fa-check-circle'></i>
                      <p>Registration performed successfully</p>
                  </div>
                  <a class='btn btn-primary btn-brz' href='https://brzexpo.com.br/vitao-catalogo.pdf'>Download catalogue</a>
              </div>
          </div>
      </div>
  </div>
</div>
</body>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>
<script src='https://code.jquery.com/jquery-3.6.0.min.js' integrity='sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=' crossorigin='anonymous'></script>
<script src='/js/script.js'></script>
";
echo $mgm;
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "<h2>Ocorreu um erro, <a href='/'>clique aqui</a> e tente novamente</h2>" + $mgm;
  }
?>