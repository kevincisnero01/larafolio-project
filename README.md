## Tabla de Contenido 📋
- [Tabla de Contenido 📋](#tabla-de-contenido-)
- [Introducción 🎯](#introducción-)
- [Caracteristicas ⚙️](#caracteristicas-️)
  - [📍 Módulo de Navegación](#-módulo-de-navegación)
  - [📍 Módulo de Proyectos](#-módulo-de-proyectos)
  - [📍 Módulo de Contacto](#-módulo-de-contacto)
  - [📍 Módulo de Autenticación](#-módulo-de-autenticación)
- [Metodologías 🧾](#metodologías-)
- [Tecnologías 💽](#tecnologías-)
- [Instalación  🛠️](#instalación--️)
- [License](#license)


## Introducción 🎯 
Les presento un proyecto de portafolio que refleja mi capacidad para crear aplicaciones web de alta calidad. Esta aplicación incluye una página de inicio, una sección de proyectos y una página de contacto. Fue desarrollada utilizando la metodología TDD, lo que garantiza pruebas unitarias completas para cada componente y regla. Además, cuenta con características avanzadas como alertas, ventanas modales y confirmaciones de eliminación. Destaca por su uso del stack TALL, proporcionando funcionalidad reactiva y moderna.

<p align="center">
<a href="https://kevincisnero.com" target="_blank">
<img src="https://raw.githubusercontent.com/kevincisnero01/larafolio-project/main/public/documentacion/LarafolioDigital-0.png " width="100%" alt="Imagen Principal">
</a>
</p>

## Caracteristicas ⚙️

### 📍 Módulo de Navegación 

- **Crear opciones**: Puedes crear nuevos enlaces de navegación agregando un nombre y un link.
- **Editar opciones**: Puedes editar a tú gustas los enlaces existentes.
- **Eliminar opciones**: Puedes eliminar enlaces de navegación.

### 📍 Módulo de Proyectos

- **Crear proyectos**: Puedes crear proyectos en el portafolio agregando su nombre, descripción, foto y URL de enlaces.
- **Editar proyectos**: Puedes editar la información de los proyectos existentes.
- **Eliminar opciones**: Puedes eliminar los proyectos no deseados.

### 📍 Módulo de Contacto

- **Editar el correo**: Puedes editar el correo principal por el cual te contactaran.
- **Crear enlaces sociales**: Puedes crear nuevos enlaces para que te contacten  agregando su nombre, link e icono.
- **Editar enlaces sociales**: Puedes editar la información de los enlaces existentes.
- **Eliminar enlaces sociales**: Puedes eliminar los enlaces no deseados.

### 📍 Módulo de Autenticación
- **Iniciar sesión**: Puedes loguearte en el sistema para poder tener acceso a las funcionalidades de edición que solo pertenecen a los usuarios registrados previamente.
- **Cerrar sesión**: Puedes salir del sistema con el botón de logout.


## Metodologías 🧾 
- **Metodología TDD**:  Se implementó dicha metodología para asegurar la funcionalidad  mediante pruebas unitarias de cada uno de los componentes que integran el proyecto.
- **Diseño Basado en Componentes**: Se desarrolló dividiendo las interfaces y funcionalidades en componentes reutilizables para un mejor mantenimiento y escalabilidad a futuro.
- **Diseño Responsive Design**:  Se utilizó tailwind para aplicar diseños adaptables tanto a pantallas móviles como de desktop.

## Tecnologías 💽
El stack TALL incluye las siguientes tecnologías:
- **Tailwind CSS:** Un framework de CSS que simplifica la creación de interfaces de usuario atractivas y altamente personalizables.
- **Alpine.js:** Un framework de JavaScript liviano que facilita la interactividad ágil en el frontend.
- **Livewire:**  Es una biblioteca de desarrollo web que permite agregar interactividad y reactividad a las aplicaciones web de PHP de manera sencilla y elegante.
- **Laravel:** Un framework de desarrollo backend en PHP que proporciona una base sólida y escalable para construir aplicaciones web.

<a href="https://tallstack.dev/" target="_blank">
<img src="https://raw.githubusercontent.com/kevincisnero01/larafolio-project/main/public/documentacion/stack.png" width="500" alt="Stack">
</a>

Paquetes:
- **SweeAlert2**: Se incorporó dicho paquete para mostrar implementar alertas, ventas modales y ventanas de confirmaciones.

## Instalación  🛠️
Para poder instalar **LarafolioDigital** solo es necesario contar con un servidor MySQL y un servidor Web. Si necesita instalarlo de manera local debe tener isntalado:
- Servidor que incluya PHP 8.0.2 y MySQL (Recomiendo [Laragon](https://laragon.org/download/index.html))
- Editor de código (Recomiendo [VSCode](https://code.visualstudio.com/download))
- Github Desktop ([Enlace](https://desktop.github.com/)) 
  

Pasos para configuracion:
1. Clonar repositorio de github

        git clone <url de repositorio>

2. Instalar dependencias

        composer install

3. Compilar assets

        npm run dev

4. Configurar .env 

5. Crear base de datos y ejecutar migraciones

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
