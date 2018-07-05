@extends('pages.templates.body')

@section('title', 'Parpen - Home')
@section('css')
<link href="{{ asset('css/pages/distribuidor.css') }}" rel="stylesheet"/>
@endsection

@section('contenido')

<main class="registro mt50">

	<div class="container">


		@if(session('error'))

		<div class="col s12 card-panel red lighten-4 red-text text-darken-4">

			{{ session('error') }}

		</div>


		@endif

		@if(session('success'))

		<div class="col s12 card-panel green lighten-4 green-text text-darken-4">

			{{ session('success') }}

		</div>

		@endif 



		<div class="row">

			<div class="col l4">

				{!!Form::open(['route'=>'login', 'method'=>'POST', 'class' => 'col s12'])!!}

					<h4 class="datos">Ya soy usuario</h4>

	                    <div class="row">

	                        <div class="usuario_input input-field col s12">

	                            {!!Form::text('username',null,['class'=>'validate'])!!}

	                            {!!Form::label('Username')!!}

	                        </div>

	                    </div>

	                    <div class="row">

	                        <div class="contrasena_input input-field col s12">

	                            {!!Form::password('password',['class'=>'validate'])!!}

	                            {!!Form::label('Contraseña')!!}

	                        </div>

	                    </div>


						<div class="col s12 no-padding sub" style="">

								{!! Form::submit('Ingresar', ['class'=>'waves-effect waves-light btn right bg-azul']) !!}

							</div>

	                {!!Form::close()!!}

			</div>

			<div class="col l8">

				{!! Form::open(['route'=>'registro.store', 'method'=>'POST', 'files' => true]) !!}

							<h3 class="registrate">Regístrate</h3>

							<p class="desc">Complete el siguiente formulario para registrarte en nuestro sitio web.</p>

							<h4 class="datos">Datos del contacto</h4>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Nombre *') !!}

									{!! Form::text('name', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Username') !!}

									{!! Form::text('username', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>


							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Correo electrónico *') !!}

									{!! Form::email('email', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="row">

						      	<div class="input-field col s12">

						      		{!! Form::label('Contraseña *') !!}

									{!! Form::password('password', null, ['class'=>'', 'required']) !!}

							    </div>

							</div>

							<div class="col s12 no-padding sub">

								{!! Form::submit('REGÍSTRATE', ['class'=>'waves-effect waves-light btn right bg-azul']) !!}

							</div>

						{!! Form::close() !!} 

			</div>

		</div>

	</div>

</main>




</body>

</html>

@endsection