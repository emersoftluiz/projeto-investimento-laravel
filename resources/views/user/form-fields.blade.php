    <div class="form-row">
    @include('templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'for' => 'inputName', 'col' => 'col-md-12', 'attributes' => ['placeholder' => 'Nome', 'class' => 'form-control py-2', 'id' => 'inputName']])
    </div>
    <div class="form-row">
    @include('templates.formulario.input', ['label' => 'CPF', 'input' => 'cpf', 'for' => 'inputCPF', 'col' => 'col-md-6', 'attributes' => ['placeholder' => 'CPF', 'class' => 'form-control py-2', 'id' => 'inputCPF']])
    @include('templates.formulario.input', ['label' => 'Telefone', 'input' => 'phone', 'for' => 'inputPhone', 'col' => 'col-md-6', 'attributes' => ['placeholder' => 'Telefone', 'class' => 'form-control py-2', 'id' => 'inputPhone']])
    </div>
    <div class="form-row">
    @include('templates.formulario.input', ['label' => 'Email', 'input' => 'email', 'for' => 'inputEmail', 'col' => 'col-md-6', 'attributes' => ['placeholder' => 'Email', 'class' => 'form-control py-2', 'id' => 'inputEmail']])
    @include('templates.formulario.password', ['label' => 'Senha', 'input' => 'password', 'for' => 'inputPassword', 'col' => 'col-md-6', 'attributes' => ['placeholder' => 'Senha', 'class' => 'form-control py-2', 'id' => 'inputPassword']])
    </div>