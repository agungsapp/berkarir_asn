<x-app-layout>
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
										<h5>Edit Tipe Ujian</h5>
										<a href="{{ route('admin.master.tipe-ujian.index') }}" class="btn btn-secondary">
												Kembali
										</a>
								</div>
								<div class="card-body">
										<form method="POST" action="{{ route('admin.master.tipe-ujian.update', $tipeUjian->id) }}">
												@csrf
												@method('PUT')

												<div class="mb-3">
														<label class="form-label">Nama</label>
														<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
																value="{{ old('nama', $tipeUjian->nama) }}" required>
														@error('nama')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>

												<button type="submit" class="btn btn-primary">
														Update
												</button>
										</form>
								</div>
						</div>
				</div>
		</div>
</x-app-layout>
