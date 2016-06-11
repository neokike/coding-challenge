<?php
namespace App\Http\Controllers;

class CuboController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return view('home');
    }

}