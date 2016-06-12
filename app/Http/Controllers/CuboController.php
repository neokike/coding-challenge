<?php
namespace App\Http\Controllers;


use App\Cubo\Cubo;
use Illuminate\Http\Request;

class CuboController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @param Request $request
     * @param Cubo $cubo
     * @return \Illuminate\Support\Collection
     * @throws \App\Exceptions\CubeException
     */
    public function ejecutar(Request $request, Cubo $cubo)
    {
        $n = $request->get('size');
        $pruebas = $request->get('pruebas');
        $sumas = collect();

        foreach ($pruebas as $prueba) {
            $cubo->inicializar($n);
            foreach ($prueba['operaciones'] as $operacion) {
                $cubo = $cubo->ejecutar($operacion['operacion'], $operacion['params']);
            }
            $sumas->push($cubo->getSumas());
        }
        return $sumas;
    }

}