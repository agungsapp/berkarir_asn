<x-app-layout>
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
										<h5>Detail Peserta</h5>
										<a href="{{ route('admin.master.data-peserta.index') }}" class="btn btn-secondary">
												Kembali
										</a>
								</div>
								<div class="card-body">
										<table class="table-bordered table">
												<tr>
														<th width="200">ID</th>
														<td>{{ $dataPeserta->id }}</td>
												</tr>
												<tr>
														<th>Nama</th>
														<td>{{ $dataPeserta->name }}</td>
												</tr>
												<tr>
														<th>Email</th>
														<td>{{ $dataPeserta->email }}</td>
												</tr>
												<tr>
														<th>Role</th>
														<td><span class="badge bg-success">Peserta</span></td>
												</tr>
												<tr>
														<th>Bergabung</th>
														<td>{{ \Carbon\Carbon::parse($dataPeserta->created_at)->format('d M Y H:i') }}</td>
												</tr>
												<tr>
														<th>Terakhir Update</th>
														<td>{{ \Carbon\Carbon::parse($dataPeserta->updated_at)->format('d M Y H:i') }}</td>
												</tr>
										</table>
								</div>
						</div>
				</div>
		</div>
</x-app-layout>
