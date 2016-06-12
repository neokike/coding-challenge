app.factory('appService', ['$http', function ($http) {

    return {
        ejecutarPruebas: function (form) {
            return $http.post('/ejecutar', form);
        }
    }
}]);