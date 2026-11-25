DROP TABLE filmes;

CREATE TABLE filmes (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    genero VARCHAR(50),
    ano INT,
    diretor VARCHAR(100),
    sinopse TEXT,
    link_trailer VARCHAR(255)
);