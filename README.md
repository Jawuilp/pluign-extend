# Responsiva PDF

**Plugin para generar PDFs de cartas responsivas en GLPI.**

Este plugin permite generar un documento PDF de carta responsiva para equipos y herramientas directamente desde GLPI. Utiliza la librería [TCPDF](https://tcpdf.org/) para crear documentos PDF personalizables.

## Características

- **Generación de PDF:** Crea cartas responsivas en formato PDF.
- **Integración con GLPI:** Se integra de forma nativa en GLPI y añade una opción en los tickets para generar la carta responsiva.
- **Personalización:** El formato y contenido del PDF son personalizables a través del código fuente.
- **Compatibilidad:** Desarrollado para GLPI a partir de la versión 10.0.0.

## Requisitos

- **GLPI:** Versión 10.0.0 o superior.
- **PHP:** Versión 7.2 o superior.
- **TCPDF:** La librería se incluye en el paquete o puede instalarse vía Composer.

## Instalación

1. **Descarga** el plugin:
   - [ZIP del repositorio](https://github.com/Jawuilp/pluign-extend/archive/refs/heads/main.zip)

2. **Extrae** el paquete descargado en el directorio de plugins de GLPI:
   ```
   glpi/plugins/
   ```
   Asegúrate de que la carpeta se llame `responsiva`.

3. **Activa** el plugin desde el panel de administración de GLPI:
   - Ve a **Configuración** > **Plugins**.
   - Busca **Responsiva PDF** y haz clic en **Instalar** y luego en **Activar**.

## Uso

1. Navega hasta un ticket en GLPI.
2. Si tienes los permisos necesarios, verás la opción "Generar Carta Responsiva" en el menú de acciones del ticket.
3. Al hacer clic en la opción, se generará y mostrará en el navegador el PDF con la carta responsiva.

## Personalización

- **Plantilla del PDF:**  
  El archivo principal de la generación del PDF se encuentra en `pdf/responsiva_pdf.php`.  
  Puedes modificar los métodos `Header()`, `Footer()` y `buildHTML()` para personalizar la apariencia y el contenido del documento.

- **Datos del ticket:**  
  El archivo `front/responsiva.php` se encarga de obtener los datos del ticket y generar el PDF. Puedes adaptar la forma en que se recogen y formatean esos datos según tus necesidades.

## Contribución

Si deseas mejorar este plugin o reportar errores, las contribuciones son bienvenidas. Puedes:
- Reportar issues en [GitHub Issues](https://github.com/Jawuilp/pluign-extend/issues).
- Hacer un _fork_ del repositorio y enviar _pull requests_ con tus mejoras.

## Licencia

Este plugin se distribuye bajo la licencia **GPLv3**.

## Contacto

Para más información, visita la página del plugin:
- [Repositorio en GitHub](https://github.com/Jawuilp/pluign-extend)

---

*Este plugin fue desarrollado para proporcionar una solución sencilla y eficaz en la generación de cartas responsivas en GLPI.* 