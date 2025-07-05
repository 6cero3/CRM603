# CRM Seis Cero Tres

Sistema CRM en PHP y MySQL. Preparado para instalarse en `www.6cero3.com/crm`.

## Instalación

1. Copiar todos los archivos al directorio `crm` de tu hosting.
2. Crear una base de datos MySQL y actualizar las credenciales en `config/conexion.php`.
3. Importar el archivo `crm.sql` incluido en este repositorio para crear todas
   las tablas necesarias del CRM.

4. Acceder a `www.tudominio.com/crm` y crear el primer usuario manualmente en la base de datos con la función `password_hash`.

Este proyecto es un esqueleto inicial que incluye:

- Inicio de sesión con roles y contraseñas en hash.
- Panel de control con enlaces a módulos.
- Archivos modulares para futuras funcionalidades.

Para crear un zip del sistema ejecuta en tu terminal:

```bash
zip -r seiscerotres.zip .
```

Luego sube ese archivo a tu hosting y descomprósalo en la ruta correspondiente.

## Generador de licencias

En la carpeta `genlic` encontrarás una aplicación independiente para generar licencias del CRM. Consulta `genlic/README.md` para detalles de instalación.
