# BitShort

**BitShort** es una innovadora aplicación web de acortamiento de URLs que ofrece una forma rápida y sencilla de reducir enlaces largos a formatos más compactos. Desarrollada con **JMFramework**, BitShort combina una interfaz intuitiva con un rendimiento excepcional, permitiendo a los usuarios acortar URLs de manera eficiente y efectiva. Con BitShort, la gestión de enlaces nunca ha sido tan fácil.

## Instalación

Para instalar BitShort, siga estos pasos:

1.  Clona el repositorio de BitShort:

    ```bash
    git clone https://github.com/JoshuaMc1/BitShort.git
    ```

2.  Instala las dependencias de PHP:

    ```bash
    composer install
    ```

3.  Instala las dependencias de Node.js:

    ```bash
    npm install
    ```

4.  Configura el archivo de variables de entorno:

    ```bash
    cp .env.example .env
    ```

5.  Configura la conexión a la base de datos en el archivo .env

6.  Inicia el servidor de desarrollo con el siguiente comando:

    ```bash
    php console serve
    ```

7.  Compila los estilos para el proyecto:

    ```bash
    npm run dev
    ```

8.  Ejecuta las migraciones de la base de datos:

    ```bash
    php console schema:run
    ```

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - consulta el archivo [LICENSE](LICENSE) para más detalles.

---

¡Gracias por elegir JMFramework! Esperamos que te sea útil en tu desarrollo web.
