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
$telefone = $_POST['telefone'];
$assunto = ' Nova mensagem no site da G22 TI ';
$mensagem = $_POST['message'];

$mensagemConcatenada = '-------------------------------<br/>';
$mensagemConcatenada .= 'Nome: ' . $remetenteNome . '<br/>';
$mensagemConcatenada .= 'E-mail: ' . $remetenteEmail . '<br/>';
$mensagemConcatenada .= 'Telefone: ' . $telefone . '<br/>';
$mensagemConcatenada .= 'Assunto: ' . $assunto . '<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>';
$mensagemConcatenada .= 'Mensagem: ' . $mensagem . ' <br/>';


$vr_flg_envio = mail("contato@g22ti.com.br", $assunto, nl2br($mensagemConcatenada), "");


if (!$vr_flg_envio) {
    $mensagemRetorno = 'Erro ao enviar formulário: ' . $mail->ErrorInfo;
} else {
    $mensagemRetorno = 'Formulário enviado com sucesso!';
}