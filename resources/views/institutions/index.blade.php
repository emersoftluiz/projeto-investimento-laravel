@extends('templates.master')

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

  {!! Form::open(['route' => 'institution.store', 'method' => 'post']) !!}
    <div class="form-row">
    @include('templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'for' => 'inputName', 'col' => 'col-md-12', 'attributes' => ['placeholder' => 'Nome', 'class' => 'form-control py-2', 'id' => 'inputName']])
    </div>
    @include('templates.formulario.submit', ['input' => 'Cadastrar', 'attributes' => ['class' => 'btn btn-primary btn-block']])
  {!! Form::close() !!}

                        <br />
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista de Instituições</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Menu</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Menu</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($institutions as $institution)
                                            <tr>
                                                <td>{{ $institution->id }}</td>
                                                <td>{{ $institution->name }}</td>
                                                <td>
                                                    {!! Form::open(['route' => ['institution.destroy', $institution->id], 'method' => 'DELETE']) !!}

                                                    {!! Form::submit('Remover') !!}

                                                    {!! Form::close() !!}
                                                    
                                                    <input type="button" class="btn btn-primary"
                                                           onclick="location.href='{{ route('institution.show', $institution->id) }}';" value="Detalhes" />
                                                    <input type="button" class="btn btn-warning"
                                                           onclick="location.href='{{ route('institution.edit', $institution->id) }}';" value="Alterar" />
                                                    <input type="button" class="btn btn-success"
                                                           onclick="location.href='{{ route('institution.product.index', $institution->id) }}';" value="Produtos" />
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

@endsection