@extends('adminlte::page')

@section('title', 'Data Masjid')

@section('content_header')
    <h1 class="m-0 text-dark">Data Masjid</h1>

@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('masjids.create')}}" class="btn btn-primary mb-2"><i class="fas fa-fw fa-plus"></i></a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>Nama Masjid</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Alamat</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masjids as $key => $masjid)
                                <tr>
                                    <td>{{ $masjid->namamasjid }}</td>
                                    <td>{{ $masjid->provinsi }}</td>
                                    <td>{{ $masjid->kota }}</td>
                                    <td>{{ $masjid->kecamatan }}</td>
                                    <td>{{ $masjid->alamat }}</td>
                                    <td>{{ $masjid->latitude }}</td>
                                    <td>{{ $masjid->longitude }}</td>
                                    <td>
                                        <a href="{{ route('masjids.show', $masjid->id) }}" class="btn btn-success mr-2"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="{{ route('masjids.edit', $masjid->id) }}" class="btn btn-warning mr-2"><i class="fas fa-fw fa-edit"></i></a>
                                        <form action="{{ route('masjids.destroy', $masjid->id) }}" id="delete-form-{{ $masjid->id }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $masjid->id }}')"><i class="fas fa-fw fa-trash-alt"></i></button>
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
@stop

@push('js')

<script>
    function confirmDelete(id) {
        if (confirm('Anda yakin ingin menghapus data ini?')) {
            document.getElementById('delete-form-'+id).submit();
        }
    }
</script>
@endpush