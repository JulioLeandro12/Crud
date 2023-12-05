<?php 
require "auth/auth.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Home Sweet Home</title>
    <script>
        window.addEventListener("load", function() {
        const buttonCrud = document.querySelector('#bCRUD');
        const buttonLogout = document.querySelector('#bLogout');

        buttonCrud.addEventListener("click", function (){
            window.location.href = "/public/crud/add.php";
        });
        buttonLogout.addEventListener("click", function() {
            window.location.href = "/public/logout.php"
        });
    });
    </script>
</head>

<body>
    <h1>Home</h1>
    <div>
        <button class="button-default" id="bCRUD" role="button">Add</button>
        <button class="button-default" id="bLogout" role="button">Sair</button>
    </div>    
</body>

</html>