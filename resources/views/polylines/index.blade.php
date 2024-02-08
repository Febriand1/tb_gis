@extends('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
    <h1 class="m-0 text-dark">Data Sekolah</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('polylines.create')}}" class="btn btn-primary mb-2">Tambah</a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>ID Sekolah</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($polylines as $key => $polyline)
                                <tr>
                                    <td>{{ $polyline->sekolah_id }}</td>
                                    <td>{{ $polyline->latitude }}</td>
                                    <td>{{ $polyline->longitude }}</td>
                                    <td>
                                        <a href="{{ route('polylines.show', $polyline->id) }}" class="btn btn-primary">Lihat</a>
                                        <a href="{{ route('polylines.edit', $polyline->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('polylines.destroy', $polyline->id) }}" id="delete-form-{{ $polyline->id }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $polyline->id }}')">Hapus</button>
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

<script>
    function confirmDelete(id) {
        if (confirm('Anda yakin ingin menghapus sekolah ini?')) {
            document.getElementById('delete-form-'+id).submit();
        }
    }
</script>