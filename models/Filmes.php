<?php

class Filme {
    private $titulo;
    private $genero;
    private $ano;
    private $diretor;
    private $sinopse;
    private $linkTrailer;

    public function __construct($titulo, $genero, $ano, $diretor, $sinopse, $linkTrailer) {
        $this->titulo      = $titulo;
        $this->genero      = $genero;
        $this->ano         = $ano;
        $this->diretor     = $diretor;
        $this->sinopse     = $sinopse;
        $this->linkTrailer = $linkTrailer;
    }

    public function getTitulo()      { return $this->titulo; }
    public function getGenero()      { return $this->genero; }
    public function getAno()         { return $this->ano; }
    public function getDiretor()     { return $this->diretor; }
    public function getSinopse()     { return $this->sinopse; }
    public function getLinkTrailer() { return $this->linkTrailer; }
}
?>
?>
