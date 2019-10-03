<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Heroi;

//use App\user;

class HeroiController extends Controller
{

    public function index(Request $request){
        if ($request->method() === 'GET'){
            return Heroi::all();
            return "Listando o herói";
        }
            $heroi = new Heroi(); //Cria novo herói

            $heroi->name                = $request->nome;
            $heroi->identidade_secreta  = $request->identidade;
            $heroi->origem              = $request->origem;
            $heroi->foto                = base64_encode($request->foto);
            $heroi->save();
            return redirect("/herois");
            
            return "Criando o herói";   
    }
    /* public function create(){
        if
        return "Criando o herói";
    }

    public function read(){
        return "Listando o herói";
    } */

    public function update(){
        return "Atualizando o herói";
    }

    public function delete(){
        return "Removendo o herói";
    }
}
