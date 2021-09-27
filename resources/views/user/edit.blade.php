@extends('templates.master')

@section('css-view')
@endsection

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

  {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}
    @include('user.form-fields')
    @include('templates.formulario.submit', ['input' => 'Atualizar', 'attributes' => ['class' => 'btn btn-primary btn-block']])
  {!! Form::close() !!}

@endsection

@section('js-view')
@endsection