@extends('templates.master')

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

  {!! Form::model($institution, ['route' => ['institution.update', $institution->id], 'method' => 'put']) !!}
    <div class="form-row">
    @include('templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'for' => 'inputName', 'col' => 'col-md-12', 'attributes' => ['placeholder' => 'Nome', 'class' => 'form-control py-2', 'id' => 'inputName']])
    </div>
    @include('templates.formulario.submit', ['input' => 'Atualizar', 'attributes' => ['class' => 'btn btn-primary btn-block']])
  {!! Form::close() !!}

@endsection