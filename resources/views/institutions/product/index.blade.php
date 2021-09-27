@extends('templates.master')

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

  {!! Form::open(['route' => ['institution.product.store', $institution->id], 'method' => 'post']) !!}
    <div class="form-row">
    @include('templates.formulario.input', ['label' => 'Nome do Produto', 'input' => 'name', 'for' => 'inputName',
             'col' => 'col-md-6', 'attributes' => ['placeholder' => 'Nome do Produto',
             'class' => 'form-control py-2', 'id' => 'inputName']])
    @include('templates.formulario.input', ['label' => 'Descrição', 'input' => 'description', 'for' => 'inputDescription',
             'col' => 'col-md-6', 'attributes' => ['placeholder' => 'Descrição',
             'class' => 'form-control py-2', 'id' => 'inputDescription']])
    @include('templates.formulario.input', ['label' => 'Indexador', 'input' => 'index', 'for' => 'inputIndex',
             'col' => 'col-md-6', 'attributes' => ['placeholder' => 'Indexador',
             'class' => 'form-control py-2', 'id' => 'inputIndex']])
    @include('templates.formulario.input', ['label' => 'Taxa de Juros', 'input' => 'interest_rate', 'for' => 'inputRate',
             'col' => 'col-md-6', 'attributes' => ['placeholder' => 'Taxa de Juros',
             'class' => 'form-control py-2', 'id' => 'inputRate']])
             
    </div>
    @include('templates.formulario.submit', ['input' => 'Cadastrar', 'attributes' => ['class' => 'btn btn-primary btn-block']])
  {!! Form::close() !!}

                        <br />
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista de produtos</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome do Produto</th>
                                                <th>Descrição</th>
                                                <th>Indexador</th>
                                                <th>Taxa de Juros</th>
                                                <th>Menu</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome do Produto</th>
                                                <th>Descrição</th>
                                                <th>Indexador</th>
                                                <th>Taxa de Juros</th>
                                                <th>Menu</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @forelse($institution->products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>                                                
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->index }}</td>
                                                <td>{{ $product->interest_rate }}</td>
                                                <td>
                                                    {!! Form::open(['route' => ['institution.product.destroy', $institution->id, $product->id], 'method' => 'DELETE']) !!}

                                                    {!! Form::submit('Remover') !!}

                                                    {!! Form::close() !!}
                                                    
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5">Nada foi cadastrado!</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@endsection