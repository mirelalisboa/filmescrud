<?php
require_once '../repositories/FilmeRepository.php';

$repo = new FilmeRepository();

if ($_POST) {
    $filme = new Filme(
        $_POST['titulo'],
        $_POST['genero'],
        (int) $_POST['ano'],
        $_POST['diretor'],
        $_POST['sinopse'],
        $_POST['link_trailer']
    );

    $repo->atualizar((int) $_POST['id'], $filme);
    header("Location: index.php");
    exit;
}

$f = $repo->buscarPorId((int) $_GET['id']);

function h($v) { return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }
?>

<form method="post">
    <input type="hidden" name="id" value="<?= $f['id'] ?>">
    <input name="titulo" value="<?= h($f['titulo']) ?>" required><br>
    <input name="genero" value="<?= h($f['genero']) ?>"><br>
    <input name="ano" type="number" value="<?= h($f['ano']) ?>"><br>
    <input name="diretor" value="<?= h($f['diretor']) ?>"><br>
    <textarea name="sinopse" rows="4" cols="40"><?= h($f['sinopse']) ?></textarea><br>
    <input name="link_trailer" type="url" value="<?= h($f['link_trailer']) ?>"><br>
    <button>Atualizar</button>
</form>