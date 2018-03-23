<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16/09/16
 * Time: 19:05
 */


/* abaixo as veriaveis principais, que devem conter em seu formulario*/

$remetenteNome = $_POST['name'];
$remetenteEmail = $_POST['email'];
$telefone = $_POST['telefone'];
$assunto = ' Nova mensagem no site da G22 TI ';
$mensagem = $_POST['message'];
$email_remetente = "contato@g22ti.com.br";

$mensagemConcatenada = '-------------------------------<br/>';
$mensagemConcatenada .= 'Nome: ' . $remetenteNome . '<br/>';
$mensagemConcatenada .= 'E-mail: ' . $remetenteEmail . '<br/>';
$mensagemConcatenada .= 'Telefone: ' . $telefone . '<br/>';
$mensagemConcatenada .= 'Assunto: ' . $assunto . '<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>';
$mensagemConcatenada .= 'Mensagem: ' . $mensagem . ' <br/>';


$email_headers = implode("\n", array("From: $email_remetente", "Reply-To: $email_remetente", "Return-Path: $email_remetente", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

$vr_flg_envio = mail("contato@g22ti.com.br", $assunto, nl2br($mensagemConcatenada), $email_headers);


if (!$vr_flg_envio) {
    echo $mensagemRetorno = 'Erro ao enviar formulário: ' . $mail->ErrorInfo;
} else {
    echo $mensagemRetorno = 'Formulário enviado com sucesso!';
}