@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Heróis</div>
                <div class="card-body">
                 <div class='row'>
                  
                    <form action="" method="post">
                      @method('DELETE')
                      @csrf

                    @forelse($herois as $heroi)
                    <div class='row'>
                      <div class="card" style="width: 10.5rem;">
                        <img src="{{$heroi->foto}}" class="card-img-top" alt="{{$heroi->name}}">
                        <div class="card-body">
                          <h5 class="card-title">{{$heroi->name}} title</h5>                        
                        <a href="/herois/detalhe/{{$heroi->id}}" class="btn btn-primary btn-block">Detalhe</a>
                        <input type="hidden" name="id" value="{{$heroi->id}}">
                        <input type="submit" class="btn btn-danger btn-block" value='Excluir' />
                        </div>
                      </div>
                      @empty                        
                        Os meu heróis morreram de overdose.
                      @endforelse  

                    </div>
                    </form>            

                  </div>
                  
                  {{$herois->links()}}
                  </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection