@extends('templates.master')

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

  {!! Form::model($group, ['route' => ['group.update', $group->id], 'method' => 'put']) !!}
    <div class="form-row">
    @include('templates.formulario.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'for' => 'inputName',
             'col' => 'col-md-4', 'attributes' => ['placeholder' => 'Nome do Grupo',
             'class' => 'form-control py-2', 'id' => 'inputName']])
    @include('templates.formulario.select', ['label' => 'Usuário', 'select' => 'user_id', 'value' => $user_list,
             'for' => 'selectUser', 'col' => 'col-md-4', 'attributes' => ['class' => 'form-control',
             'id' => 'selectUser'], 'selected' => 'Escolher...'])
    @include('templates.formulario.select', ['label' => 'Instituição', 'select' => 'institution_id',
             'value' => $institution_list, 'for' => 'selectInstituicao', 'col' => 'col-md-4',
             'attributes' => ['class' => 'form-control', 'id' => 'selectInstituicao'],
             'selected' => 'Escolher...'])
    </div>
    @include('templates.formulario.submit', ['input' => 'Alterar', 'attributes' => ['class' => 'btn btn-primary btn-block']])
  {!! Form::close() !!}

@endsection