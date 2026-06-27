@extends('admin.template')
@section('content')
<div class="main-content">
    <div class="container-fluid d-flex justify-content-between mb-3 py-3">
        <h3>Data Projects</h3>
        <header class="justify-content-end">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Tambah Project</a>
            <a href="{{ route('projects.pdf') }}" class="btn btn-secondary" target="_blank">Cetak PDF</a>
        </header>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered" id="tabel_project">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Teknologi</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($project->image)
                                <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}" width="100">
                            @else
                                <p>No Image Available</p>
                            @endif
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->teknologi }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel_project').DataTable();
    });
</script>
@endsection