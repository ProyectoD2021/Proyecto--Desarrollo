CREATE SCHEMA `Proyecto` DEFAULT CHARACTER SET utf8mb4 ;

use Proyecto;

create table usuarios(
				id_usuario int auto_increment,
				nombre varchar(50),
				apellido varchar(50),
				email varchar(50),
				password text(50),
				fechaCaptura date,
				primary key(id_usuario)
					);



create table imagenes(
				id_imagen int auto_increment,
				nombre varchar(500),
				ruta varchar(500),
				fechaSubida date,
				primary key(id_imagen)
					);
create table articulos(
				id_producto int auto_increment,
				
				id_imagen int not null,
				id_usuario int not null,
				
				descripcion varchar(500),
				
				fechaCaptura date,
				primary key(id_producto)

						);

