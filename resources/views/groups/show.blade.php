@extends('templates.master')

@section('conteudo-view')

<h1>Nome do Grupo: {{ $group->name }}</h1>
<h2>Instituição: {{ $group->institution->name }}</h2>
<h2>Responsável: {{ $group->owner->name }}</h2>

{!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post']) !!}
    <div class="form-row">
    @include('templates.formulario.select', ['label' => 'Usuário', 'select' => 'user_id',
             'value' => $user_list, 'for' => 'selectUsuario', 'col' => 'col-md-12',
             'attributes' => ['class' => 'form-control', 'id' => 'selectUsuario'],
             'selected' => 'Escolher...'])
    </div>
    @include('templates.formulario.submit', ['input' => 'Relacionar ao Grupo: '.$group->name,
             'attributes' => ['class' => 'btn btn-primary btn-block']])
  {!! Form::close() !!}

  @include('user.list', ['user_list' => $group->users])

@endsection