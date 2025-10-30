<x-app-layout>
		<div class="row">
				<div class="col-12">
						<!-- CARD CREATE -->
						<div class="card mb-4">
								<div class="card-header">
										<h5>Tambah Peserta</h5>
								</div>
								<div class="card-body">
										<form method="POST" action="{{ route('admin.master.data-peserta.store') }}">
												@csrf
												<div class="row g-3">
														<div class="col-md-3">
																<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
																		value="{{ old('name') }}" placeholder="Nama" required>
																@error('name')
																		<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
														<div class="col-md-3">
																<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
																		value="{{ old('email') }}" placeholder="Email" required>
																@error('email')
																		<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
														<div class="col-md-2">
																<input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
																		placeholder="Password" required>
																@error('password')
																		<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
														<div class="col-md-2">
																<input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi"
																		required>
														</div>
														<div class="col-md-2">
																<button type="submit" class="btn btn-primary w-100">
																		Simpan
																</button>
														</div>
												</div>
										</form>
								</div>
						</div>

						<!-- CARD LIST -->
						<div class="card">
								<div class="card-header">
										<h5>Daftar Peserta</h5>
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table id="tableData" class="table-striped table">
														<thead>
																<tr>
																		<th width="50">#</th>
																		<th>Nama</th>
																		<th>Email</th>
																		<th width="140">Aksi</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($peserta as $p)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $p->name }}</td>
																				<td>{{ $p->email }}</td>
																				<td>
																						<!-- Show -->
																						<a href="{{ route('admin.master.data-peserta.show', $p->id) }}" class="btn btn-info btn-sm"
																								title="Lihat">
																								<i class="bx bx-show"></i>
																						</a>

																						<!-- Edit -->
																						<a href="{{ route('admin.master.data-peserta.edit', $p->id) }}" class="btn btn-warning btn-sm"
																								title="Edit">
																								<i class="bx bx-edit"></i>
																						</a>

																						<!-- Hapus -->
																						<form method="POST" action="{{ route('admin.master.data-peserta.destroy', $p->id) }}"
																								class="d-inline form-delete">
																								@csrf
																								@method('DELETE')
																								<button type="submit" class="btn btn-danger btn-sm btn-delete" title="Hapus">
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
												title: 'Yakin hapus peserta?',
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
