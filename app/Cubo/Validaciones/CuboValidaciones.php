<?php
namespace App\Cubo\Validaciones;

use App\Cubo\Cubo;
use App\Exceptions\CubeException;

class CuboValidaciones
{

    /**
     * @var Cubo
     */
    private $cubo;

    public function __construct(Cubo $cubo)
    {

        $this->cubo = $cubo;
    }

    public function validarExistenciaDeCoordenada($x, $y, $z)
    {
        if (!isset($this->cubo->getCubo()[$x][$y][$z]))
            throw new CubeException('La coordenada ' . $x . ', ' . $y . ', ' . $z . ' no existe');

    }

    public function validarReestriccionesDeCoordenadas($coord1, $coord2)
    {
        $coordenadas = ['X', 'Y', 'Z'];
        foreach ($coord1 as $index => $coord)
            if ($coord > $coord2[$index])
                throw new CubeException('La coordenada ' . $coordenadas[$index] . '2=' . $coord2[$index] . ' debe ser mayor o igual a ' . $coordenadas[$index] . '1=' . $coord);
    }

    public function validarValor($valor)
    {
        if ($valor < -1000000000 || $valor > 1000000000) {
            throw new CubeException('El valor de la operación debe estar entre -10^9 y 10^9');

        }
    }

}