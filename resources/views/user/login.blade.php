<!DOCTYPE html>
<html>
<head>
	<title>Emersoft Investimentos</title>
    
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-login.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles-login.css') }}">
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Emersoft Investimentos</h3>
				<div class="d-flex justify-content-end social_icon">
				    <span><img src="{{ asset('images/login/facebook.png') }}"></span>
					<span><img src="{{ asset('images/login/twitter.png') }}"></span>
                    <span><img src="{{ asset('images/login/instagram.png') }}"></span>
                    <span><img src="{{ asset('images/login/linkedin.png') }}"></span>
                    <span><img src="{{ asset('images/login/google-plus.png') }}"></span>
				</div>
			</div>
			<div class="card-body">
				{!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><img src="{{ asset('images/login/user.png') }}"></span>
						</div>
                        {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Usuário']) }}
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><img src="{{ asset('images/login/key.png') }}"></span>
						</div>
                        {{ Form::password('password', ['class' => 'form-control','placeholder' => 'Senha']) }}
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Lembrar-me
					</div>
					<div class="form-group">
                        {!! Form::submit('Entrar', ['class' => 'btn float-right login_btn']) !!}
					</div>
                {!! Form::close() !!}
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
                    Não possui uma conta?<a href="#">Inscrever-se</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Esqueceu sua senha?</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle">
		@if(session('falha'))
			Falha na Autenticação!
		@else
			Demonstração de Desenvolvimento PHP LARAVEL
		@endif
		</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		@if(session('falha'))
			<h5>{{ session('falha')['messages'] }}</h5>
		@else
			<h6>Neste projeto protótipo foi utilizado:</h6>
			<p>&nbsp;</p>
			<p>1) Criação do Projeto Laravel utilizando Composer</p>
			<p>&nbsp;</p>
			<p>2) Configuração e Instalação de Camada de Repositório L5 Repository Git</p>
			<p>&nbsp;</p>
			<p>3) Criação das Entities utilizando console via comando PHP ARTISAN MAKE, habilitando as funcionalidades Presenter, Transformer, Validator e Controller</p>
			<p>&nbsp;</p>
			<p>4) Configuração de funcionalidades timestamps e softdeletes</p>
			<p>&nbsp;</p>
			<p>5) Criação de Modelos utilizando console via comando PHP ARTISAN MAKE</p>
			<p>&nbsp;</p>
			<p>6) Instalação do LaravelCollective/HTML utilizando composer, para a utilização de blades</p>
			<p>&nbsp;</p>
			<p>7) Configuração de Aliases</p>
			<p>&nbsp;</p>
			<p>8) Criação de Seed</p>
			<p>&nbsp;</p>
			<p>9) Comandos MIGRATE para criação e configuração de tabelas na Base de Dados</p>
			<p>&nbsp;</p>
			<p>10) Criptografia de Senha no Laravel</p>
			<p>&nbsp;</p>
			<p>11) Criação de Tamplate View utilizando blades</p>
			<p>&nbsp;</p>
			<p>12) Criação da Camada Services (Service Layer) para fazer os processamentos dos Controllers</p>
			<p>&nbsp;</p>
			<p>13) Listagem de Dados com o Pacote L5 Repository</p>
			<p>&nbsp;</p>
			<p>14) Utilização de MUTATOR para formatar dados</p>
			<p>&nbsp;</p>
			<p>15) Persistência de Dados com o Pacote L5 Repository</p>
			<p>&nbsp;</p>
			<p>17) Relacionamento HasMany</p>
			<p>&nbsp;</p>
			<p>17) Método Attach do Laravel</p>
			<p>&nbsp;</p>
			<p>17) Utilização do Form::model do pacote LaravelCollective/HTML</p>
			<p>&nbsp;</p>
		@endif
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		</div>
	</div>
	</div>
</div>
<script src="{{ asset('js/jquery-login.min.js') }}"></script>
<script type="text/javascript">
$(window).load(function(){
	$('#exampleModalLong').modal('show');
});
</script>

<script src="{{ asset('js/bootstrap-login.min.js') }}"></script>

</body>
</html>
