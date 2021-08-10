# IMPORTANTE

Si está viendo este archivo como un usuario normal, comuniquese lo antes posible con un administrador para informarle sobre esto.

## Contenidos

**Contenidos**
1. [Clonar Proyecto](#gitClone)
2. [Instalar Laragon](#laragonInstall)
3. [Instalar Dependencias](#dependencias)
4. [Crear Base de datos para el proyecto](#createDatabase)
5. [Migrations y Seeders](#migrateSeed)
6. [Levantar Servidor](#runserver)

<a name="gitClone"></a>
## Clonar Proyecto
Para continuar el desarrollo del sistema en otro equipo, usted debe clonar el proyecto a través de github mediante la consola de windows ejecutando la siguiente instruccion (verifique que se encuentre en el directorio deseado):
  ```
  git clone https://github.com/JulioVit/Prueba-Tecnica-RedCapital.git
  ```

<a name="laragonInstall"></a>
## Instalar Laragon
Se requiere instalar Laragon de 64 bits, para ello se prefiere la versión mas actual. Se utilizó la versión 5.0 durante el desarrollo.

<a name="dependencias"></a>
## Instalar Dependencias
1. Ejecutar la siguiente instruccion en la consola de comandos ubicada en la raiz del proyecto (la ubicacion dependera de la ruta en la cual se haya clonado el proyecto)
  ```
  composer self-update
  ```
  
Nota: Si el comando le genera un error entonces se recomienda realizar una instalación limpia de composer. Composer es utilizado para manejar comodamente el proceso de instalación de dependencias, puede no usar composer pero para ello deberá instalar cada una de las dependencias manualmente.

2. Una vez composer se encuentre actualizado o cuente con una instalación limpia de Composer, debe ejecutar la siguiente instrucción (en la ruta raiz del proyecto).
  ```
  composer update
  ```
Esta instrucción identificará las dependencias del proyecto con sus correspondientes versiones y procedera a descargar todas aquellas que no se tengan ya instaladas. Si se presentan errores al ejecutar esta instrucción, en la gran mayoría de los casos se debe a problemas de compatibilidad de versiones con otras herramientas/librerias instaladas en el equipo ajenas al proyecto. Ante esto se recomienda seguir las sugerencias que entrega el error o buscar información adicional sobre este mismo.

Para directamente evitar que ocurran estos errores se recomienda trabajar en un entorno virtual o mediante el uso de contenedores.

<a name="createDatabase"></a>
## Crear la Base de Datos para el proyecto
1. Instale una herramienta de gestión de bases de datos como heidisql o mysql workbench

2. En el menú principal de Laragon, seleccione la opcion de "Database" o "Database Management" (el nombre dependerá de la versión específica de Laragon).

3. Proceda a generar una nueva base de datos con credenciales y nombre a elección. De preferencia:

   ```
   nombre de base de datos: PruebaTecnica
   user: root
   password: 
   ```

Nota: Este paso dependerá de la herramienta de gestión de bases de datos que tenga instalada.

4. En el archivo **.env** ubicado en la raiz del proyecto

En el archivo mencionado anteriormente debemos ubicar y modificar las siguientes lineas con las credenciales que se quiera utilizar. Por defecto se encuentran las credenciales correspondientes a la ejecución via la extensión Laravel Sail la cual ejecuta el proyecto via Docker:
   ```
   DB_DATABASE=PruebaTecnica
   DB_USERNAME=sail
   DB_PASSWORD=password
   ```
Nota: Si quiere ejecutar el proyecto via Docker, entonces se debe dejar el archivo tal y como se encuentra por defecto

<a name="migrateSeed"></a>
## Migrations
Para migrar las tablas es necesario ejecutar la siguiente instruccion en la consola de windows (Es obligatorio ejecutar esta instruccion donde se encuentra almacenado el ProyectoGuiarConsultores)
   ```
   php artisan migrate:fresh --seed
   ```
Este comando generará las tablas de la base de datos con ciertos datos de prueba.

<a name="runserver"></a>
## Levantar Servidor
Para visualizar la pagina web se debe ejecutar la siguiente instruccion en la consola de comandos ubicada en la raiz del proyecto.
   ```
   php artisan serve
   ```
