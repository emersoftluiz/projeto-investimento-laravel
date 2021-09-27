@extends('templates.master')

@section('conteudo-view')

  @if(session('success'))
      <h3>{{ session('success')['messages'] }}</h3>
  @endif

                        <br />
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista de Instituições</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Produto</th>
                                                <th>Nome da Instituição</th>
                                                <th>Valor Investido</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Produto</th>
                                                <th>Nome da Instituição</th>
                                                <th>Valor Investido</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($product_list as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->institution->name }}</td>
                                                <td>{{ Auth::check() ? $product->valueFromUser(Auth::user()) : '' }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

@endsection