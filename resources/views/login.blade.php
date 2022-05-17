<head>
	<title>Inicio sesión</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--*font-->
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<!--! Nesecito--->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="shortcut icon" href="../static/img/logo.png" type="image/x-icon">

	<!--!Funcion para mostrar contraseña-->
	<script type="text/javascript">
		function mostrarPassword() {
			var cambio = document.getElementById("txtPassword");
			if (cambio.type == "password") {
				cambio.type = "text";
				$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
			} else {
				cambio.type = "password";
				$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
			}
		}

		$(document).ready(function () {
			//CheckBox mostrar contraseña
			$('#ShowPassword').click(function () {
				$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
			});
		});
	</script>
</head>

<body>
	<section class="ftco-section">
		<div class="wrapper fadeInDown">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-12 col-lg-10">
							<div class="wrap d-md-flex">
								<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
									<div class="text w-100">
										<h2>Bienvenido a tus libros</h2>
									</div>
								</div>
								<div class="login-wrap p-4 p-lg-5">
									<div class="d-flex">
										<div class="w-100">
											<h3 class="mb-4">Iniciar sesión</h3>
										</div>
									</div> 
                                    <form mname="formulario_login" action="/validarUsuario" class="signin-form" method="POST">
                                        {{ csrf_field() }}
									{{-- <form action="/validarUsuario" class="signin-form"> --}}
										<div class="form-group mb-3">
											<label class="label" for="name">Ingrese usuario:</label>
											<input type="text" class="form-control" placeholder="Usuario" name="username" required>
										</div>
										<div class="form-group mb-3">
											<label class="label" for="Contraseña">Ingrese contraseña:</label>
											<div class="input-group">
												<input ID="txtPassword" type="Password" Class="form-control" name="password"
													placeholder="Contraseña" required>
												<div class="input-group-append">
													<button id="show_password" class="btn btn-danger" type="button"
														onclick="mostrarPassword()"> <span
															class="fa fa-eye-slash icon"></span>
													</button>
												</div>
											</div> <br>
											<div class="form-group">

												<button type="submit" class="form-control btn btn-danger submit px-3 v">
													Iniciar sesión </button>
											</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
</body>
</html>


        
