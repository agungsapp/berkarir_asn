<x-app-layout>
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
										<h5>Edit Peserta</h5>
										<a href="{{ route('admin.master.data-peserta.index') }}" class="btn btn-secondary">
												Kembali
										</a>
								</div>
								<div class="card-body">
										<form method="POST" action="{{ route('admin.master.data-peserta.update', $dataPeserta->id) }}">
												@csrf
												@method('PUT')

												<div class="row g-3">
														<div class="col-md-6">
																<label class="form-label">Nama</label>
																<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
																		value="{{ old('name', $dataPeserta->name) }}" required>
																@error('name')
																		<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
														<div class="col-md-6">
																<label class="form-label">Email</label>
																<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
																		value="{{ old('email', $dataPeserta->email) }}" required>
																@error('email')
																		<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
														<div class="col-md-6">
																<label class="form-label">Password Baru <small class="text-muted">(kosongkan jika tidak
																				diganti)</small></label>
																<input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
																@error('password')
																		<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
														<div class="col-md-6">
																<label class="form-label">Konfirmasi Password</label>
																<input type="password" name="password_confirmation" class="form-control">
														</div>
												</div>

												<div class="mt-4">
														<button type="submit" class="btn btn-primary">
																Update Peserta
														</button>
												</div>
										</form>
								</div>
						</div>
				</div>
		</div>
</x-app-layout>
