<x-guest-layout>
		<div class="authentication-wrapper authentication-basic container-p-y">
				<div class="authentication-inner">
						<div class="card">
								<div class="card-body">
										<div class="row">
												<!-- Kiri -->
												<div class="col-md-6">
														<div class="app-brand justify-content-center">
																<span class="app-brand-logo demo">
																		<img src="{{ asset('images/logo.png') }}" alt="logo" class="w-50 img-fluid mx-auto">
																</span>
														</div>
														<h4 class="mb-2 text-center">Selamat Datang Kembali 👋</h4>
														<p class="mb-4 text-center">Silakan login untuk melanjutkan.</p>
												</div>

												<!-- Kanan -->
												<div class="col-md-6">
														<!-- Session Status -->
														@if (session('status'))
																<div class="alert alert-success alert-dismissible fade show" role="alert">
																		{{ session('status') }}
																		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
																</div>
														@endif

														<form method="POST" action="{{ route('login') }}">
																@csrf

																<!-- Email -->
																<div class="mb-3">
																		<label for="email" class="form-label">Email</label>
																		<input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
																				name="email" value="{{ old('email') }}" placeholder="Masukkan email" autofocus required />
																		@error('email')
																				<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>

																<!-- Password -->
																<div class="form-password-toggle mb-3">
																		<label class="form-label" for="password">Password</label>
																		<div class="input-group input-group-merge">
																				<input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
																						name="password" placeholder="********" required autocomplete="current-password" />
																				<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
																		</div>
																		@error('password')
																				<div class="invalid-feedback d-block">{{ $message }}</div>
																		@enderror
																</div>

																<!-- Remember Me -->
																<div class="form-check mb-3">
																		<input type="checkbox" class="form-check-input" id="remember_me" name="remember">
																		<label class="form-check-label" for="remember_me">Ingat saya</label>
																</div>

																<!-- Tombol -->
																<div class="d-grid mb-3">
																		<button type="submit" class="btn btn-primary w-100">Masuk</button>
																</div>

																<!-- Forgot Password -->
																<div class="mb-3 text-center">
																		@if (Route::has('password.request'))
																				<a href="{{ route('password.request') }}" class="text-decoration-none">
																						Lupa password?
																				</a>
																		@endif
																</div>

																<!-- Link ke Register -->
																<p class="text-center">
																		<span>Belum punya akun?</span>
																		<a href="{{ route('register') }}">
																				<span>Daftar sekarang</span>
																		</a>
																</p>
														</form>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</x-guest-layout>
