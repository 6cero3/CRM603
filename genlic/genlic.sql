-- Esquema para Generador de Licencias
-- Ejecuta este script en una base de datos vacía

CREATE TABLE licencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100),
    dominio VARCHAR(255),
    tipo ENUM('mensual','6meses','anual'),
    fecha_inicio DATE,
    fecha_fin DATE,
    token VARCHAR(64),
    UNIQUE KEY token_dominio (token, dominio)
);
