<?php
namespace App\Cubo\Operaciones;

use App\Cubo\Cubo;
use App\Cubo\Interfaces\CuboOperacionInterface;
use App\Cubo\Validaciones\CuboValidaciones;

class CuboQuery implements CuboOperacionInterface
{
    /**
     * @var Cubo
     */
    private $cubo;

    public function __construct(Cubo $cubo)
    {

        $this->cubo = $cubo;
    }

    public function ejecutar($params)
    {
        $validacion = new CuboValidaciones($this->cubo);

        $validacion->validarExistenciaDeCoordenada($params['x'], $params['y'], $params['z']);
        $validacion->validarExistenciaDeCoordenada($params['x2'], $params['y2'], $params['z2']);

        $validacion->validarReestriccionesDeCoordenadas([$params['x'], $params['y'], $params['z']], [$params['x2'], $params['y2'], $params['z2']]);

        $sum = 0;
        for ($x = $params['x']; $x <= $params['x2']; $x++) {
            for ($y = $params['y']; $y <= $params['y2']; $y++) {
                for ($z = $params['z']; $z <= $params['z2']; $z++) {
                    $sum = $this->cubo->getCubo()[$x][$y][$z] + $sum;
                }
            }
        }

        $sumas = $this->cubo->getSumas();
        array_push($sumas, $sum);
        $this->cubo->setSumas($sumas);
        return $this->cubo;
    }
}