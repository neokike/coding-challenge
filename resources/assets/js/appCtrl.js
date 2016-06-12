app.controller('appCtrl', ['toastr', 'appService', function (toastr, appService) {

    var vm = this;
    vm.form = {
        size: 1,
        pruebas: []
    };

    vm.operaciones = [
        {
            nombre: 'Update'
        },
        {
            nombre: 'Query'
        }
    ];


    vm.agregarPrueba = function () {

        if (vm.form.pruebas.length <= 50) {
            vm.form.pruebas.push({
                operaciones: [{
                    operacion: 'Update',
                    params: {
                        x: 0,
                        y: 0,
                        z: 0,
                        valor: 0
                    }
                }]
            })
        } else {
            toastr.error('No puede agregar mas de 50 pruebas')
        }
    };

    vm.agregarOperacion = function (prueba) {

        if (prueba.operaciones.length <= 1000) {
            prueba.operaciones.push({
                operacion: 'Update',
                params: {
                    x: 0,
                    y: 0,
                    z: 0,
                    valor: 0
                }
            })
        } else {
            toastr.error('No puede agregar mas de 1000 operaciones')
        }
    };

    vm.cambioOperacion = function (operacion) {
        if (operacion.operacion == 'Update') {
            operacion.params = {
                x: 0,
                y: 0,
                z: 0,
                valor: 0
            }
        } else {
            operacion.params = {
                x: 0,
                y: 0,
                z: 0,
                x2: 0,
                y2: 0,
                z2: 0
            }
        }
    };

    vm.ejecutar = function () {

        if (!vm.form.pruebas.length) {
            toastr.error('Debe agregar por lo menos una prueba');
        } else {
            appService.ejecutarPruebas(vm.form).then(function (resultados) {

            }).catch(function (error) {


            })
        }
    }
}]);