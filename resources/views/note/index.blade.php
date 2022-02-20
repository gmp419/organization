@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <button class="btn btn-primary text-white">
                <a href="{{ route('note.create') }}" class="text-white text-decoration-none mr-2">Create New Note</a>
            </button>
            <button class="btn btn-info text-white">
            <a href="{{ route('noteTag.index') }}" class="mx-2 text-white text-decoration-none">Create New Tag</a>
            </button>
        </div>
        <div class="col-md-12 col-sm-12">

            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->get('danger'))
            <div class="alert alert-danger">
                {{ session()->get('danger') }}
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">
                            Tags
                            <span>
                                <a href="{{ route('note.index') }}" class="text-decoration-none">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </span>
                        </th>
                        <th scope="col">User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notes as $note)
                    <a href="/">
                        <tr class="font-weight-light">
                            <td>
                                <a href="{{ route('note.show', $note->id) }}" class="text-decoration-none">
                                    <i class="fa fa-eye btn-outline-success p-2 rounded-circle"></i>
                                </a>
                            </td>
                            <td>{{substr($note->header,0, 20) }}</td>
                            <td>{{substr( $note->body, 0 , 80 )}}...</td>
                            <td><span class="badge badge-info">
                                    {{ substr($note->tag_name, 0, 10 )}}
                                </span>
                            </td>
                            <td>{{ substr($note->user->name, 0 , 10) }}</td>
                        </tr>
                    </a>
                    @endforeach
                </tbody>
            </table>
            <span class="float-right">
                {{ $notes->links( 'pagination::bootstrap-4' ) }}
            </span>

        </div>
    </div>
</div>
@endsection