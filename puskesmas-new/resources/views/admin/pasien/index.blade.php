<x-layout>
    <x-slot name="page_name">Halaman Pasien</x-slot>
    <x-slot name="page_content">
        <h3>Data Pasien</h3>
        <a href="{{ url('dashboard/pasien/create')}}" class="btn btn-primary">+ Tambah Pasien</a>
        <br>
        <table class="table table-bordered">
            <tr class="table-success">
                <th>Id</th>
                <th>Kode</th>
                <th>Nama Pasien</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Nama Kecamatan</th>
                <th>Aksi</th>
            </tr>
            @foreach ($list_pasien as $pasien)
            <tr>
                <td>{{ $pasien->id }}</td>
                <td>{{ $pasien->kode }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->tmp_lahir }}</td>
                <td>{{ $pasien->tgl_lahir }}</td>
                <td>{{ $pasien->gender }}</td>
                <td>{{ $pasien->email }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->kelurahan_nama }}</td>
                <td><a href="{{ url('dashboard/pasien/show', $pasien->id) }}" class="btn btn-info btn-sm"><i class="far fa-eye"></i>Lihat</a> |
                    <a href="{{ url('dashboard/pasien/edit', $pasien->id) }}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a> |
                    <a href="{{ url('dashboard/pasien/delete', $pasien->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i> Hapus</a></td>
            </tr>
            @endforeach
        </table>
    </x-slot>
</x-layout>