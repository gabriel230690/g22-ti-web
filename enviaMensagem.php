<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16/09/16
 * Time: 19:05
 */


$remetenteNome = $_POST['name'];
$remetenteEmail = $_POST['email'];
$telefone = $_POST['telefone'];
$assunto = ' Nova mensagem no site da G22 TI ';
$mensagem = $_POST['message'];
$email_remetente = "g22ti@g22ti.com.br";

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
    echo 'Erro ao enviar formulário: ';
} else {
    echo 'Formulário enviado com sucesso!';
}
