<?php
function e404()
{
    require '../projetpfe/404.php';
    exit();
}


function get_pdo()
{
    return new PDO('mysql:host=localhost;dbname=projetpfe', 'root', '', [
        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);
}

function h(?string $value): string
{
    if ($value === null) {
        return '';
    }
    return htmlentities($value);
}
