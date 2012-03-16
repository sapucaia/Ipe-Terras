<?php
session_start();
header("Content-type: text/html; charset=UTF-8");
/*
Criado por Jefrey Sobreira Santos
js@netpoint.eu.tc
www.js.website.org
*/
function back($msg) {
  echo '<script> alert("'.$msg.'"); history.go(-1); </script>';
  exit;
}
include("config.php");

$form_data['nome'] = htmlspecialchars(substr($_POST['nome'], 0, 255));
$form_data['email'] = htmlspecialchars(substr($_POST['email'], 0, 255));
$form_data['telefone'] = htmlspecialchars(substr($_POST['telefone'], 0, 255));
$form_data['assunto'] = htmlspecialchars(substr($_POST['assunto'], 0, 255));
$form_data['captcha'] = md5(strtoupper($_POST['captcha']));
$form_data['mensagem'] = htmlspecialchars(substr($_POST['mensagem'], 0, 50000));
$ip = $_SERVER['REMOTE_ADDR'];
$momento = date("d/m/Y H:i:s");

if(!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)){
  back("Digite um e-mail válido!");
}

if($form_data['nome']=='' OR $form_data['telefone']=='' OR $form_data['mensagem']=='') {
  back("Preencha todos os campos.");
}

if($form_data['assunto']=='') {
  $form_data['assunto'] = "(Sem assunto) (do site)";
} else {
  $form_data['assunto'] .= " (do site)";
}

if($form_data['captcha']!=$_SESSION['random_txt']) {
  back("O campo de verificação humana está incorreto.");
}

$headers = "From: {$form_data['nome']}<{$form_data['email']}>" . "\r\n" . 
                 "Content-type: text/plain; charset=utf-8" . "\r\n" . 
                 "X-Mailer: PHP/" . phpversion(); 

$auto_headers = "From: {$config['nome_site']}<{$config['email']}>" . "\r\n" . 
                 "Content-type: text/plain; charset=utf-8" . "\r\n" . 
                 "X-Mailer: PHP/" . phpversion(); 

$msg = '
        Nome: '.$form_data['nome'].' (IP: '.$ip.')
        E-mail: '.$form_data['email'].'
        Telefone: '.$form_data['telefone'].'
        Data: '.$momento.'
        Mensagem:
        '.$form_data['mensagem'].'
        Recebida em '.$momento;'
        ---------------------------
';
$file = fopen($config['arquivo_backup'],"a+");
fwrite($file,$msg);
fclose($file);
mail($recebe,$assunto,$msg, $headers);
mail($email,$config['assunto_autoresposta'],str_replace("{mensagem}", $form_data['mensagem'], $config['texto_autoresposta']), $auto_headers);
back($config['agradece']);
?>