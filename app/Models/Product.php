<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','description','image'];

    /*
    * Filter Products
    */
    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter){ // fazer uma função para pegar a var do filtro
            if ($filter){
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })//->toSql();    //posso colocar mais e mais ->where('')->where('')
        ->paginate();
        //dd($results); para debugar

        return $results;
    }
}

