@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo Herói</div>

                <div class="card-body">
                    <form action="/herois" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class='form-group'>
                            <p>Nome</p>
                            <input type="text" name="nome" id="nome">
                        </div>

                        <div class='form-group'>
                            <p>Identidade secreta</p>
                            <input type="text" name="identidade" id="identidade">
                        </div>

                        <div class='form-group'>
                            <p>Origem</p>                        
                            <input type="text" name="origem" id="origem">
                        </div>   

                        <div class='form-group'>
                            <p>Foto</p>
                            <input type="file" name="foto" id="foto">                    
                            <input type="submit" valeu="Salvar Dados">
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection