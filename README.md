# Proyecto de Evaluación Amplifica

## Descripción
Este proyecto es parte del proceso de postulación a Amplifica, una Darkstore y plataforma de omnicanalidad enfocada en la optimización logística y operativa del comercio electrónico.

El objetivo principal es evaluar las habilidades en desarrollo backend con PHP, autenticación de usuarios e integración con APIs externas.

## Tecnologías Utilizadas
- **Backend:** PHP 8.4 con Laravel 12
- **Base de Datos:** MySQL
- **Frontend:** Blade, Tailwind 4, Javascript

## Instalación y Configuración
### Requisitos Previos
- PHP 8.2
- Composer
- Base de datos MySQL (o Bien Sqlite version 3)

### Pasos de Instalación
1. Clonar el repositorio:
   ```sh
   git clone https://github.com/tu_usuario/nombre_del_proyecto.git
   cd nombre_del_proyecto
   ```
2. Instalar dependencias de Laravel:
   ```sh
   composer install
   ```
3. Configurar el archivo de entorno:
   ```sh
   cp .env.example .env
   ```
    - Configurar la conexión a la base de datos si se va a usar persistencia.
    - Agregar las credenciales de la API en `.env`:
      ```env
      AMPLIFICA_API_BASE_URL='https://postulaciones.amplifica.io/'
      AMPLIFICA_USERNAME='tu_correo@example.com'
      AMPLIFICA_PASSWORD='12345'
      ```
4. Generar clave de aplicación:
   ```sh
   php artisan key:generate
   ```
5. Generar cache de los archivos de configuracion
   ```sh
   php artisan config:cache
   ```
   Si es necesario borrar el cache despues
   ```sh
   php artisan cache:clear
   ```
7. Configurar base de datos
   ```sh
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_bd
   DB_USERNAME=username
   DB_PASSWORD=password
   ```
8. Ejecutar migraciones (Con seeder para carga inicial de productos):
   ```sh
   php artisan migrate
   ```
   Ejecutar seeders para carga inicial de productos
   ```sh
   php artisan migrate --seed
   ```
10. Iniciar el servidor de desarrollo:
   ```sh
   php artisan serve
   ```
   
## Que me falto por implementar
- Tests
- Cache a las consultas del carrito
- Mejorar el manejo de alguna excepciones
