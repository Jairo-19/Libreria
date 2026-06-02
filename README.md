# 📚 Librería Verso & Tinta

Proyecto de práctica para aprender más sobre el consumo de APIs e implementar una plataforma de pagos en un entorno web real.

---

## 📝 Descripción

**Verso & Tinta** es una aplicación web de librería desarrollada como ejercicio de aprendizaje. Su objetivo principal es practicar la integración de APIs externas y la implementación de pasarelas de pago dentro de una plataforma funcional.

---

## ✨ Funcionalidades

- **Panel de administración** con estadísticas y métricas del sistema
- **CRUDs completos** para la gestión de libros, autores y categorías
- **Buscador** de libros integrado en la plataforma

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
```
