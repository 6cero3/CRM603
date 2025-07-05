# Generador de Licencias - Seis Cero Tres

Aplicación para emitir y gestionar licencias del CRM. Debe instalarse en `https://www.6cero3.com/genlic/`.

## Instalación
1. Copia todos los archivos de `genlic/` a la carpeta `genlic` de tu hosting.
2. Crea una base de datos MySQL y actualiza las credenciales en `includes/conexion.php`.
3. Importa el archivo `genlic.sql` para crear la tabla de licencias.

4. Modifica el usuario y contraseña del administrador en `includes/config.php`.

Accede a `https://tudominio.com/genlic/` para generar y administrar licencias. El CRM remoto debe consultar `verificar_licencia.php` para validar sus credenciales.
