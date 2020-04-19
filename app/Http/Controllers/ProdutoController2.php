<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUpdateProductRequest;
use Illuminate\Http\Request;

class ProdutoController2 extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
            $this->request = $request;     

            //$this->middleware('auth');
           // $this->middleware('auth')->only([
             //  'store'
            // ]);
            //$this->middleware('auth')->except([
            //    'index', 'show'
            //]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 123;
        $teste2 = 321;
        $teste3 = [1,2,3,4,5];
        $produtos = ['TV','Geladeira','Forno', 'Sofa'];
        return view('admin.pages.Product.index', compact('teste','teste2', 'teste3','produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  use App\Http\Requests\storeUpdateProductRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUpdateProductRequest $request)
    {
        /*$request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'nullable|min:3|max:50000',     
            'photo' => 'required|image'
        ]);
        dd('ok');
        */
        if ($request->file('photo')->isValid()){ //verifica se o arquivo é valido

           //dd($request->photo->extension()); //exibi a estenção do arquivo

           dd($request->file('photo')->store('produto')); // cria e armazena dentro de storage.app.produto

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "detalhes do produto {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
        {
            return view('admin.pages.Product.edit', compact('id'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        //dd($request->name);
        //dd($request->only(['name','description']));
        //dd($request->input(['teste','default'])); // Utiliza para dar um valor caso não receba a variavel
        //dd($request->except('_token', 'name'));

        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
