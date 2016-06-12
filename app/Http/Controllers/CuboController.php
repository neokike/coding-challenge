<?php
namespace App\Http\Controllers;


use App\Cubo\Cubo;
use App\Exceptions\CubeException;
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
        $pruebas = $request->get('pruebas');
        $sumas = collect();

        foreach ($pruebas as $index => $prueba) {
            try {
                $cubo->inicializar($prueba['size']);
            } catch (CubeException $e) {
                return response()->json(['error' => 'Error en Prueba ' . ($index + 1) . ': ' . $e->getMessage()], 400);
            }
            foreach ($prueba['operaciones'] as $indexOp => $operacion) {
                try {
                    $cubo = $cubo->ejecutar($operacion['operacion'], $operacion['params']);
                } catch (CubeException $e) {
                    return response()->json(['error' => 'Error en Prueba ' . ($index + 1) . ': Operacion ' . ($indexOp + 1) . ', ' . $e->getMessage()], 400);
                }
            }
            $sumas->push($cubo->getSumas());
        }
        return response()->json(['resultados' => $sumas]);
    }

}