<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{

    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index()
    {

    }

}
