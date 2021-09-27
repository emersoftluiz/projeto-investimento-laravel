                        <br />
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista de grupos</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Grupo</th>
                                                <th>Valor</th>
                                                <th>Instituição</th>
                                                <th>Responsável</th>
                                                <th>Menu</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>ID</th>
                                                <th>Grupo</th>
                                                <th>Valor</th>
                                                <th>Instituição</th>
                                                <th>Responsável</th>
                                                <th>Menu</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($group_list as $group)
                                            <tr>
                                                <td>{{ $group->id }}</td>
                                                <td>{{ $group->name }}</td>
                                                <td>R$ {{ number_format($group->total_value, 2, ',', '.') }}</td>                                                
                                                <td>{{ $group->institution->name }}</td>
                                                <td>{{ $group->owner->name }}</td>
                                                <td>
                                                    {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}

                                                    {!! Form::submit('Remover') !!}

                                                    {!! Form::close() !!}

                                                    <input type="button" class="btn btn-primary"
                                                           onclick="location.href='{{ route('group.show', $group->id) }}';" value="Detalhes" />
                                                    <input type="button" class="btn btn-warning"
                                                           onclick="location.href='{{ route('group.edit', $group->id) }}';" value="Alterar" />
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
