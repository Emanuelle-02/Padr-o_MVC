@extends('layouts.main')

@section('content')
<div class="container">
    <form action="{{route('registrarVoto')}}" method="post">
        {{ csrf_field() }}
        <fieldset class="form-group">
            <div class="row">
            <div class="col-sm-10" style="margin: 0 auto">
                <h3 class=" mt-3">SEU VOTO PARA</h3>
                <h4 class=" mt-3 mb-5 ml-5">PRESIDENTE</h4>
                @foreach($candidatos as $candidato)
                <div class="form-check mb-5 mt-3">
                    <input class="form-check-input" type="radio" name="candidatoId" id="exampleRadios1" value="{{$candidato->id}}">
                    <label class="form-check-label" for="exampleRadios1">
                        <p>{{ $candidato->nome }}</p>
                        <p>{{ $candidato->número }}</p>
                        <p>{{ $candidato->partido }}</p> 
                    </label>
                </div>
                @endforeach

                <div class="form-group row">
                    <div class="col-sm-10" style="margin: 0 auto">
                        <button type="submit" class="btn btn-block btn-success">CONFIRMA</button>
                    </div>
                </div>
            </div>
            </div>
        </fieldset>
    </form>

</div>



@endsection