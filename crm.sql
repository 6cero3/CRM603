-- Esquema para CRM Seis Cero Tres
-- Ejecuta este script en una base de datos vacía

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    correo VARCHAR(100) UNIQUE,
    clave VARCHAR(255),
    rol ENUM('admin','colaborador','general')
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    empresa VARCHAR(100),
    telefono VARCHAR(50),
    correo VARCHAR(100),
    redes_sociales VARCHAR(255),
    notas TEXT
);

CREATE TABLE proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    nombre VARCHAR(100),
    descripcion TEXT,
    fecha_inicio DATE,
    fecha_fin DATE,
    responsable INT,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    proyecto_id INT,
    titulo VARCHAR(100),
    prioridad ENUM('baja','media','alta'),
    estado ENUM('pendiente','en curso','completada'),
    responsable INT,
    fecha_limite DATE,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id)
);

CREATE TABLE notas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    nota TEXT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE finanzas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    tipo ENUM('ingreso','egreso'),
    monto DECIMAL(10,2),
    fecha DATE,
    descripcion TEXT
);

CREATE TABLE cotizaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    proyecto_id INT,
    nombre VARCHAR(100),
    monto DECIMAL(10,2),
    fecha DATE,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id)
);
