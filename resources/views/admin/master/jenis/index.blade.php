<x-app-layout>

		<div class="row">
				<div class="col-12">

						<div class="card">
								<div class="card-body">
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
												Tambah
										</button>

										<div class="table-responsive">
												<table id="tableData" class="table-striped table">
														<thead>
																<tr>
																		<th scope="col" width="50">#</th>
																		<th scope="col">Nama</th>
																		<th scope="col" width="200">Aksi</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($jenis as $j)
																		<tr>
																				<th scope="row">{{ $loop->iteration }}</th>
																				<td>{{ $j->nama }}</td>
																				<td>
																						<button class="btn btn-warning btn-sm"><i class='bx bx-edit'></i> </button>
																						<button class="btn btn-danger btn-sm"><i class='bx bx-trash'></i> </button>
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



		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
				aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis Ujian</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form method="POST" action="{{ route('admin.master.jenis-ujian.store') }}">
										@csrf
										<div class="modal-body">
												<div class="mb-3">
														<label for="nama-input" class="form-label">Nama</label>
														<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
																value="{{ old('nama') }}" id="nama-input">
														@error('nama')
																<div class="invalid-feedback d-block">{{ $message }}</div>
														@enderror
												</div>
										</div>
										<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
								</form>
						</div>
				</div>
		</div>


		@push('js')
				<script>
						// alert('bisa kok')
						$(document).ready(function() {
								new DataTable('#tableData');
						})
				</script>
		@endpush
</x-app-layout>
