<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Filmes.php';
require_once __DIR__ . '/../interfaces/RepositoryInterface.php';

class FilmeRepository implements RepositoryInterface {

    private $conn;

    public function __construct() {
        $this->conn = Database::conectar();
    }

    public function criar($filme) {
        $sql = "INSERT INTO filmes (titulo, genero, ano, diretor, sinopse, link_trailer)
                VALUES (:t, :g, :a, :d, :s, :l)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':t' => $filme->getTitulo(),
            ':g' => $filme->getGenero(),
            ':a' => $filme->getAno(),
            ':d' => $filme->getDiretor(),
            ':s' => $filme->getSinopse(),
            ':l' => $filme->getLinkTrailer()
        ]);
    }

    public function listar() {
        $stmt = $this->conn->query("SELECT * FROM filmes ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM filmes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $filme) {
        $sql = "UPDATE filmes
                SET titulo=:t, genero=:g, ano=:a, diretor=:d, sinopse=:s, link_trailer=:l
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':t'  => $filme->getTitulo(),
            ':g'  => $filme->getGenero(),
            ':a'  => $filme->getAno(),
            ':d'  => $filme->getDiretor(),
            ':s'  => $filme->getSinopse(),
            ':l'  => $filme->getLinkTrailer(),
            ':id' => $id
        ]);
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM filmes WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
?>