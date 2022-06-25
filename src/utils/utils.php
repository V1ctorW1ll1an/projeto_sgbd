<?php
function redirecionar(string $pagina): void
{
    header("Location: $pagina");
    die();
}
