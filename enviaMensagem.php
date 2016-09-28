<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16/09/16
 * Time: 19:05
 */


/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/

$enviaFormularioParaNome = 'Gabriel';
$enviaFormularioParaEmail = 'contato@g22ti.com.br';

$caixaPostalServidorNome = 'WebSite';
$caixaPostalServidorEmail = 'contato@g22ti.com.br';
$caixaPostalServidorSenha = 'chacabuco02';


/* abaixo as veriaveis principais, que devem conter em seu formulario*/

$remetenteNome = $_POST['name'];
$remetenteEmail = $_POST['email'];
$assunto = ' Nova mensagem no site da G22 TI ';
$mensagem = $_POST['message'];

$mensagemConcatenada  = '-------------------------------<br/>';
$mensagemConcatenada .= 'Nome: ' . $remetenteNome . '<br/>';
$mensagemConcatenada .= 'E-mail: ' . $remetenteEmail . '<br/>';
$mensagemConcatenada .= 'Assunto: ' . $assunto . '<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>';
$mensagemConcatenada .= 'Mensagem: ' . $mensagem . ' <br/>';


/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

require_once('PHPMailer-master/PHPMailerAutoload.php');

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Charset = 'utf8_decode()';
$mail->Host = 'smtp.' . substr(strstr($caixaPostalServidorEmail, '@'), 1);
$mail->Port = '587';
$mail->Username = $caixaPostalServidorEmail;
$mail->Password = $caixaPostalServidorSenha;
$mail->From = $caixaPostalServidorEmail;
$mail->FromName = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject = utf8_decode($assunto);
$mail->Body = utf8_decode($mensagemConcatenada);


$mail->AddAddress($enviaFormularioParaEmail, utf8_decode($enviaFormularioParaNome));

if (!$mail->Send()) {
    $mensagemRetorno = 'Erro ao enviar formulário: ' . $mail->ErrorInfo;
} else {
    $mensagemRetorno = 'Formulário enviado com sucesso!';
}