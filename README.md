===========================================================================
                              PROYECTO: LDST
===========================================================================

DESCRIPCIÓN GENERAL:
--------------------
Este repositorio contiene el desarrollo de una página web de una tienda online de camisetas de fútbol, creada en el marco de la asignatura **Laboratorio de Desarrollo de Sistemas Telemáticos (LDST)**.

La web permite a los usuarios navegar por las distintas categorías de camisetas, agregarlas al carrito, realizar compras y gestionar usuarios y productos desde una interfaz de administrador.

CONTENIDO DEL REPOSITORIO:
--------------------------
El repositorio se compone de múltiples archivos organizados de la siguiente manera:

1. **Frontend (Diseño y estructura visual):**
   - **CSS/**: Contiene las hojas de estilo para la apariencia de la web.
   - **JavaScript/**: Scripts de validación y funcionalidades dinámicas de la web.
   - **iconos/**: Recursos gráficos utilizados en la interfaz.

2. **Backend (Lógica del negocio y conexión a la base de datos):**
   - **index.php**: Página principal de la tienda.
   - **login.php**: Formulario de acceso de usuarios.
   - **registroUsuario.php**: Módulo de registro de usuarios.
   - **productos.php**: Página de listado de productos.
   - **verCarrito.php**: Módulo de visualización del carrito de compras.
   - **tramitarCarrito.php**: Gestión de la compra y finalización del pedido.
   - **buscarPalabra.php**: Búsqueda de productos en la tienda.
   - **filtro.php**: Implementación de filtros de búsqueda.
   - **mostrarCamisetas.php**: Módulo que carga las camisetas disponibles en la tienda.
   - **mostrarUsuarios.php**: Módulo de gestión de usuarios (solo para administradores).
   - **eliminarCamiseta.php / modificarCamiseta.php**: Gestión de productos por el administrador.

3. **Base de Datos:**
   - **ConexBD.php**: Archivo de conexión con la base de datos.
   - **ConexBD_cam.sql**: Script de la base de datos con las tablas y registros iniciales.

4. **Secciones y componentes de la web:**
   - **head.php / header.php / footer.php / aside.php**: Archivos reutilizables que componen la estructura visual.
   - **laliga.php / premier.php / ligas.php**: Secciones específicas para diferentes competiciones.

REQUISITOS Y EJECUCIÓN:
-----------------------
- **Tecnologías utilizadas:**
  - **Frontend:** HTML, CSS, JavaScript.
  - **Backend:** PHP.
  - **Base de Datos:** MySQL.
- **Requisitos previos:**
  - Servidor local como XAMPP, WAMP o un hosting con soporte PHP y MySQL.
  - Importar el archivo `ConexBD_cam.sql` en MySQL.

- **Cómo ejecutar el proyecto:**
  1. Clonar o descargar el repositorio.
  2. Configurar el servidor local y la base de datos.
  3. Acceder a `index.php` desde el navegador.

OBSERVACIONES:
--------------
- La página permite la gestión de productos y usuarios mediante un panel de administración.
- Se pueden realizar búsquedas de camisetas y aplicar filtros para facilitar la navegación.
- Incluye un sistema de autenticación para usuarios y administradores.
- Proyecto desarrollado como parte de la asignatura LDST.

===========================================================================
                             FIN DEL README
===========================================================================


