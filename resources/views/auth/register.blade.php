<x-guest-layout>

		<div class="authentication-wrapper authentication-basic container-p-y">
				<div class="authentication-inner">
						<!-- Register Card -->
						<div class="card">
								<div class="card-body">
										<div class="row">
												<div class="col-md-6">
														<!-- Logo -->
														<div class="app-brand justify-content-center">
																<span class="app-brand-logo demo">
																		<img src="{{ asset('images/logo.png') }}" alt="logo" class="w-50 img-fluid mx-auto" srcset="">
																</span>
														</div>
														<!-- /Logo -->
														<h4 class="mb-2 text-center">Berkarir ASN 🚀</h4>
														<p class="mb-4 text-center">Selamat datang, silahkan mendaftar !</p>
												</div>
												<div class="col-md-6">

														<form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
																@csrf

																<!-- NAMA -->
																<div class="mb-3">
																		<label for="name" class="form-label">Nama</label>
																		<input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
																				name="name" value="{{ old('name') }}" placeholder="Masukan nama" autofocus />
																		@error('name')
																				<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>

																<!-- EMAIL -->
																<div class="mb-3">
																		<label for="email" class="form-label">Email</label>
																		<input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
																				name="email" value="{{ old('email') }}" placeholder="Masukan email" />
																		@error('email')
																				<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>

																<!-- PASSWORD -->
																<div class="form-password-toggle mb-3">
																		<label class="form-label" for="password">Password</label>
																		<div class="input-group input-group-merge">
																				<input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
																						name="password" placeholder="********" aria-describedby="password" />
																				<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
																				@error('password')
																						<div class="invalid-feedback d-block">{{ $message }}</div>
																				@enderror
																		</div>
																</div>

																<!-- KONFIRMASI PASSWORD -->
																<div class="form-password-toggle mb-3">
																		<label class="form-label" for="password_confirmation">Konfirmasi Password</label>
																		<div class="input-group input-group-merge">
																				<input type="password" id="password_confirmation"
																						class="form-control @error('password_confirmation') is-invalid @enderror"
																						name="password_confirmation" placeholder="********" aria-describedby="password_confirmation" />
																				<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
																				@error('password_confirmation')
																						<div class="invalid-feedback d-block">{{ $message }}</div>
																				@enderror
																		</div>
																</div>

																<button class="btn btn-primary d-grid w-100">Daftar</button>
														</form>

														<p class="text-center">
																<span>Sudah punya akun ?</span>
																<a href="{{ route('login') }}">
																		<span>Login</span>
																</a>
														</p>
												</div>
										</div>


								</div>
						</div>
						<!-- Register Card -->
				</div>
		</div>
</x-guest-layout>
