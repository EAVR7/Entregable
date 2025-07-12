CREATE DATABASE TecnoSoluciones;
USE TecnoSoluciones;

CREATE TABLE usuario (
    idusuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(20) NOT NULL DEFAULT 'usuario',
    fecha_creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cliente (
    idcliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(20),
    direccion TEXT,
    fecha_creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE proyecto (
    idproyecto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    cliente_id INT NOT NULL,
    fecha_inicio DATE,
    fecha_fin DATE,
    estado VARCHAR(50) DEFAULT 'pendiente',
    fecha_creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_cliente FOREIGN KEY (cliente_id) REFERENCES cliente(idcliente) ON DELETE CASCADE
);

CREATE TABLE tarea (
    idtarea INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    proyecto_id INT NOT NULL,
    asignado_a INT,
    estado VARCHAR(50) DEFAULT 'pendiente',
    fecha_limite DATE,
    fecha_creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_proyecto FOREIGN KEY (proyecto_id) REFERENCES proyecto(idproyecto) ON DELETE CASCADE,
    CONSTRAINT fk_usuario FOREIGN KEY (asignado_a) REFERENCES usuario(idusuario) ON DELETE SET NULL
);

CREATE TABLE asignacion (
    idasignacion INT AUTO_INCREMENT PRIMARY KEY,
    proyecto_id INT NOT NULL,
    usuario_id INT NOT NULL,
    rol_proyecto VARCHAR(50),
    fecha_asignacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (proyecto_id) REFERENCES proyecto(idproyecto) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuario(idusuario) ON DELETE CASCADE
);

-- Insertar usuarios
INSERT INTO usuario (nombre, email, password, rol) VALUES
('Ana López', 'ana.lopez@tecnosoluciones.com', 'password123', 'admin'),
('Carlos Pérez', 'carlos.perez@tecnosoluciones.com', 'secret456', 'gerente'),
('María Gómez', 'maria.gomez@tecnosoluciones.com', 'clave789', 'usuario');
INSERT INTO usuario (nombre, email, password, rol)
VALUES ('Juan Pérez', 'juan.perez@correo.com', MD5('clave123'), 'admin');
select * from usuario;
-- Insertar clientes
INSERT INTO cliente (nombre, email, telefono, direccion) VALUES
('Empresa XYZ S.A.', 'contacto@empresaxyz.com', '987654321', 'Av. Principal 123, Ciudad'),
('Comercial ABC', 'ventas@comercialabc.com', '912345678', 'Calle Secundaria 456, Ciudad'),
('Servicios LMN', 'info@servicioslmn.com', '999888777', 'Jr. Los Olivos 789, Ciudad');

-- Insertar proyectos
INSERT INTO proyecto (nombre, descripcion, cliente_id, fecha_inicio, fecha_fin, estado) VALUES
('Desarrollo ERP', 'Proyecto para desarrollar sistema ERP personalizado', 1, '2025-01-10', '2025-06-30', 'en progreso'),
('Página Web Comercial', 'Rediseño completo del sitio web corporativo', 2, '2025-03-01', '2025-04-30', 'pendiente'),
('App Móvil Soporte', 'Aplicación móvil para soporte técnico remoto', 3, '2025-02-15', '2025-07-15', 'en progreso');

-- Insertar tareas
INSERT INTO tarea (nombre, proyecto_id, asignado_a, estado, fecha_limite) VALUES
('Análisis de requerimientos', 1, 2, 'completada', '2025-01-31'),
('Diseño de base de datos', 1, 3, 'en progreso', '2025-02-15'),
('Desarrollo Frontend', 2, 3, 'pendiente', '2025-04-15'),
('Pruebas y QA', 3, 2, 'pendiente', '2025-06-30');
SELECT * FROM usuario WHERE email = 'juan.perez@correo.com' AND password = MD5('clave123');
UPDATE usuario SET password = MD5('password123') WHERE idusuario = 1;
UPDATE usuario SET password = MD5('secret456')   WHERE idusuario = 2;
UPDATE usuario SET password = MD5('clave789')     WHERE idusuario = 3;
INSERT INTO usuario (nombre, email, password, rol) 
VALUES ('Marco Enrique', 'Marco@gmail.com', MD5('clave123'), 'usuario');
SELECT COUNT(*) FROM usuario;