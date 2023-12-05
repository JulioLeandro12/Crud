<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Create New Accont</title>

    <script>
    <?php 
        $emailValido = true;
        $senhasIguais =  true;
        $dadosValidos = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $confirmacaoSenha = $_POST["ConfirmacaoSenha"];
            if (isset($email) && isset($senha) && isset($confirmacaoSenha)) {
                $arquivo = "../CSV's/users.csv";
                $fpn = fopen($arquivo, "r");
                if ($fpn){
                    $linhas = file('users.csv'); // Lê as linhas do arquivo e armazena em um array
                    for ($i = 0; $i < count($linhas); $i++) {
                        $row = str_getcsv($linhas[$i]); // Converte a linha atual em um array de valores usando str_getcsv
                        if ($row[0] == $email) {
                            $emailValido = false;
                            $dadosValidos = false;
                            break;
                        }
                    }
                    if ($senha !== $ConfirmacaoSenha) {
                        $senhasIguais = false;
                        $dadosValidos = false;
                    }
                    fclose ($fpn);
                    if ($dadosValidos) {
                        $fpn = fopen($arquivo, "a");
                        fputcsv($fpn, [$email, $senha]);
                        session_start();
                        $_SESSION["user"] = $email;
                        $_SESSION["auth"] = true;
                        fclose($fpn);
                        header("location: /public/home.php", true, 302);
                        exit;
                    }
                }
            }
        }
    ?>
    </script> 
</head>
<body>
    <h1>Create New Accont!</h1>
    <form action=<?php $_SERVER["PHP_SELF"]?>  method="post" class="formDefalt">
        <input type="email" placeholder="E-mail" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="password" placeholder="Confirm your Password" name="confirmPassword" required>
        <input type="submit" value="Create">
        <p class="p"><a href="/index.php">Make Login</a></p>
    </form>
    <?php if(!$emailValido):?>
        <p class="aviso">Email used!</p>
    <?php endif?>
    <?php if($emailValido == true):?>
        <p class="avisoConfirmacao">Congratulation! You're registered</p>
    <?php endif?>
    <?php if(!$senhasIguais):?>
        <p class="aviso">Your password is different</p>
    <?php endif?>
</body>
</html>