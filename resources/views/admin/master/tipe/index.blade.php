<x-app-layout>
		<div class="row">
				<div class="col-12">
						<!-- CARD CREATE -->
						<div class="card mb-4">
								<div class="card-header">
										<h5>Tambah Tipe Ujian</h5>
								</div>
								<div class="card-body">
										<form method="POST" action="{{ route('admin.master.tipe-ujian.store') }}">
												@csrf
												<div class="row">
														<div class="col-md-4">
																<div class="mb-3">
																		<label class="form-label">Nama</label>
																		<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
																				value="{{ old('nama') }}" required>
																		@error('nama')
																				<div class="invalid-feedback">{{ $message }}</div>
																		@enderror
																</div>
														</div>
												</div>
												<div class="col-md-2">
														<button type="submit" class="btn btn-primary w-100">
																Simpan
														</button>
												</div>
										</form>
								</div>
						</div>

						<!-- CARD LIST -->
						<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
										<h5>Daftar Tipe Ujian</h5>
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table id="tableData" class="table-striped table">
														<thead>
																<tr>
																		<th width="50">#</th>
																		<th>Nama</th>
																		<th width="120">Aksi</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($tipe as $t)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $t->nama }}</td>
																				<td class="d-flex gap-2">
																						<a href="{{ route('admin.master.tipe-ujian.edit', $t->id) }}" class="btn btn-warning btn-sm">
																								<i class="bx bx-edit"></i>
																						</a>

																						<form method="POST" action="{{ route('admin.master.tipe-ujian.destroy', $t->id) }}"
																								class="d-inline form-delete">
																								@csrf
																								@method('DELETE')
																								<button type="submit" class="btn btn-danger btn-sm btn-delete">
																										<i class="bx bx-trash"></i>
																								</button>
																						</form>
																				</td>
																		</tr>
																@endforeach
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>

		@push('js')
				<script>
						$(document).ready(function() {
								new DataTable('#tableData');

								$('.btn-delete').on('click', function(e) {
										e.preventDefault();
										const form = $(this).closest('form');

										Swal.fire({
												title: 'Yakin hapus?',
												text: 'Data akan dihapus permanen.',
												icon: 'warning',
												showCancelButton: true,
												confirmButtonText: 'Ya, hapus!',
												cancelButtonText: 'Batal'
										}).then(result => {
												if (result.isConfirmed) {
														form.submit();
												}
										});
								});
						});
				</script>
		@endpush
</x-app-layout>
