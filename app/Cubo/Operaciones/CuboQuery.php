<?php
namespace App\Cubo\Operaciones;

use App\Cubo\Cubo;
use App\Cubo\Interfaces\CuboOperacionInterface;

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
        $this->validarExistenciaDeCoordenada($params['x'], $params['y'], $params['z']);
        $this->validarExistenciaDeCoordenada($params['x2'], $params['y2'], $params['z2']);

        $this->validarReestriccionesDeCoordenadas([$params['x'], $params['y'], $params['z']], [$params['x2'], $params['y2'], $params['z2']]);

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

    private function validarExistenciaDeCoordenada($x, $y, $z)
    {
        if (!isset($this->cubo->getCubo()[$x][$y][$z]))
            throw new CubeException('La coordenada ' . $x . ', ' . $y . ', ' . $z . ' no existe');

    }
    
    private function validarReestriccionesDeCoordenadas($coord1, $coord2)
    {
        $coordenadas = ['X', 'Y', 'Z'];
        foreach ($coord1 as $index => $coord)
            if ($coord > $coord2[$index])
                throw new CubeException('La coordenada ' . $coordenadas[$index] . '2=' . $coord2[$index] . ' debe ser mayor o igual a ' . $coordenadas[$index] . '1=' . $coord);
    }
}