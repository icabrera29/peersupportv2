# Guía de Migración a DigitalOcean

Esta guía te explicará paso a paso cómo llevar tu sitio web de WordPress desde tu entorno local a un servidor en DigitalOcean (VPS).

## 🛠️ Herramientas Recomendadas

Para hacer este proceso lo más simple y seguro posible, utilizaremos:
1.  **DigitalOcean Marketplace**: Para instalar un servidor con WordPress ya configurado (OpenLiteSpeed o Apache).
2.  **Plugin All-in-One WP Migration**: Para mover todo el contenido (base de datos, archivos, plugins, theme) sin complicaciones técnicas.

---

## Paso 1: Crear el Servidor (Droplet) en DigitalOcean

1.  Inicia sesión en [DigitalOcean](https://cloud.digitalocean.com/).
2.  Ve a **Create** (botón verde arriba) -> **Droplets**.
3.  En la pestaña **Marketplace**, busca "WordPress".
    *   *Recomendación*: Selecciona **WordPress on Ubuntu** (la versión estándar es suficiente).
4.  Elige un plan ("Size").
    *   Para un sitio institucional como Peer Support, el plan **Basic** de **$6/mes** (1GB RAM / 1 CPU) suele ser suficiente para empezar.
5.  Elige la región tal datacenters (Choose a datacenter region).
    *   Selecciona la más cercana a tu audiencia (ej. New York o San Francisco si estás en Latam, o Londres si estás en Europa).
6.  Elige una contraseña segura para el acceso `root` o usa llaves SSH (Authentication Method).
7.  Dale un nombre al Droplet (ej: `peersupport-web`) y haz clic en **Create Droplet**.

⏳ *Espera unos minutos a que se cree el servidor. Te darán una dirección IP (ej: 143.198.xxx.xxx).*

---

## Paso 2: Configurar WordPress en el Servidor

1.  Copia la dirección IP de tu nuevo Droplet.
2.  Abre esa IP en tu navegador (ej: `http://143.198.xxx.xxx`).
3.  Verás que te pide completar la instalación de WordPress:
    *   Elige el idioma (Español).
    *   Ponle título al sitio ("Peer Support Argentina").
    *   Crea un usuario administrador **distinto** al de tu local (por seguridad) o usa el mismo si prefieres.
    *   **Importante**: En "Visibilidad para los buscadores", marca "Disuade a los motores de búsqueda" por ahora (lo desmarcaremos al final).
4.  Instala y accede al escritorio de WordPress de tu nuevo servidor.

---

## Paso 3: Preparar la Migración

### En tu sitio LOCAL:
1.  Ve a `Plugins -> Añadir nuevo`.
2.  Busca e instala **All-in-One WP Migration**.
3.  Actívalo.
4.  Ve al menú `All-in-One WP Migration -> Exportar`.
5.  Haz clic en **Exportar a** -> **Archivo**.
6.  Espera a que termine y descarga el archivo `.wpress` a tu computadora.
    *   *Nota: Este archivo contiene TODO tu sitio (imágenes, base de datos, theme, usuarios).*

### En tu sitio de DIGITALOCEAN:
1.  Ve a `Plugins -> Añadir nuevo`.
2.  Busca e instala **All-in-One WP Migration**.
3.  Actívalo.
4.  Ve al menú `All-in-One WP Migration -> Importar`.
5.  Arrastra el archivo `.wpress` que descargaste de tu local.
6.  Sigue las instrucciones en pantalla.
    *   ⚠️ **Advertencia**: El plugin te avisará que sobrescribirá todo. Esto es correcto.
7.  Una vez finalizado, te pedirá que **guardes los enlaces permanentes**.
    *   **IMPORTANTE**: Ahora deberás iniciar sesión con **tu usuario y contraseña del sitio LOCAL** (el usuario que creaste en el Paso 2 del servidor se habrá borrado).

---

## Paso 4: Configurar el Dominio (DNS)

Para que la gente entre escribiendo `peersupport.org.ar` y no la IP numérica:

1.  Ve a donde compraste tu dominio (ej: Nic.ar, Namecheap, GoDaddy).
2.  Busca la configuración de **DNS** o **Nameservers**.
3.  Tienes dos opciones:

    **Opción A: Usar los DNS de DigitalOcean (Recomendado)**
    *   Cambia los Nameservers en tu registrador por:
        *   `ns1.digitalocean.com`
        *   `ns2.digitalocean.com`
        *   `ns3.digitalocean.com`
    *   Luego en DigitalOcean, ve a la sección **Networking** -> **Domains**, agrega `peersupport.org.ar` y asígnalo a tu Droplet.

    **Opción B: Apuntar el Registro A (Más rápido si ya tienes DNS)**
    *   En tu registrador actual, edita el **Registro A** (A Record).
    *   Host: `@`
    *   Valor: `Tu Dirección IP de DigitalOcean`.

⏳ *La propagación de DNS puede tardar desde minutos hasta 24hs.*

---

## Paso 5: Certificado SSL (El candadito verde 🔒)

Una vez que tu dominio ya apunte a tu servidor (puedes probar entrando al dominio), instala el certificado de seguridad gratuito Let's Encrypt.

1.  Abre la consola de comandos de tu Droplet (puedes usar la consola web de DigitalOcean o Terminal en tu PC: `ssh root@tu-ip`).
2.  Si usaste la imagen de Marketplace, generalmente al entrar por SSH te mostrará un asistente.
3.  Si no, ejecuta: `certbot --apache` (o `certbot --nginx` dependiendo del servidor).
4.  Sigue las instrucciones, ingresa tu email y selecciona tu dominio.
5.  Elige la opción "Redirect" para forzar HTTPS.

---

## Paso 6: Ajustes Finales

1.  Entra al administrador de tu sitio (ahora ya con el dominio final).
2.  **Email**: Configura tu API Key de Resend en el plugin que creamos (`Configuración -> Formulario de Contacto`).
    *   *Recuerda validar tu dominio en el panel de Resend para salir del modo "Testing".*
3.  **Visibilidad**: Ve a `Ajustes -> Lectura` y **desmarca** la casilla "Disuade a los motores de búsqueda" para que Google empiece a indexarte.
4.  Revisa que todos los formularios y enlaces funcionen correctamente.

¡Felicitaciones! Tu sitio ya está en producción. 🚀
