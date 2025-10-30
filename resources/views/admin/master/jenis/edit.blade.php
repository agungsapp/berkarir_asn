<x-app-layout>
		{{-- @dd($jenisUjianUjian) --}}
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
										<h5>Edit Jenis Ujian</h5>
										<a href="{{ route('admin.master.jenis-ujian.index') }}" class="btn btn-secondary">
												<i class="bx bx-arrow-back"></i> Kembali
										</a>
								</div>
								<div class="card-body">
										<form method="POST" action="{{ route('admin.master.jenis-ujian.update', $jenisUjian->id) }}">
												@csrf
												@method('PUT')

												<div class="mb-3">
														<label class="form-label">Nama</label>
														<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
																value="{{ old('nama', $jenisUjian->nama) }}" required>
														@error('nama')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>

												<button type="submit" class="btn btn-primary">
														<i class="bx bx-save"></i> Update
												</button>
										</form>
								</div>
						</div>
				</div>
		</div>
</x-app-layout>
