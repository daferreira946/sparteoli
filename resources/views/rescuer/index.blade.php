@extends('adminlte::page')

@section('title', 'Sparteoli')

@section('content_header')
    <h1>Tipos de socorristas</h1>
@stop

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-5">
            @can('admin')
                <a href="{{route('create-rescuer')}}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Adicionar
                </a>
            @endauth
        </div>
        <div class="d-flex justify-content-center">
            <div class="list-group col-md-8">
                @include('message', ['message' => $message ?? ''])
                @include('errors', ['errors' => $errors])
                @foreach($rescuers as $rescuer)
                    <div class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <p class="m-2">{{ $rescuer->name }}</p>
                        @can('admin')
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-primary mr-2" href="{{route('edit-rescuer', $rescuer->id)}}">
                                    <p class="mb-0">
                                        <i class="fas fa-edit"></i>
                                        Atualizar
                                    </p>
                                </a>
                                <form method="post" action="{{ route('destroy-rescuer', $rescuer->id) }}"
                                      onsubmit="return confirm('Tem certeza que deseja remover {{addslashes( $rescuer->name )}}?')">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
