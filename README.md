
## App

Para levantar el proyecto es necesario tener instalado Docker las configuraciones se encuentran en el folder docker ejecutar el comando docker-compose up configurar el .env dentro de /docker y copiar .env.example y renombrarlo a .env

<h3>Part 2: Pets</h3>

Ejecutar migraciones <br/>
<code>php artisan migrate</code>

Ejecutar seeders <br/>
<code>php artisan db:seed</code>

Ejecutar pruebas <br/>
<code>php artisan test --filter PetTest</code>

Ruta: <br/>
<code>http://localhost:8082/pets</code>

<h3>Part 1: El Lagarto App</h3>

El código de la prueba se encuentra en la carpeta <strong>app/Services/Examen.php</strong> del proyecto base de Laravel.

- Hay una ruta pública para ver todo el historial ubicada en <strong>/test</strong> en el archivo <strong>routes/web.php</strong> que retorna la información completa del ejercicio
- El test del ejercicio se encuentra en <strong>tests/Unit/ExamenTest</strong>

Para levantar el proyecto es necesario tener instalado Docker las configuraciones se encuentran en el folder <strong>docker</strong> ejecutar el comando <strong>docker-compose up</strong>
