use semexe;

create table clientes (
    id int auto_increment primary key,
    nome varchar(255) not null,
    cpf varchar(255) not null,
    email varchar(255),
    telefone varchar(255),
    cep varchar(255),
    endereco varchar(255),
    numero int,
    complemento varchar(255),
    cidade varchar(255),
    estado char(2)
);