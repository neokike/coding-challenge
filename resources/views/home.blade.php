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
            <div class="well">
                <p><strong>Instrucciones:</strong></p>
                <ul>
                    <li>Agregue una o más suites de prueba (No deben ser mas de 50)</li>
                    <li>Establezca un tamaño del cubo para la prueba (n<=1000)</li>
                    <li>Agregue una o más operaciones (no debe sobrepasar las 1000 por prueba)</li>
                    <li>Restricciones:
                        <ul>
                            <li>1 <= x1 <= x2 <= N</li>
                            <li>1 <= y1 <= y2 <= N</li>
                            <li>1 <= z1 <= z2 <= N</li>
                            <li>1 <= x,y,z <= N</li>
                            <li>-10^9 <= Valor <= 10^9</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form class="form" name="cubeForm">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 ng-if="!vm.form.pruebas.length">Debe agregar una prueba</h3>

                        <div ng-if="vm.form.pruebas.length">
                            <div class="panel panel-default" ng-repeat="prueba in vm.form.pruebas"
                                 ng-init="pruebaIndex = $index">
                                <div class="panel-heading clearfix">
                                    <h4 class="pull-left">Prueba @{{ $index + 1 }}</h4>
                                    <div class="pull-right">
                                        <button class="btn btn-danger"
                                                ng-click="vm.borrarPrueba($index)"><i
                                                    class="glyphicon glyphicon-trash"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="size" class="control-label">Tamaño del Cubo</label>
                                        <input type="number" ng-model="prueba.size"
                                               validator="required,number,mayorIgualA=1,menorIgualA=100"
                                               name="size" class="form-control">
                                    </div>
                                    <div class="row" ng-repeat="operacion in prueba.operaciones track by $index">
                                        <div class="col-xs-10 col-md-3">
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
                                                    <input class="form-control"
                                                           name="@{{'x'+pruebaIndex+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.x">
                                                </div>
                                                <div class="col-xs-12 col-md-3">
                                                    <label for="">Y</label>
                                                    <input class="form-control" name="@{{'y'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.y">
                                                </div>
                                                <div class="col-xs-12 col-md-3">
                                                    <label for="">Z</label>
                                                    <input class="form-control" name="@{{'z'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.z">
                                                </div>
                                                <div class="col-xs-12 col-md-3">
                                                    <label for="">Valor</label>
                                                    <input class="form-control" name="@{{'valor'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,menorIgualA=1000000000,mayorIgualA=-1000000000"
                                                           ng-model="operacion.params.valor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-8" ng-if="operacion.operacion=='Query'">

                                            <div class="row">
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">X1</label>
                                                    <input class="form-control" name="@{{'x'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.x">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">Y1</label>
                                                    <input class="form-control" name="@{{'y'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.y">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">Z1</label>
                                                    <input class="form-control" name="@{{'z'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.z">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">X2</label>
                                                    <input class="form-control" name="@{{'x2'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.x2">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">Y2</label>
                                                    <input class="form-control" name="@{{'y2'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.y2">
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <label for="">Z2</label>
                                                    <input class="form-control" name="@{{'y2'+pruebaIndex+$index }}"
                                                           type="text"
                                                           validator="required,number,mayorIgualA=1"
                                                           ng-model="operacion.params.z2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-md-1 text-center">
                                            <button class="btn btn-danger btn-operacion"
                                                    ng-if="$index != 0"
                                                    ng-click="vm.borrarOperacion(prueba,operacion)"><i
                                                        class="glyphicon glyphicon-trash"></i></button>
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
                <button class="btn btn-block btn-success" validation-submit="cubeForm" ng-click="vm.ejecutar()" ng-disabled="vm.ejecutando">
                    Ejecutar
                </button>
            </form>
        </div>
    </div>
    <div ng-if="vm.resultados.length">
        <div class="row">
            <div class="col-xs-12">
                <h3>Resultados</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="well">
                    <div ng-repeat="resultado in vm.resultados track by $index">
                        <p><strong> Resultados Prueba @{{ $index + 1 }}</strong></p>
                        <p ng-if="!resultado.length">No hay resultados que mostrar</p>
                        <p ng-repeat="suma in resultado track by $index">
                            @{{ suma }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/all.js')}}"></script>
</body>
</html>
