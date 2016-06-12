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
            throw new CubeException('La coordenada' . $x . ', ' . $y . ', ' . $z . ' no existe');

    }

    public function validarReestriccionesDeCoordenadas($coord1, $coord2)
    {
        foreach ($coord1 as $index => $coord)
            if ($coord > $coord2[$index])
                throw new CubeException('La coordenada' . $coord . 'debe ser menor o igual a ' . $coord2[$index]);
    }

}