<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {   
        $produtos = ['produto1','produto2','produto3'];
        return $produtos;
    }

    public function show($id)
    {
        return "Exibindo o produto de id: {$id}";
    }

    public function create()
    {
        return "Exibindo o form de cadastro de um novo produto";
    }

    public function edit($id)
    {
        return "Forma para editar o produto de id: {$id}";
    }
    
    public function store()
    {
        return "Cadastro de um novo produto";
    }

    public function update($id)
    {
        return "Editando o produto {$id}";
    }

    
    public function destroy($id)
    {
        return "Deletando o produto {$id}";
    }
}
