# Peer Support Argentina - WordPress Theme

Un tema de WordPress profesional y elegante para Peer Support Argentina, organización dedicada a la investigación y formación sobre el tratamiento del TOC (Trastorno Obsesivo Compulsivo).

## 📋 Características

- **Diseño Minimalista**: Paleta de colores calmada y profesional (Teal, Verde Salvia, Beige Cálido)
- **Responsive**: Diseño adaptativo para todos los dispositivos
- **Custom Post Type**: Tipo de contenido personalizado para Cursos
- **Theme Customizer**: Opciones personalizables para redes sociales y contacto
- **SEO Optimizado**: Estructura semántica y meta tags apropiados
- **Inspiración Editorial**: Diseño de blog inspirado en The New York Times

## 🚀 Instalación

### Requisitos
- WordPress 6.0 o superior
- PHP 7.4 o superior
- MySQL 5.7 o superior

### Pasos de Instalación

1. **Copiar el theme a WordPress**:
   ```bash
   # Copiar la carpeta peersupport-theme a wp-content/themes/
   cp -r peersupport-theme /ruta/a/wordpress/wp-content/themes/
   ```

2. **Activar el theme**:
   - Ir a `Apariencia → Temas` en el dashboard de WordPress
   - Buscar "Peer Support Argentina"
   - Click en "Activar"

3. **Configurar menús**:
   - Ir a `Apariencia → Menús`
   - Crear un nuevo menú llamado "Primary Menu"
   - Agregar páginas: Inicio, Sobre Nosotros, Cursos, Blog, Contacto
   - Asignar al location "Primary Menu"
   - (Opcional) Crear menú para footer y asignarlo a "Footer Menu"

4. **Configurar página de inicio**:
   - Ir a `Configuración → Lectura`
   - Seleccionar "Una página estática"
   - Elegir la página "Inicio" como página de inicio
   - Elegir una página para "Página de entradas" (blog)

5. **Crear páginas necesarias**:
   - Crear página "Inicio" (se usará `front-page.php`)
   - Crear página "Sobre Nosotros"
   - Crear página "Cursos" y asignarle el template "Cursos Page"
   - Crear página "Contacto"

## 🎨 Personalización

### Theme Customizer

Ir a `Apariencia → Personalizar` para configurar:

#### Redes Sociales
- URL de Instagram
- URL de Facebook
- URL de Twitter
- Número de WhatsApp (formato: 5491112345678)

#### Información de Contacto
- Email de contacto
- Ubicación

### Cursos (Custom Post Type)

1. **Crear un nuevo curso**:
   - Ir a `Cursos → Agregar Nuevo`
   - Completar título y descripción
   - Agregar imagen destacada
   - Completar campos personalizados:
     - **Duración**: Ej. "8 semanas"
     - **Público Objetivo**: Ej. "Profesionales"
     - **Precio**: Ej. "$49.99 USD" o "A confirmar"
     - **URL de Hotmart**: Link completo a la página de venta
     - **Badge**: Seleccionar "Próximamente", "Disponible" o "Agotado"

2. **Los cursos se mostrarán automáticamente** en la página "Cursos"

## 📁 Estructura de Archivos

```
peersupport-theme/
├── style.css              # Hoja de estilos principal con header del theme
├── functions.php          # Funciones del theme y configuración
├── header.php             # Header y navegación
├── footer.php             # Footer
├── index.php              # Template para blog listing
├── front-page.php         # Template para página de inicio
├── page.php               # Template para páginas genéricas
├── single.php             # Template para posts individuales
├── archive.php            # Template para archivos del blog
├── page-cursos.php        # Template para página de cursos
├── css/                   # Archivos CSS
│   ├── styles.css         # Estilos principales
│   ├── blog.css           # Estilos del blog
│   ├── contact.css        # Estilos de contacto
│   ├── courses.css        # Estilos de cursos
│   └── social-sidebar.css # Estilos de barra lateral social
└── js/                    # Archivos JavaScript
    └── main.js            # JavaScript principal
```

## 🎯 Uso

### Crear Contenido

1. **Posts del Blog**:
   - Ir a `Entradas → Añadir nueva`
   - Agregar título, contenido e imagen destacada
   - Publicar

2. **Páginas**:
   - Ir a `Páginas → Añadir nueva`
   - Agregar contenido
   - (Opcional) Agregar imagen destacada para hero section
   - Publicar

3. **Cursos**:
   - Ir a `Cursos → Agregar Nuevo`
   - Completar todos los campos
   - Publicar

### Menús

El theme soporta dos ubicaciones de menú:
- **Primary Menu**: Menú principal en el header
- **Footer Menu**: Menú en el footer

## 🔧 Desarrollo

### Modificar Estilos

Los estilos están organizados en:
- `css/styles.css`: Variables CSS, reset, tipografía, layout, componentes
- `css/blog.css`: Estilos específicos del blog
- `css/contact.css`: Estilos del formulario de contacto
- `css/courses.css`: Estilos de la página de cursos
- `css/social-sidebar.css`: Estilos de la barra lateral social

### Modificar JavaScript

El archivo `js/main.js` contiene:
- Navegación mobile
- Efectos de scroll
- Smooth scrolling
- Animaciones con Intersection Observer
- Validación de formularios

## 📝 Notas

- Las imágenes placeholder de Unsplash deben ser reemplazadas con imágenes reales
- Se recomienda usar un plugin de formularios como Contact Form 7 para la página de contacto
- El theme está preparado para traducción (text domain: 'peersupport')
- Los cursos se integran con Hotmart mediante links externos

## 🆘 Soporte

Para problemas o preguntas sobre el theme, contactar a: info@peersupport.org.ar

## 📄 Licencia

GNU General Public License v2 or later
