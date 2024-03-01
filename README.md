<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Booky backend

### Despliegue

Copiamos el .env.example para tener las variables de entorno

```bash
cp .env.example .env
```

Lo editamos y seteamos las siguientes propiedades

```php
DB_CONNECTION=mariadb
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=books_api
DB_USERNAME=root
DB_PASSWORD=password
```

Instalamos las dependencias para poder lanzar el proyecto

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

```bash
./vendor/bin/sail up
```

**Lo más seguro es que el contenedor de la base de datos se baje solo, levántalo de nuevo, ya sea con la interfaz de tu editor o con un comando**

Carga los datos en la base de datos

```bash
docker exec -it $(docker ps -qf "ancestor=mariadb:10") bash -c "/docker-entrypoint-initdb.d/init.sh"
```

Y por último generamos los secretos

```bash
./vendor/bin/sail artisan key:generate
```

```bash
./vendor/bin/sail artisan jwt:secret
```

### Tests de los endpoints

Los tests entan en la carpeta `endpoints-tests`
