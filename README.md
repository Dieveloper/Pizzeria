# 🍕 Hungrys - Sistema de Gestión de Pizzería

Plataforma Full Stack desarrollada con **Vanilla PHP** para la gestión integral de una pizzería. El sistema permite desde la navegación de clientes y gestión de pedidos hasta un panel administrativo para el control de stock y usuarios.

## 🚀 Instalación y Despliegue

Sigue estos pasos para instalar el proyecto en un entorno local (XAMPP/WAMP):

### 1. Configuración de la Base de Datos
El proyecto incluye un script de automatización para generar la estructura necesaria:
1. Asegúrate de tener activo tu servidor MySQL.
2. Ejecuta en el navegador: `http://localhost/tu-carpeta/instalar.php`.
3. El script creará la base de datos `hungrys`, todas las tablas y las relaciones de claves foráneas automáticamente.

### 2. Archivo de Configuración
Para que el sistema conecte con la base de datos, debes asegurarte de tener un archivo de configuración (normalmente fuera de htdocs) con las credenciales de tu servidor:
* **Host:** `localhost`
* **Usuario:** `root`
* **Password:** (vacío por defecto en XAMPP)
* **DB Name:** `hungrys`

> **Nota:** Por seguridad, los archivos que contienen credenciales de base de datos (`configuracion.php`) no se suben al repositorio. Deberás crearlo manualmente en tu servidor siguiendo la estructura del proyecto.

## 👤 Acceso Predefinido

Tras ejecutar `instalar.php`, se crea automáticamente una cuenta de administrador para gestionar el sitio:
* **Email:** `admin@gmail.com`
* **Password:** `1234`

## 🛠️ Funcionalidades Principales

### Para Clientes:
* **Registro y Login:** Seguridad mediante cifrado de contraseñas con BCRYPT.
* **Gestión de Direcciones:** Posibilidad de añadir múltiples direcciones y marcar una como predeterminada.
* **Pedidos:** Carrito de compras y selección de tipo de entrega (reparto o recogida).
* **Historial:** Consulta de pedidos realizados anteriormente.

### Para Administradores (Panel de Control):
* **Gestión de Categorías:** Crear y organizar los grupos de productos (Pizzas, Pastas, etc.).
* **Gestión de Productos:** Alta, edición y eliminación de platos, incluyendo subida de imágenes y descripción.
* **Control de Usuarios:** Visualización de la lista de clientes registrados.

## 📐 Estructura de Datos (Normalizada)
El sistema utiliza un modelo relacional robusto con integridad referencial:
* **Clientes y Direcciones:** Relación 1:N con soporte para dirección predeterminada.
* **Pedidos y Líneas de Pedido:** Estructura que permite el desglose detallado de cada compra con precios e IVA (21%) calculados.
* **Integridad:** Uso de `ON DELETE CASCADE` y `ON DELETE SET NULL` para mantener la base de datos limpia.