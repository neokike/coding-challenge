app.controller('appCtrl', ['toastr', 'appService', function (toastr, appService) {

    var vm = this;
    vm.form = {
        pruebas: []
    };
    vm.ejecutando = false;

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
                size: 1,
                operaciones: [{
                    operacion: 'Update',
                    params: {
                        x: 1,
                        y: 1,
                        z: 1,
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
                    x: 1,
                    y: 1,
                    z: 1,
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
                x: 1,
                y: 1,
                z: 1,
                valor: 0
            }
        } else {
            operacion.params = {
                x: 1,
                y: 1,
                z: 1,
                x2: 1,
                y2: 1,
                z2: 1
            }
        }
    };

    vm.borrarPrueba = function (index) {
        vm.form.pruebas.splice(index, 1);
    };

    vm.borrarOperacion = function (prueba, operacion) {
        var index = prueba.operaciones.indexOf(operacion);
        prueba.operaciones.splice(index, 1);
    };

    vm.ejecutar = function () {

        if (!vm.form.pruebas.length) {
            toastr.error('Debe agregar por lo menos una prueba');
        } else {
            vm.ejecutando = true;
            vm.resultados = [];
            appService.ejecutarPruebas(vm.form).then(function (resultados) {
                vm.resultados = resultados.data.resultados;
            }).catch(function (error) {
                if (error.status == 400) {
                    toastr.error(error.data.error);
                }
            }).finally(function () {
                vm.ejecutando = false;
            })
        }
    }
}]);