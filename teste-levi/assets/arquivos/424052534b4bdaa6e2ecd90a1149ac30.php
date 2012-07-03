<?php

// call the lib..
require_once('recaptchalib.php');

// Get a key from http://recaptcha.net/api/getkey
$publickey = "6LcX49ASAAAAAMC6Dq-ydFAZZGvM3M0mg9kYNyKX";
$privatekey = "6LcX49ASAAAAALfhvCcEQdqp-S-Cwk1uYaoniNkO";

# was there a reCAPTCHA response?
if ($_POST["submit"]) {
    $response = recaptcha_check_answer($privatekey,
	    $_SERVER["REMOTE_ADDR"],
	    $_POST["recaptcha_challenge_field"],
	    $_POST["recaptcha_response_field"]);

        if ($response->is_valid) {
                echo "Yes, that was correct!";
        } else {
                # set the error code so that we can display it
		echo "Eh, That wasn't right. Try Again.";

        }
};

  
include_once('phpmailer_lite/class.phpmailer.php');


$nome = $_POST['nome'];
//$ddd = $_POST['ddd'];
//$telefone = $_POST['telefone'];
$dddres = $_POST['dddres'];
$telefoneres = $_POST['telefoneres'];
$dddcelular = $_POST['dddcelular'];
$telefonecelular = $_POST['telefonecelular'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];



$message = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<span style="font-family:Arial; font-size:14px;">
<table width="627" height="669" border="0" cellpadding="0" cellspacing="0" background="http://aliance.com.br/imagens/email_market.png">
  <tr>
    <td width="627" height="669"><table width="583" height="208" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img style="width: 627px; height: 188px; display: block; margin: 0; padding: 0;" src="http://www.aliance.com.br/imagens/top_email_aliance.png" alt="" width="627" height="188" /></td>
      </tr>
      <tr>
        <td width=\"583\"><table width="627" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="41"><img src="http://www.aliance.com.br/imagens/esquerda_email_aliance.png" width="40" height="161" border="0" style="width: 40px; height: 161px; display: block; margin: 0; padding: 0;" /></td>
            <td width="549" style="font-family:Arial;">Ol&aacute; <b>'.$nome.'</b>. <br />
              <br />
Obrigado por sua visita e pela oportunidade de  recebermos o seu contato. Em breve voc&ecirc; receber&aacute; no e-mail fornecido a resposta  para sua quest&atilde;o.<br />
<br />
<span style=\"color:#666;\">Observa&ccedil;&atilde;o - N&atilde;o &eacute; necess&aacute;rio responder esta mensagem.</span></td>
            <td width="37"><img src="http://www.aliance.com.br/imagens/direita_email_aliance.png" alt="" width="37" height="161" border="0" style="width: 37px; height: 161px; display: block; margin: 0; padding: 0;" /></td>
          </tr>
        </table>         
		</td>
      </tr>
      <tr>
        <td><img src="http://www.aliance.com.br/imagens/baixo_email_aliance.png" alt="" width="627" height="323" border="0" style="width: 627px; height: 323px; display: block; margin: 0; padding: 0;" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</span>
</body>
</html>';

	

$mail_resp = new PHPMailer();
$mail_resp->SetFrom("contato@aliance.com.br","Contato"); 
$mail_resp->CharSet = 'iso-8859-1';
$mail_resp->AddAddress($email);
$mail_resp->AddBcc('allan@homebrasil.com','Allan');

$mail_resp->Subject = 'Aliance';
$mail_resp->isHTML(TRUE); 

$mail_resp->MsgHTML(utf8_decode($message));
	 
$mail_resp->IsSMTP();
$mail_resp->SMTPAuth = true;
$mail_resp->Host 	= "smtp.gmail.com";
$mail_resp->Username = "contato@aliance.com.br";
$mail_resp->Password = "home2014";


$mail_resp->SMTPSecure = 'ssl';
//$mail_resp->Port = 587; 
$mail_resp->Port = 465; 
$mail_resp->Send();	 




$messagee = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<table bgcolor="#f7f7f7" width="300" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #FFF; font-family: Arial; font-size: 9px;">
  <tr>
    <td><img src="http://www.aliance.com.br/imagens/topo_email.png" width="300" height="90" border="0" style="margin:0; padding:0; height:90px; display:block;" /></td>
  </tr>
  <tr>
    <td height="72" valign="middle"><table width="297" border="0" align="center" cellpadding="3" cellspacing="3">
      <tr>
        <td width="108" align="right" valign="top"><span style="font-size:11px; font-family:Arial;">Nome:</span></td>
		<td width="168" align="left"><span style="font-size:12px; font-family:Arial;">'.$nome.'</span></td>
        </tr>
      <tr>
        <td align="right" valign="top"><span style="font-size:11px; font-family:Arial;">Telefone:</span></td>
				  <td align="left"><span style="font-size:12px; font-family:Arial;">'.$ddd.' - '.$telefone.'</span></td>
      </tr>
      <tr>
        <td align="right" valign="top"><span style="font-size:11px; font-family:Arial;"><span style="font-size:11px;">Telefone Residencial:</span></span></td>
				  <td align="left"><span style="font-size:12px; font-family:Arial;">'.$dddres.' - '.$telefoneres.'</span></td>
      </tr>
      <tr>
       <td align="right" valign="top"><span style="font-size:11px; font-family:Arial;">Telefone Celular:</span></td>
				  <td align="left"><span style="font-size:12px; font-family:Arial;">'.$dddcelular.' - '.$telefonecelular.'</span></td>
      </tr>
      <tr>
        <td align="right" valign="top"><span style="font-size:11px; font-family:Arial;">Email:</span></td>
				  <td align="left"><span style="font-size:12px; font-family:Arial;">'.$email.'</span></td>
      </tr>
    
      <tr>
        <td align="right" valign="top"><span style="font-size:11px; font-family:Arial;">Mensagem:</span></td>
				  <td align="left"><span style="font-size:12px; font-family:Arial;">'.$mensagem.'</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="298" height="12">&nbsp;</td>
  </tr>
</table>
</body>
</html>';
$mail_res = new PHPMailer();
$mail_res->SetFrom("contato@aliance.com.br","Contato"); 
$mail_res->CharSet = 'iso-8859-1';
$mail_res->AddAddress('contato@aliance.com.br');
$mail_res->AddBcc('allan@homebrasil.com','Allan');

$mail_res->Subject = 'Aliance';
$mail_res->isHTML(TRUE); 

$mail_res->MsgHTML(utf8_decode($messagee));
	 
$mail_res->IsSMTP();
$mail_res->SMTPAuth = true;
$mail_res->Host 	= "smtp.gmail.com";
$mail_res->Username = "contato@aliance.com.br";
$mail_res->Password = "home2014";


$mail_res->SMTPSecure = 'ssl';
//$mail_resp->Port = 587; 
$mail_res->Port = 465; 
$mail_res->Send();	 
echo "<script type='text/javascript'>window.location.href='contatoSucesso.php';</script>";
?>

