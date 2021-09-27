@extends('templates.master')

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

  {!! Form::open(['route' => 'moviment.application.store', 'method' => 'post']) !!}
    <div class="form-row">
    @include('templates.formulario.select', ['label' => 'Grupo', 'select' => 'group_id',
             'value' => $group_list ?? [], 'for' => 'selectGrupo', 'col' => 'col-md-4',
             'attributes' => ['class' => 'form-control', 'id' => 'selectGrupo'],
             'selected' => 'Escolher...'])

    @include('templates.formulario.select', ['label' => 'Produto', 'select' => 'product_id',
             'value' => $product_list ?? [], 'for' => 'selectProduto', 'col' => 'col-md-4',
             'attributes' => ['class' => 'form-control', 'id' => 'selectProduto'],
             'selected' => 'Escolher...'])

    @include('templates.formulario.input', ['label' => 'Valor', 'input' => 'value', 'for' => 'inputValor',
            'col' => 'col-md-4', 'attributes' => ['placeholder' => 'Valor', 'class' => 'form-control py-2',
            'id' => 'inputValor']])
    </div>
    @include('templates.formulario.submit', ['input' => 'Investir',
             'attributes' => ['class' => 'btn btn-primary btn-block']])
  {!! Form::close() !!}

@endsection