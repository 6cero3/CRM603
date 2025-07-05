# Generador de Licencias - Seis Cero Tres

Aplicación para emitir y gestionar licencias del CRM. Debe instalarse en `https://www.6cero3.com/genlic/`.

## Instalación
1. Copia todos los archivos de `genlic/` a la carpeta `genlic` de tu hosting.
2. Crea una base de datos MySQL y actualiza las credenciales en `includes/conexion.php`.
3. Importa este esquema inicial:

```sql
CREATE TABLE licencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100),
    dominio VARCHAR(255),
    tipo ENUM('mensual','6meses','anual'),
    fecha_inicio DATE,
    fecha_fin DATE,
    token VARCHAR(64)
);
```

4. Modifica el usuario y contraseña del administrador en `includes/config.php`.

Accede a `https://tudominio.com/genlic/` para generar y administrar licencias. El CRM remoto debe consultar `verificar_licencia.php` para validar sus credenciales.
