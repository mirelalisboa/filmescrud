<?php
require_once '../repositories/FilmeRepository.php';

(new FilmeRepository())->excluir((int) $_GET['id']);
header("Location: index.php");
exit;
?>