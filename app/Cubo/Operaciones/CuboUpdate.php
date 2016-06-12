<?php
namespace App\Cubo\Operaciones;

use App\Cubo\Cubo;
use App\Cubo\Interfaces\CuboOperacionInterface;
use App\Cubo\Validaciones\CuboValidaciones;
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
        $validacion = new CuboValidaciones($this->cubo);
        $validacion->validarExistenciaDeCoordenada($params['x'], $params['y'], $params['z']);
        $cubo = $this->cubo->getCubo();
        $cubo[$params['x']][$params['y']][$params['z']] = $params['valor'];
        $this->cubo->setCubo($cubo);

        return $this->cubo;
    }
}