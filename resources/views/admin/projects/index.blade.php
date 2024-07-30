@extends('layouts.admin')
@section('title')
    Projects
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-l my-3">Add new project</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Title</th>
                        <th scope="col">Language</th>
                        <th scope="col">Started on</th>
                        <th scope="col">Finished</th>
                        <th scope="col">Website</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <th>{{ $project->id }}</th>
                        <th>{{ $project->type->name }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->language }}</td>
                        <td>{{ $project->started_on }}</td>
                        @if ($project->finished === 1)
                        <td>Finished</td>
                        @else
                        <td>Not finished</td>
                        @endif
                        <td>{{ $project->website_url }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline-block form-deleter">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-warning btn-sm">
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

@section('script-section')
    @vite('resources/js/delete-alert.js')
@endsection
