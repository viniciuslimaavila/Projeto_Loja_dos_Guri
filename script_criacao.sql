create database if not exists loja_dos_guri;
use loja_dos_guri;
create table if not exists usuario(
usuario_id smallint primary key auto_increment,
usuario_name varchar(30) not null,
usuario_email varchar(100) not null,
usuario_password varchar(20) not null
);