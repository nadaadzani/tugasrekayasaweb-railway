@extends('admin.template')
@section('content')
<div class="container mt-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3>Edit Project</h3>
            <form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title">Nama Project</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="teknologi">Teknologi</label>
                        <input type="text" class="form-control" id="teknologi" name="teknologi" value="{{ $project->teknologi }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" {{ $project->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $project->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ $project->image }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4">{{ $project->description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection