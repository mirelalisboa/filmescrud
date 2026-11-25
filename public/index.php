<?php
require_once '../repositories/FilmeRepository.php';

$repo = new FilmeRepository();
$filmes = $repo->listar();

function h($v) { return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Filmes</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        nav a { margin-right: 15px; text-decoration: none; font-weight: bold; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; vertical-align: top; }
        th { background: #eee; }
        .trailer { background: #c4302b; color: #fff; padding: 6px 10px;
                   border-radius: 4px; text-decoration: none; white-space: nowrap; }
    </style>
</head>
<body>

<h1>🎬 Catálogo de Filmes</h1>

<nav>
    <a href="index.php">📋 Listar Filmes</a>
    <a href="criar.php">➕ Novo Filme</a>
</nav>

<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Gênero</th>
        <th>Ano</th>
        <th>Diretor</th>
        <th>Sinopse</th>
        <th>Trailer</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($filmes as $f): ?>
        <tr>
            <td><?= $f['id'] ?></td>
            <td><?= h($f['titulo']) ?></td>
            <td><?= h($f['genero']) ?></td>
            <td><?= h($f['ano']) ?></td>
            <td><?= h($f['diretor']) ?></td>
            <td><?= h($f['sinopse']) ?></td>
            <td>
                <?php if (!empty($f['link_trailer'])): ?>
                    <a class="trailer" href="<?= h($f['link_trailer']) ?>"
                       target="_blank" rel="noopener noreferrer">▶ Assistir trailer</a>
                <?php else: ?>
                    —
                <?php endif; ?>
            </td>
            <td>
                <a href="editar.php?id=<?= $f['id'] ?>">✏️ Editar</a> |
                <a href="excluir.php?id=<?= $f['id'] ?>"
                   onclick="return confirm('Deseja excluir?')">🗑️ Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>