<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Heroi;

//use App\user;

class HeroiController extends Controller
{

    public function index(Request $request){
        if ($request->method() === 'GET'){

            /* if($request->id){
                $heroi = Heroi::find($request->id);            
                return "<img src='$heroi->foto'/>";
            } */
            //return Heroi::all();
            //return view('herois.index',['herois'=> Heroi::all()]);
            return view('herois.index',['herois' => Heroi::paginate(2)]);
        }
            $heroi = new Heroi(); //Cria novo herói


           // dd($request);

            $heroi->name                = $request->nome;
            $heroi->identidade_secreta  = $request->identidade;
            $heroi->origem              = $request->origem;

            $type = $request->file('foto')->extension(); //Recupera o tipo do arquivo
            $data = file_get_contents($request->file('foto')->path()); //Recupera o 
            $heroi->foto                = "data:image/$type;base64," . base64_encode($data); //codifica a imagem para binário
            $heroi->save();
            return redirect("/herois");
            
            //return "Criando o herói";   
    }
    /* public function create(){
        if
        return "Criando o herói";
    }

    public function read(){
        return "Listando o herói";
    } */

    public function update(Request $request){ 

        if ($request->method() === 'GET'){
            $herois = Heroi::all();
            foreach($herois as $heroes){
                echo $heroes->name;

            }
        }
        // Recupera o herói recebido para atualização
        $heroi = Heroi::find($request->id);

        $heroi->name                = $request->nome;
        $heroi->identidade_secreta  = $request->identidade;
        $heroi->origem              = $request->origem;
        $heroi->foto                = base64_encode($request->foto);
        $heroi->save();
        return redirect("/herois");
    }

    public function delete(Request $request){
        //return "Removendo o herói";

        // Recupera o herói recebido para atualização
        /* $heroi = Heroi::find($request->id);
        $heroi->delete($heroi->id); */

        DB::table('herois')->where('id', $request->id)->delete();

        return redirect("/herois");

       
    }

    public function detalhe(Request $request){
        //return "Removendo o herói";

        if($request->id){
            // Recupera o herói recebido para atualização
            $heroi = Heroi::find($request->id);
            return view('herois.detalhe', compact('heroi'));
        }
    }
}
