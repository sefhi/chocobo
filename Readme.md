## 🛠️ Requisitos

- 🐳 Instalar Docker
- Instalar el comando `make`
    1. [Instalar en OSX](https://formulae.brew.sh/formula/make)
    2. [Instalar en Window](https://parzibyte.me/blog/2020/12/30/instalar-make-windows/#Descargar_make)

## 🚀 Comandos Útiles

Este proyecto incluye un Makefile con algunos comandos útiles para el desarrollo. Puedes ejecutarlos con el comando
**make** seguido del nombre del comando.

### Comandos de Docker Compose

* `make start`: Inicia los contenedores de Docker Compose.
* `make stop`: Detiene los contenedores de Docker Compose.
* `make down`: Detiene y elimina los contenedores de Docker Compose.
* `make recreate`: Reinicia los contenedores de Docker Compose.
* `make rebuild`: Reconstruye los contenedores de Docker Compose.

### Comandos de Composer

* `make deps`: Instala las dependencias del proyecto.

### Otros comandos

* `make test`: Ejecuta los tests del proyecto.
* `make bash`: Accede a la terminal del contenedor de PHP.
* `make run-chocoBilly inputFilePath=<ruta> outputFilePath=<ruta>`: Ejecuta el script de ChocoBilly con los argumentos necesarios.

## 🐦 Estructura de ChocoBilly 

- `ChocoBilly.php`: Realiza la lectura de un archivo de entrada, procesa los datos y genera un archivo de salida con los resultados, en la carpeta **data**.
- `ChocoScript.php`: Es un script que ejecuta la clase `ChocoBilly` con los argumentos necesarios. Los argumentos son:
  - `inputFilePath`: Ruta del archivo de entrada.
  - `outputFilePath`: Ruta del archivo de salida.

## 🚀 Ejecución

Para ejecutar el script de `ChocoBilly`, utiliza el siguiente comando `make`:

```sh
  make run-chocoBilly inputFilePath=data/input.txt outputFilePath=data/output.txt

    # Ejemplo de salida:
    
    File output created successfully ✅
    
    Input: 
    2
    2,3
    6
    1,2
    3
    
    Output: 
    2:3,3
    2:1,2