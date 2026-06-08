# 📚 Librería Verso & Tinta

Proyecto de práctica para aprender más sobre el consumo de APIs e implementar una plataforma de pagos en un entorno web real.

---

## 📝 Descripción

**Verso & Tinta** es una aplicación web de librería desarrollada como ejercicio de aprendizaje. Su objetivo principal es practicar la integración de APIs externas y la implementación de pasarelas de pago dentro de una plataforma funcional.

---

## ✨ Funcionalidades

### 📖 Gestión de Libros y Categorías
- **Panel de administración** con estadísticas y métricas del sistema
- **CRUDs completos** para la gestión de libros
- **Asociación de múltiples autores** por libro
- **Clasificación por categorías**

### 🔍 Búsqueda y Descubrimiento
- **Buscador avanzado** de libros con filtrado por:
  - 📕 Título del libro
  - 🆔 ISBN
  - 👤 Autor
  - 📂 Categoría
- **Autocompletado inteligente** para búsquedas rápidas
- **Sugerencias en tiempo real** mientras escribes

### 🛒 Carrito de Compra
- **Agregar y eliminar libros** del carrito
- **Modificar cantidades** de productos
- **Cálculo automático** de totales y subtotales
- **Persistencia de datos** en sesión

### ❤️ Lista de Deseos
- **Guardar libros favoritos** para consultar después
- **Gestión completa** de deseos (añadir/eliminar)

### 💳 Pasarela de Pagos
- **Integración con PayPal** para pagos seguros
- **Procesamiento de pedidos** de manera segura
- **Confirmación de compra** inmediata

### 📧 Automatización de Correos
- **Notificaciones por email** de confirmación de compra
- **Integración con n8n** para automatización de flujos
- **Servicio de email** con MailTrap para testing
- **Emails personalizados** según tipo de evento

### 📚 Integración con Open Library API
- **Alimentación automática** de la base de datos con títulos reales
- **Obtención de metadatos** de libros (título, autor, ISBN, descripción)
- **Datos precisos y actualizados** de títulos publicados

#### Endpoints disponibles

| Método | Ruta | Descripción | Ejemplo |
|--------|------|-------------|---------|
| `GET` | `/importar` | Importa 40 libros aleatorios de diversos temas | `GET /importar` |
| `GET` | `/importar/{query}` | Busca e importa libros por palabra clave | `GET /importar/harry+potter` |
| Artisan | `php artisan libros:importar` | Importa libros aleatorios desde consola | `php artisan libros:importar` |
| Artisan | `php artisan libros:importar {query}` | Busca libros desde consola | `php artisan libros:importar "mystery"` |

#### Ejemplos de búsqueda

```
GET /importar/ciencia+ficcion
GET /importar/isabel+allende
GET /importar/python+programming
GET /importar/filosofia
```

> Open Library API es pública y no requiere API key.

---

## 🛠️ Tecnologías utilizadas

| Tecnología | Uso |
|---|---|
| **Laravel** | Framework backend principal |
| **PHP** | Lenguaje de servidor |
| **MySQL** | Base de datos relacional |
| **Tailwind CSS** | Estilos y diseño de la interfaz |
| **JavaScript** | Interactividad en el frontend |
| **HTML** | Estructura de las vistas |
| **n8n** | Automatización de flujos y workflows |
| **Open Library API** | Fuente de datos de libros y metadatos |
| **MailTrap** | Servicio de email para testing |
| **PayPal API** | Procesamiento de pagos online |

---

## ⚙️ Instalación

```bash
# Clonar el repositorio
git clone <url-del-repositorio>
cd Libreria

# Instalar dependencias PHP
composer install

# Instalar dependencias Node
npm install

# Configurar variables de entorno
cp .env.example .env
php artisan key:generate

# Ejecutar migraciones
php artisan migrate

# Compilar assets
npm run dev
```

---

## 🚀 Uso

```bash
# Servidor de desarrollo
php artisan serve

# Compilar assets en modo watch
npm run dev

# Importar libros desde Open Library (consola)
php artisan libros:importar                 # 40 aleatorios
php artisan libros:importar "harry potter"  # por búsqueda
```
