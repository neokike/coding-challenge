<?php
namespace App\Cubo\Operaciones;

use App\Cubo\Cubo;
use App\Cubo\Interfaces\CuboOperacionInterface;
use App\Exceptions\CubeException;
use Illuminate\Support\Facades\App;

class CuboUpdate implements CuboOperacionInterface
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
        $this->validarValor($params['valor']);
        $cubo = $this->cubo->getCubo();
        $cubo[$params['x']][$params['y']][$params['z']] = $params['valor'];
        $this->cubo->setCubo($cubo);

        return $this->cubo;
    }

    private function validarExistenciaDeCoordenada($x, $y, $z)
    {
        if (!isset($this->cubo->getCubo()[$x][$y][$z]))
            throw new CubeException('La coordenada ' . $x . ', ' . $y . ', ' . $z . ' no existe');

    }

    private function validarValor($valor)
    {
        if ($valor < -1000000000 || $valor > 1000000000) {
            throw new CubeException('El valor de la operación debe estar entre -10^9 y 10^9');

        }
    }
}