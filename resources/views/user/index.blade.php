@extends('templates.master')

@section('css-view')
@endsection

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

  {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
    @include('user.form-fields')
    @include('templates.formulario.submit', ['input' => 'Cadastrar', 'attributes' => ['class' => 'btn btn-primary btn-block']])
  {!! Form::close() !!}
  
  @include('user.list', ['user_list' => $users])

@endsection

@section('js-view')
@endsection