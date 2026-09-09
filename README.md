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

1. Tener familias registradas. Existen productos diferentes, los cuales tienen en común que pertenecen a un mismo origen/familia de las que se especializan para un uso en concreto, ejemplo: Drago son los productos de hornos, calentadores, etc. Icehaus son distintos tipos de refrigeración.

<img align="right" src="httpshttps://raw.githubusercontent.com/Lyuz9/Pronostico-ventas/refs/heads/main/img/1.png" width="90%">
