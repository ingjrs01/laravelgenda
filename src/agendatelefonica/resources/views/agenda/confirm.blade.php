@extends('plantilla.plantilla')

@section('titulo','Confirmacion')

@section('contenido')

<div class="container py-5">
    <h1>¿ Deseas eliminar el registro {{$agenda->nombres}} ?</h1>
    <form method="post" action="{{ route('agenda.destroy',$agenda->id) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i>Eliminar
        </button>
        <a href="{{ route ('cancelar') }} " class="redondo btn btn-secondary"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>
@endsection
