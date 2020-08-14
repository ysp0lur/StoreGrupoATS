create database if not exists ecommerceGrupoATS;

use ecommerceGrupoATS;

create table if not exists usuarios(
		id 		int(5) not null auto_increment ,
		nombre 	varchar(255) not null,
		email 	varchar(200) null,
		pass 	varchar(255)  not null,
        primary key(id)
)
	engine=InnoDB
;

create table if not exists clientes(
		id 		int(5) not null auto_increment ,
		nombre 	varchar(255) not null,
		email 	varchar(200) null,
		pass 	varchar(255)  not null,
        primary key(id)
)
	engine=InnoDB
;

create table if not exists ventas(
		id 		int(5) not null auto_increment ,
		idCli 	int(5) not null,
		fecha 	datetime null,
        index fkIdCli(idCli),
        primary key(id)
)
	engine=InnoDB
;

 alter table ventas
		add constraint idCli foreign key (idCli)
			references clientes(id) ON delete cascade on update cascade; 
            
            
create table if not exists productos(
		id 		int(5) not null auto_increment ,
		nombre 	varchar(255) not null,
		precio 	double null,
		existencia 	int(5) null,
        primary key(id)
)
	engine=InnoDB
;


create table if not exists detalleVentas(
		id 		int(5) not null auto_increment ,
		idProd 	int(5) not null,
		idVenta int(5) null,
		cantidad int(5) null,
        precio double null,
        subTotal double null,
        index fkIdProd(idProd),
        index fkIdVenta(idVenta),
        primary key(id) 
)
	engine=InnoDB
;

alter table detalleVentas
		add constraint idProd foreign key (idProd)
			references productos(id) ON delete cascade on update cascade; 
            
alter table detalleVentas
		add constraint idVenta foreign key (idVenta)
			references ventas(id) ON delete cascade on update cascade; 
            
CREATE TABLE files (
  id int NOT NULL AUTO_INCREMENT,
  filename varchar(250) NOT NULL,
  filesize int NOT NULL,
  web_path varchar(250) NOT NULL,
  system_path varchar(250) NOT NULL,
  PRIMARY KEY (id)
) AUTO_INCREMENT=1;

CREATE TABLE productos_files (
    producto_id int NOT NULL,
    file_id int NOT NULL
);
            
INSERT INTO `usuarios` (`id`, `email`, `pass`, `nombre`) VALUES
(1, 'raul@grupoats.com', 'e10adc3949ba59abbe56e057f20f883e', 'Raul');

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`) VALUES
(1, 'suscripcionsua', '7092', '/ecommerceGrupoATS/upload/1.png', '/usr/local/var/www/ecommerceGrupoATS/upload/1.png'),
(2, 'suscripcionsua2', '7092', '/ecommerceGrupoATS/upload/2.png', '/usr/local/var/www/ecommerceGrupoATS/upload/2.png'),
(3, 'suscripcionsua3', '7092', '/ecommerceGrupoATS/upload/3.png', '/usr/local/var/www/ecommerceGrupoATS/upload/3.png'),
(4, 'suscripcionsua4', '7092', '/ecommerceGrupoATS/upload/4.png', '/usr/local/var/www/ecommerceGrupoATS/upload/4.png'),
(5, 'suscripcionsua5', '7092', '/ecommerceGrupoATS/upload/5.png', '/usr/local/var/www/ecommerceGrupoATS/upload/5.png'),
(6, 'suscripcionauditor', '37571', '/ecommerceGrupoATS/upload/6.png', '/usr/local/var/www/ecommerceGrupoATS/upload/6.png'),
(7, 'suscripcionsuaauditor', '37571', '/ecommerceGrupoATS/upload/7.png', '/usr/local/var/www/ecommerceGrupoATS/upload/7.png'),
(8, 'suscripcionsua8', '7092', '/ecommerceGrupoATS/upload/8.png', '/usr/local/var/www/ecommerceGrupoATS/upload/8.png');

INSERT INTO `productos_files` (`producto_id`, `file_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);


select * from files;

SELECT 
                        p.id,
                        p.nombre,
                        p.precio,
                        p.existencia,
                        f.web_path
                        FROM
                        productos AS p
                        INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                        INNER JOIN files AS f ON f.id=pf.file_id;