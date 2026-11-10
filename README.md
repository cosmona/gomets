# Gomets

Juego web multijugador para **ponerse gomets** (pegatinas) entre los participantes: cada jugador elige un nombre, selecciona a otro jugador de la lista y le pone un gomet **rojo** o **verde**. Cada jugador ve cuántos gomets de cada color ha recibido, y suena un efecto distinto según el color.

Proyecto de 2014 hecho por xuscrus y osk.

## Tecnologías

| Parte | Herramientas |
| --- | --- |
| Frontend | AngularJS 1.2, jQuery, Bootstrap 3, LESS, [ion.sound](https://github.com/IonDen/ion.sound) |
| Backend | PHP con [Silex](https://github.com/silexphp/Silex) (`public/api.php`) |
| Datos | Fichero JSON en `db/` (se crea solo) |
| Pruebas | PHPUnit (`test/`) y Jasmine (`public/SpecRunner.html`) |

## Puesta en marcha

Requisitos: PHP 5.4 o superior y [Composer](https://getcomposer.org/).

```bash
composer install
php -S localhost:8000 -t public
```

Abre [http://localhost:8000](http://localhost:8000).

> Silex está abandonado desde 2018 y el `composer.json` pide `dev-master`, así que con PHP moderno puede que haya que fijar una versión antigua de Silex o de PHP.

## API (`public/api.php`)

| Método | Ruta | Qué hace |
| --- | --- | --- |
| `POST` | `/login` | Da de alta al jugador de la sesión |
| `GET` | `/get` | Devuelve el resto de jugadores y los datos del jugador actual |
| `POST` | `/change_name` | Cambia el nombre del jugador |
| `POST` | `/gomet` | Pone un gomet (rojo o verde) a otro jugador |

## Pruebas

```bash
vendor/bin/phpunit
```

Para las pruebas de JavaScript, abre `public/SpecRunner.html` en el navegador.

## Estructura

```
public/
├── index.html          # interfaz (AngularJS)
├── api.php             # API con Silex
├── src/Gomets.js       # controlador y servicio de Angular
├── less/, css/         # estilos
└── media/sound/        # sonidos de los gomets
src/Xuscrus/            # modelo: jugadores, gomets y colores
test/                   # pruebas de PHPUnit
```
