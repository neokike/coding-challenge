#Cube Summation

Para la implementación de este Coding Challenge se uso el framework de ```PHP``` ```Laravel``` 
para el backend y ```angularJs``` para el frontend, A continuación se describira brevemente cada uno de los
componentes de la Aplicación:

##Backend
###Capas de la Aplicación

1. Capa de rutas: se definen las distintas rutas o endpoints de la aplicación
2. Capa de Controladores: Cada request a las rutas registradas es servida por un metodo especifico dentro del controlador,
los controladores nos sirven para unir los distintos modulos que hacen vida en la aplicación (Vista, Logica de negocio, etc)
3. Vistas: esta capa es la responsable de renderizar las vistas o documentos ```HTML``` de la aplicación, para ello se uso ```Blade``` como motor
para la construccion de la vista.
4. Capa de Aplicación: la logica de negocio se abstrajo a clases especifica cada una con sus responsabilidades bien definidas.
    1. Clase Cubo: representa el punto de entrada para llevar a cabo todas las operaciones en el cubo, esta clase tiene como responsabilidad
  la inicialización de la matriz de cubo, ejecucion de las operaciones y guarda todos los datos relevantes de la prueba (matriz, sumas). 
    2. Operaciones: existen dos operaciones que se pueden realizar, Query y Update cada una de estas operaciones se abstrajo a su clase especifica
  ambas suscrita a la interfaz de CuboOperacionInterface lo cual nos permite establecer una forma unica para ejecutar una operacion en el cubo,
  esto nos da como ventaja la posibilidad de agregar nuevas operaciones sin estar modificando el codigo de la clase principal (Cubo) respetando el 
  principio de Open/Close, ademas que le otorgamos una responsabilidad unica a cada clase.

##Frontend

Para el frontend se utilizo ```AngularJs``` como framework de javascript para organizar el código y hacer la aplicación
dinamica, tambien se uso ```Bootstrap``` como framework Css para los estilos, por otro lado se uso ```Gulp+Elixir``` como task runner para concantenar los 
archivos de ```Javascript``` y para compilar los archivos de estilos ```Sass```

La aplicacion se estructuró en tres archivos principales App.js que sirve para instanciar el modulo y configuración global de la aplicación,
AppCtrl.js el cual es el controlador principal de la aplicación donde se definen las interacciones de la vista y AppService.js donde se realiza la llamada a la API.

Se usaron los siguientes modulos:

1. Toastr: para mostrar notificaciones.
2. Validation: para validar el formulario a nivel de frontend.
3. Vs-repeat: virtual scrolling para mejorar el rendimiento con grandes volumenes de datos.
     
##Instrucciones de instalación

1. Clonar el repositorio.
2. ejecutar el comando ```composer install```

##Pruebas unitarias 

Se utilizo ```phpunit``` como suite de pruebas. 
  