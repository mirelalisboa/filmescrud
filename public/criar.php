<?php
require_once '../repositories/FilmeRepository.php';

if ($_POST) {
    $filme = new Filme(
        $_POST['titulo'],
        $_POST['genero'],
        (int) $_POST['ano'],
        $_POST['diretor'],
        $_POST['sinopse'],
        $_POST['link_trailer']
    );

    (new FilmeRepository())->criar($filme);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    <input name="titulo" placeholder="Título" required><br>
    <input name="genero" placeholder="Gênero"><br>
    <input name="ano" type="number" placeholder="Ano de lançamento" min="1888" max="2100"><br>
    <input name="diretor" placeholder="Diretor"><br>
    <textarea name="sinopse" placeholder="Sinopse" rows="4" cols="40"></textarea><br>
    <input name="link_trailer" type="url" placeholder="Link do trailer no YouTube (https://...)"><br>
    <button>Salvar</button>
</form>