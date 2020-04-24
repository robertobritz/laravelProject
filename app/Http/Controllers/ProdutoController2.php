<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController2 extends Controller
{

    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
            $this->request = $request;     
            $this->repository = $product;
    
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
        //$products = Product::where()->get();
        $products = Product::paginate();
        return view('admin.pages.Product.index', [
            'products' =>$products,
        ]);

        
        /*$teste = 123;
        $teste2 = 321;
        $teste3 = [1,2,3,4,5];
        $produtos = ['TV','Geladeira','Forno', 'Sofa'];
        return view('admin.pages.Product.index', compact('teste','teste2', 'teste3','produtos')); compact foi descontinuado
        */
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
           $data = $request->only('name','description','price');
           
           if ($request->hasFile('image') && $request->image->isValid()){ // valida se é imagem se for armazena no de baixo
               $imagePath =$request->image->store('produto'); // armazena em public storage e cria a pasta produto -> cria uma variavel local para salvar o nome do arquivo.
               $data['image'] = $imagePath;            
           }


           $product =  Product::create($data);

          
           return redirect()->route('produtos2.index');
    }
        /*$request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'nullable|min:3|max:50000',     
            'photo' => 'required|image'
        ]);
        dd('ok');
        */
        //if ($request->file('photo')->isValid()){ //verifica se o arquivo é valido

           //dd($request->photo->extension()); //exibi a estenção do arquivo

          // dd($request->file('photo')->store('produto')); // cria e armazena dentro de storage.app.produto

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();
        //$product = Product::find($id); // Caso não exista registro, retornará null
        if(!$product = Product::find($id))
            return redirect()->back();

        return view('admin.pages.Product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
        {
            $product = Product::where('id', $id)->first();
            if(!$product)
                return redirect()->back();
            return view('admin.pages.Product.edit', compact('product'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\storeUpdateProductRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUpdateProductRequest $request, $id)
    {
        $product = Product::where('id', $id)->first();
        if(!$product)
            return redirect()->back();
           
            $data = $request->all();

            if ($request->hasFile('image') && $request->image->isValid()){ // valida se é imagem se for armazena no de baixo
                if ($product->image && Storage::exists($product->image)){
                   Storage::delete($product->image);
                }


                $imagePath =$request->image->store('produto'); // armazena em public storage e cria a pasta produto -> cria uma variavel local para salvar o nome do arquivo.
                $data['image'] = $imagePath;            
            }

        $product->update($data);

        return redirect()->route('produtos2.index');
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
        $product = Product::where('id', $id)->first();
        if(!$product)
            return redirect()->back();
        
        if ($product->image && Storage::exists($product->image)){
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('produtos2.index');
    }


/*
* Search Products
*/
public function search(Request $request)
{
       $filters = $request->except('_token'); //pegar todos os dados de pesquisa

       $products = $this->repository->search($request->filter);
    return view('admin.pages.Product.index', [
        'products' =>$products,
        'filters' =>$filters, // passamos a array criada para a view
    ]);
}
}