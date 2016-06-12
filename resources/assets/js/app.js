var app = angular.module('app', ['validation', 'validation.rule', 'toastr']);

app.config(['$validationProvider', function ($validationProvider) {

    $validationProvider.setValidMethod('watch');
    $validationProvider.showSuccessMessage = false;
    $validationProvider
        .setExpression({
            required: function (value) {
                return value != null && value != undefined;
            },
            number: /^-?\d+$/,
            menorIgualA: function (value, scope, element, attrs, param) {
                return parseInt(value) <= parseInt(param);
            },
            mayorIgualA: function (value, scope, element, attrs, param) {
                return parseInt(value) >= parseInt(param);
            }
        })
        .setDefaultMsg({
            menorIgualA: {
                error: 'El numero debe ser menor.'
            },
            mayorIgualA: {
                error: 'El numero debe ser mayor.'
            },
            required: {
                error: 'Campo Requerido.'
            },
            number: {
                error: 'El campo debe ser un numero.'
            }
        });

}]);