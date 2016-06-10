<?php
namespace App;

class Cubo
{

    protected $cubo;

    public function inicializar($n)
    {
        $this->cubo = $a = array_fill(1, $n, array_fill(1, $n, array_fill(1, $n, 0)));
    }

    public function update($x, $y, $z, $valor)
    {
        $this->cubo[$x][$y][$z] = $valor;
    }

    public function query($x1, $y1, $z1, $x2, $y2, $z2)
    {
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

    /**
     * @return mixed
     */
    public function getCubo()
    {
        return $this->cubo;
    }
}