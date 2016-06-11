<!DOCTYPE html>
<html>
<head>
    <title>Pedro Gorrin</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body ng-app="app">
<div class="container" ng-controller="appCtrl as vm">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h2>Cube Summation</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form class="form" name="cubeForm">
                <div class="form-group">
                    <label for="size" class="control-label">Tamaño del Cubo</label>
                    <input type="number" ng-model="vm.form.size"
                           validator="required,number,mayorIgualA=1,menorIgualA=100"
                           name="size" class="form-control">
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 ng-if="!vm.form.pruebas.length">Debe agregar una prueba</h3>

                        <div ng-if="vm.form.pruebas.length">
                            <div class="panel panel-default" ng-repeat="prueba in vm.form.pruebas track by $index">
                                <div class="panel-heading">Prueba @{{ $index + 1 }}</div>
                                <div class="panel-body">
                                    <div class="row" ng-repeat="operacion in prueba.operaciones  track by $index">
                                        <div class="col-xs-12 col-md-4">
                                            <label for="">Operación @{{ $index + 1 }}</label>
                                            <select name="operacion" class="form-control" ng-model="operacion.operacion"
                                                    ng-options="op.nombre as op.nombre for op in vm.operaciones"
                                                    ng-change="vm.cambioOperacion(operacion)">
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-md-8" ng-if="operacion.operacion=='Update'">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-3">
                                                    <label for="">X</label>
                                                    <input class="form-control" name="@{{'x'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.x">
                                                </div>
                                                <div class="col-xs-12 col-md-3">
                                                    <label for="">Y</label>
                                                    <input class="form-control" name="@{{'y'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.y">
                                                </div>
                                                <div class="col-xs-12 col-md-3">
                                                    <label for="">Z</label>
                                                    <input class="form-control" name="@{{'z'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.z">
                                                </div>
                                                <div class="col-xs-12 col-md-3">
                                                    <label for="">Valor</label>
                                                    <input class="form-control" name="@{{'valor'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.valor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-8" ng-if="operacion.operacion=='Query'">

                                            <div class="row">
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">X1</label>
                                                    <input class="form-control" name="@{{'x'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.x">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">Y1</label>
                                                    <input class="form-control" name="@{{'y'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.y">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">Z1</label>
                                                    <input class="form-control" name="@{{'z'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.z">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">X2</label>
                                                    <input class="form-control" name="@{{'x2'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.x2">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">Y2</label>
                                                    <input class="form-control" name="@{{'y2'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.y2">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">Z2</label>
                                                    <input class="form-control" name="@{{'y2'+$index }}"
                                                           type="text"
                                                           validator="required,number"
                                                           ng-model="operacion.params.z2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-right">
                                            <button class="btn btn-info margin-top"
                                                    ng-click="vm.agregarOperacion(prueba)">Agregar Operación
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button class="btn btn-info"
                                        ng-click="vm.agregarPrueba()">Agregar Prueba
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-block btn-success" validation-submit="cubeForm" ng-click="vm.ejecutar()">
                    Ejecutar
                </button>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('js/all.js')}}"></script>
</body>
</html>
