                       <br />
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista de usuários</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Telefone</th>
                                                <th>Data Nasc.</th>
                                                <th>Sexo</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Pemissão</th>
                                                <th>Menu</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Telefone</th>
                                                <th>Data Nasc.</th>
                                                <th>Sexo</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Pemissão</th>
                                                <th>Menu</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($user_list as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->Formatted_cpf }}</td>
                                                <td>{{ $user->Formatted_phone }}</td>
                                                <td>{{ $user->Formatted_birth }}</td>
                                                <td>{{ $user->gender }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->status }}</td>
                                                <td>{{ $user->permission }}</td>
                                                <td>
                                                    {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}

                                                    {!! Form::submit('Remover') !!}

                                                    {!! Form::close() !!}

                                                    <input type="button" class="btn btn-primary"
                                                           onclick="location.href='{{ route('user.edit', $user->id) }}';" value="Editar" />
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>