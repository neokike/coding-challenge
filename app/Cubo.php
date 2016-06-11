<?php
namespace App;

use App\Exceptions\CubeException;

class Cubo
{

    protected $cubo;

    /**
     * Cubo constructor.
     */
    public function __construct()
    {

    }

    public function inicializar($n)
    {
        if ($n <= 0 || $n > 100)
            throw new CubeException('El tamaño del cubo debe estar entre 1 y 100');
        $this->cubo = $a = array_fill(1, $n, array_fill(1, $n, array_fill(1, $n, 0)));
    }

    public function update($x, $y, $z, $valor)
    {
        $this->validarExistenciaDeCoordenada($x, $y, $z);

        $this->cubo[$x][$y][$z] = $valor;
    }

    public function query($x1, $y1, $z1, $x2, $y2, $z2)
    {
        $this->validarExistenciaDeCoordenada($x1, $y1, $z1);
        $this->validarExistenciaDeCoordenada($x2, $y2, $z2);

        $this->validarReestriccionesDeCoordenadas([$x1, $y1, $z1], [$x2, $y2, $z2]);

        $sum = 0;
        for ($x = $x1; $x <= $x2; $x++) {
            for ($y = $y1; $y <= $y2; $y++) {
                for ($z = $z1; $z <= $z2; $z++) {
                    $sum = $this->cubo[$x][$y][$z] + $sum;
                }
            }
        }

        return $sum;
    }

    private function validarExistenciaDeCoordenada($x, $y, $z)
    {
        if (!isset($this->cubo[$x][$y][$z]))
            throw new CubeException('La coordenada' . $x . ', ' . $y . ', ' . $z . ' no existe');

    }

    private function validarReestriccionesDeCoordenadas($coord1, $coord2)
    {
        foreach ($coord1 as $index => $coord)
            if ($coord > $coord2[$index])
                throw new CubeException('La coordenada' . $coord . 'debe ser menor o igual a ' . $coord2[$index]);
    }

    /**
     * @return mixed
     */
    public function getCubo()
    {
        return $this->cubo;
    }
}