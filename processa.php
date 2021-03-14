<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "curriculosenviar@lojaspontarollo.com.br");
        $subject = "Novo curriculo! ";
        $to = new SendGrid\Email(null, "trabalhecommp@lojaspontarollo.com.br");
        $content = new SendGrid\Content("text/html", "Olá Kelly, <br><br>Temos um novo curriculo para analise<br><br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
		
        ?>
    </body>
</html>
