<?php
namespace App\Cubo;

use App\Exceptions\CubeException;

class Cubo
{

    protected $cubo;

    protected $sumas = [];

    /**
     * inicializa la matriz de tamaño n*n*n en 0
     * @param $n
     * @throws CubeException
     */
    public function inicializar($n)
    {
        if ($n <= 0 || $n > 100)
            throw new CubeException('El tamaño del cubo debe estar entre 1 y 100');
        $this->cubo = $a = array_fill(1, $n, array_fill(1, $n, array_fill(1, $n, 0)));
        $this->sumas = [];
    }

    /**
     * Ejecuta una operación especifica en la matriz (Update o Query)
     * @param $operacion
     * @param $params
     * @return mixed
     */
    public function ejecutar($operacion, $params)
    {
        $operacion = 'App\Cubo\Operaciones\Cubo' . ucfirst($operacion);
        $op = new $operacion($this);
        return $op->ejecutar($params);
    }
    /**
     * getter
     * @return mixed
     */
    public function getCubo()
    {
        return $this->cubo;
    }

    /**
     * setter
     * @param $cubo
     */
    public function setCubo($cubo)
    {
        $this->cubo = $cubo;
    }

    /**
     * getter
     * @return array
     */
    public function getSumas()
    {
        return $this->sumas;
    }

    /**
     * setter
     * @param array $sumas
     */
    public function setSumas($sumas)
    {
        $this->sumas = $sumas;
    }
}