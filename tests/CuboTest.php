<?php

use App\Cubo\Cubo;

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
     * Prueba la validacion del tamaño del cubo n<=100
     *
     * @expectedException App\Exceptions\CubeException
     */
    public function testInicializarConIndicePorEncimaDelPermitido()
    {
        $cubo = new Cubo();
        $n = 200;
        $cubo->inicializar($n);
    }

    /**
     * Prueba la validacion del tamaño del cubo n>=1
     *
     * @expectedException App\Exceptions\CubeException
     */
    public function testInicializarConIndicePorDebajoDelPermitido()
    {
        $cubo = new Cubo();
        $n = -1;
        $cubo->inicializar($n);
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
        $cubo->ejecutar('Update', ['x' => 1, 'y' => 1, 'z' => 1, 'valor' => 10]);
        $this->assertEquals(10, $cubo->getCubo()[1][1][1]);
    }

    /**
     * Prueba la existencia de la coordenada en el proceso de update
     *
     * @expectedException App\Exceptions\CubeException
     */
    public function testUpdateEnIndicesNoExistentes()
    {
        $cubo = new Cubo();
        $n = 10;
        $cubo->inicializar($n);
        $cubo->ejecutar('Update', ['x' => 20, 'y' => 20, 'z' => 20, 'valor' => 10]);
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
        $cubo->ejecutar('Update', ['x' => 1, 'y' => 1, 'z' => 1, 'valor' => 10]);
        $cubo->ejecutar('Query', ['x' => 1, 'y' => 1, 'z' => 1, 'x2' => 2, 'y2' => 2, 'z2' => 2]);
        $this->assertEquals(10, $cubo->getSumas()[0]);

        $cubo->inicializar($n);
        $cubo->ejecutar('Update', ['x' => 1, 'y' => 1, 'z' => 1, 'valor' => 10]);
        $cubo->ejecutar('Query', ['x' => 2, 'y' => 2, 'z' => 2, 'x2' => 3, 'y2' => 3, 'z2' => 3]);
        $this->assertEquals(0, $cubo->getSumas()[0]);
    }

}
