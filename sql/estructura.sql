-- Tabla para los administradores
CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Insertar admin de prueba
INSERT INTO admin (username, password) VALUES
('lamascara', SHA1('admin123')); -- Puedes cambiar SHA1 por PASSWORD_DEFAULT 

-- Tabla del menú
CREATE TABLE menu (
  id INT AUTO_INCREMENT PRIMARY KEY,
  categoria VARCHAR(50) NOT NULL,  -- TacosPremium, TacosGuisado
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT NOT NULL,
  precio DECIMAL(6,2) NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  activo TINYINT(1) DEFAULT 1
);

-- 🔥 Tacos Premium
INSERT INTO menu (categoria, nombre, descripcion, precio, imagen) VALUES
('Premium', 'Bisteck', 'Suave carne de res asada al punto perfecto.', 40, 'images/tacopremium/bisteck.jpg'),
('Premium', 'Longaniza', 'Longaniza artesanal dorada en comal.', 40, 'images/tacopremium/longaniza.jpg'),
('Premium', 'Campechano', 'Delicioso mix de bisteck y longaniza.', 40, 'images/tacopremium/campechano.jpg'),
('Premium', 'Carne Enchilada', 'Tiras de cerdo marinadas con chile guajillo.', 40, 'images/tacopremium/carneenchilada.jpg');


-- 🌮 Tacos de Guisado
INSERT INTO menu (categoria, nombre, descripcion, precio, imagen) VALUES
('Guisado', 'Chicharrón en salsa roja', 'Crujiente chicharrón bañado en salsa roja.', 30, 'images/tacoguisado/chicharronroja.jpg'),
('Guisado', 'Huevo con longaniza', 'Mezcla clásica de huevo y longaniza.', 30, 'images/tacoguisado/huevolonganiza.jpg'),
('Guisado', 'Res en salsa verde', 'Carne de res cocida en salsa verde casera.', 30, 'images/tacoguisado/resensalsaverd.jpg'),
('Guisado', 'Tortitas de ejote', 'Tortitas suaves con ejotes y salsa.', 30, 'images/tacoguisado/ejote.jpg'),
('Guisado', 'Champiñones a la mexicana', 'Champiñones salteados con jitomate y chile.', 30, 'images/tacoguisado/champinones.jpg'),
('Guisado', 'Chicharrón en salsa verde', 'Chicharrón tierno en salsa verde.', 30, 'images/tacoguisado/chicharronverde.jpg'),
('Guisado', 'Moronga', 'Receta tradicional de moronga mexicana.', 30, 'images/tacoguisado/moronga.jpg'),
('Guisado', 'Longaniza con nopales', 'Longaniza y nopales en salsa roja.', 30, 'images/tacoguisado/longanizanopales.jpg'),
('Guisado', 'Alambre', 'Pimientos, cebolla y carne en mezcla sabrosa.', 30, 'images/tacoguisado/alambre.jpg'),
('Guisado', 'Res con papas en salsa verde', 'Res con papas en salsa fresca.', 30, 'images/tacoguisado/respapa.jpg'),
('Guisado', 'Picadillo', 'Carne molida con verdura casera.', 30, 'images/tacoguisado/picadillo.jpg'),
('Guisado', 'Albóndiga', 'Albóndigas en caldillo de jitomate.', 30, 'images/tacoguisado/albondiga.jpg'),
('Guisado', 'Cerdo en salsa verde', 'Carne de cerdo suave y jugosa en salsa.', 30, 'images/tacoguisado/cerdoverde.jpg'),
('Guisado', 'Chuleta', 'Chuleta de cerdo jugosa y dorada.', 30, 'images/tacoguisado/chuleta.jpg'),
('Guisado', 'Riñones', 'Riñones en salsa con cebolla y especias.', 30, 'images/tacoguisado/rinones.jpg'),
('Guisado', 'Patitas de cerdo', 'Patitas en salsa espesa y sabrosa.', 30, 'images/tacoguisado/patitas.jpg');


-- Tabla para las promociones
CREATE TABLE mpromociones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100) NOT NULL,
  descripcion TEXT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  activa TINYINT(1) DEFAULT 1
);

-- Datos de ejemplo
INSERT INTO mpromociones (titulo, descripcion, imagen, activa) VALUES
('2x1 en Margaritas', 'Disfruta dos Margaritas al precio de una todos los jueves.', 'images/demo/promociones/margarita.jpg', 1),
('Taco Tuesday', 'Todos los tacos al 50% los martes de 2 a 6 PM.', 'images/demo/promociones/taco_tuesday.jpg', 1),
('Postre Gratis', 'Postre gratis en tu primera visita si reservas online.', 'images/demo/promociones/postre.jpg', 1);
