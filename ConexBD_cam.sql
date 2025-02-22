create database ldst001;

use ldst001;

create table usuarios
(
	email char(50) not null primary key,
	password char(20) not null,
	nombre char(100) not null,
	apellidos char(30),
	fecha date not null,

	privilegio char(1)
);

create table pedidos
(
	id_pedido int unsigned not null auto_increment primary key,
	email int unsigned not null,
	coste_total float(8,2),
	fecha_hora datetime not null
);

create table camisetas
(
	id_camiseta int unsigned not null auto_increment primary key,
	liga char(100) not null,
	equipo char(100) not null,
	equipacion char(100) not null,
	ano char(100) not null,
	precio float(6,2) not null,
	imagen char(100)
);

create table pedido_camisetas
(
	id_pedido int unsigned not null,
	id_camiseta int unsigned not null,
	cantidad tinyint unsigned,
	
	primary key (id_pedido, id_camiseta)
);

insert into camisetas values
(null, 'LaLiga', 'Real Valladolid', 'Local', '2024/2025', 80.00, 'Valladolid1.png'),
(null, 'LaLiga', 'Real Valladolid', 'Visitante', '2024/2025', 80.00, 'Valladolid2.png'),
(null, 'LaLiga', 'Real Valladolid', 'Alternativa', '2024/2025', 80.00, 'Valladolid3.png'),
(null, 'LaLiga', 'FC Barcelona', 'Local', '2024/2025', 80.00, 'barcelona1.png'),
(null, 'LaLiga', 'FC Barcelona', 'Visitante', '2024/2025', 80.00, 'barcelona2.png'),
(null, 'LaLiga', 'FC Barcelona', 'Alternativa', '2024/2025', 80.00, 'barcelona3.png'),
(null, 'LaLiga', 'Real Madrid', 'Local', '2024/2025', 80.00, 'madrid1.png'),
(null, 'LaLiga', 'Real Madrid', 'Visitante', '2024/2025', 80.00, 'madrid2.png'),
(null, 'LaLiga', 'Atletico de Madrid', 'Local', '2024/2025', 80.00, 'atletico1.png'),
(null, 'LaLiga', 'Atletico de Madrid', 'Visitante', '2024/2025', 80.00, 'atletico2.png');