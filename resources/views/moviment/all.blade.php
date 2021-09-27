@extends('templates.master')

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

                        <br />
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Extrato</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Tipo</th>
                                                <th>Produto</th>
                                                <th>Grupo</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Data</th>
                                                <th>Tipo</th>
                                                <th>Produto</th>
                                                <th>Grupo</th>
                                                <th>Valor</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($moviment_list as $moviment)
                                            <tr>
                                                <td>{{ $moviment->created_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $moviment->type == 1 ? "Aplicação" : "Resgate" }}</td>
                                                <td>{{ $moviment->product->name }}</td>
                                                <td>{{ $moviment->group->name }}</td>
                                                <td>{{ $moviment->value }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

@endsection