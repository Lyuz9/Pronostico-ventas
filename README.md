# Pronostico-ventas
📊 Sistema de Pronósticos de Ventas — Euroquip

📝 ¿De qué trata este proyecto?
Lo creé como una herramienta interna para la empresa Euroquip, que se dedica a fabricar y entregar todo tipo de equipos gastronómicos. Su objetivo es ayudar al equipo de ventas a pronosticar cuántos equipos van a vender, de una forma mucho más ordenada y rápida.

⚠️ Nota importante: Esta aplicación es solo para el personal de ventas de la empresa. No es una página abierta al público.

🛠️ ¿Con qué está hecho?
PHP, HTML, CSS y JavaScript
Base de datos MySQL
Conexión con el sistema SAP
Dashboard usando powerbi
Versión mejorada con el framework Laravel

🎯 ¿Para qué se hizo?
Antes, todos compartían pronósticos en archivos de Excel que se pasaban entre vendedores. Esto causaba muchos problemas: se hacían muy pesados, tardaban en abrir, se perdía información o se dañaban cuando varios los usaban al mismo tiempo.
La idea fue reemplazar esos archivos por una página web, para que todo funcione de forma ordenada, sin retrasos y sin riesgo de perder la información.

⚙️ ¿Cómo funciona?
La página se conecta al sistema SAP para traer lo necesario: la lista de familias de productos, los productos vigentes y el registro de cada vendedor. Esa información se guarda en una base de datos propia, así que desde aquí se pueden hacer los pronósticos, generar reportes y ver los totales de ventas sin tener que entrar directamente a SAP.

💡 Mi versión mejorada (con Laravel)
Como la información que se maneja es delicada, desarrollé una versión mejorada que hace todo lo mismo que la herramienta original, pero mejor. Aquí optimicé el código, apliqué buenas prácticas y usé Laravel para que todo sea más seguro y fácil de mantener.

ℹ️ Un detalle: Esta versión no se conecta directamente a SAP, pero igual funciona perfectamente para que los vendedores puedan trabajar sin que se les trabe o tarde, eliminando por completo los problemas que tenían con los archivos de Excel.

🤝 En pocas palabras
Es una herramienta pensada para el día a día del equipo de ventas: más rápida, más ordenada y más confiable que los archivos compartidos de antes. Se eliminan las esperas, se cuida la información y se facilita todo el trabajo de pronósticos y reportes.

### 1. Gestión de Familias de Productos
Existen productos diferentes que comparten un mismo origen o familia, y se especializan en un uso concreto. Por ejemplo: la familia **Drago** agrupa productos como hornos, calentadores, etc.; mientras que **Icehaus** incluye distintos tipos de equipos de refrigeración.

<img src="https://github.com/Lyuz9/Pronostico-ventas/blob/main/img/1.png" width="80%">

---

### 2. Listado de Productos
Se muestran los productos relacionados con su respectiva familia a la que pertenecen.

<img src="https://github.com/Lyuz9/Pronostico-ventas/blob/main/img/2.png" width="80%">

---

### 3. Creación de Pronósticos
El apartado de pronósticos funciona mediante la consulta de usuarios registrados en la plataforma. El flujo es el siguiente:

- ✅ Seleccionar un usuario que funge como **vendedor**.
- ✅ Seleccionar una **familia de productos**.
- ✅ Se cargarán automáticamente **todos los productos relacionados** con esa familia.
- ✅ Seleccionar los productos mediante **casillas de verificación** para incluirlos en el pronóstico.
- ✅ Ingresar la **cantidad estimada a vender**, desglosada por los meses correspondientes.

<img src="https://github.com/Lyuz9/Pronostico-ventas/blob/main/img/3.png" width="80%">

---

### 4. Visualización de Pronósticos Registrados
Permite consultar y visualizar todos los pronósticos ya guardados en la base de datos.

<img src="https://github.com/Lyuz9/Pronostico-ventas/blob/main/img/4.png" width="100%">

---

## 🚧 Mejoras y funcionalidades en desarrollo

> ⚠️ Esta versión mejorada desarrollada en **Laravel** sigue en proceso de actualización. Se agregarán próximamente funcionalidades que no disponía la versión original, tales como:
> - Exportar pronósticos a **Excel y PDF**.
> - Cálculo automático de **totales por producto** entre todos los pronósticos de todos los vendedores.
> - Panel de control con **gráficos estadísticos** (estilo Power BI).
