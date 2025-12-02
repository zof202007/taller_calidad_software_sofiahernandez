CREATE DATABASE IF NOT EXISTS comidas_rapidas;
USE comidas_rapidas;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol VARCHAR(20) NOT NULL,
    usuario VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (rol, usuario, password) VALUES
('admin','valentina','12345'),
('cliente','cliente1','67890');

CREATE TABLE tipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(50) NOT NULL
);

INSERT INTO tipos (nombre_tipo) VALUES
('Hamburguesa'),
('Bebida');

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tipo_id INT NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255),
    FOREIGN KEY (tipo_id) REFERENCES tipos(id)
);

INSERT INTO productos (nombre, tipo_id, descripcion, precio, imagen) VALUES
('Hamburguesa Clásica',1,'Carne de res, queso y vegetales',12000,'burger1.jpg'),
('Hamburguesa BBQ',1,'Salsa BBQ, tocineta y queso',15000,'burger2.jpg'),
('Hamburguesa Doble Carne',1,'Doble carne, doble queso y papas',18000,'burger3.jpg'),
('Hamburguesa Especial',1,'Carne, jamón, huevo y queso',17000,'burger4.jpg'),
('Hamburguesa Ranchera',1,'Pollo, salsa ranch y queso',16000,'burger5.jpg'),
('Gaseosa',2,'500ml',4000,'drink1.jpg'),
('Jugo Natural',2,'Jugo de frutas en agua',5000,'drink2.jpg'),
('Malteada de Chocolate',2,'Leche, chocolate y helado',8000,'drink3.jpg'),
('Café',2,'Café caliente tradicional',3000,'drink4.jpg'),
('Agua',2,'Botella 600ml',2500,'drink5.jpg');


