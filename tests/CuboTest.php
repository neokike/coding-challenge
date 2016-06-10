<?php

use App\Cubo;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CuboTest extends TestCase
{
    /**
     * Prueba la inicializacion en 0 del cubo.
     *
     * @return void
     */
    public function testInicializar()
    {
        $cubo = new Cubo();
        $n = 10;
        $cubo->inicializar($n);
        $this->assertEquals($n * $n * $n, count($cubo->getCubo(), COUNT_RECURSIVE) - count($cubo->getCubo()[1], COUNT_RECURSIVE));
        $this->assertEquals(0, $cubo->getCubo()[$n][$n][$n]);
        $this->assertEquals(0, $cubo->getCubo()[1][1][1]);
    }

    /**
     * Prueba el proceso de update.
     *
     * @return void
     */
    public function testUpdate()
    {
        $cubo = new Cubo();
        $n = 10;
        $cubo->inicializar($n);
        $cubo->update(1, 1, 1, 10);
        $this->assertEquals(10, $cubo->getCubo()[1][1][1]);
    }

    /**
     * Prueba el proceso de query.
     *
     * @return void
     */
    public function testQuery()
    {
        $cubo = new Cubo();
        $n = 10;
        $cubo->inicializar($n);
        $cubo->update(1, 1, 1, 10);
        $sum = $cubo->query(1, 1, 1, 2, 2, 2);
        $this->assertEquals(10, $sum);

        $sum = $cubo->query(2, 2, 2, 3, 3, 3);
        $this->assertEquals(0, $sum);
    }

}
