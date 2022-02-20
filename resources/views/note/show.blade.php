@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <button class="btn btn-primary text-white">
                <a href="{{ route('note.create') }}" class="text-white text-decoration-none">Create New Note</a>
            </button>
        </div>
        <div class="col-12">
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
            <div class="card w-100">
                <div class="card-header">
                    {{$notes->tag_name}}
                    <span class="text-right float-right">
                        <a href="{{ route('note.edit', $notes->id) }}" class="text-decoration-none">
                            <i class="fa fa-pencil btn-info p-2 mx-1 rounded-circle"></i>
                        </a>
                        <a href="{{ route('note.delete', $notes->id) }}" class="delete-note text-decoration-none">
                            <i class="fa fa-trash btn-danger p-2 rounded-circle"></i>
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-left">{!! $notes->header!!}</h5>
                    <p class="card-text text-left">
                        {!!$notes->body!!}
                    </p>
                    <a href="{{route('note.index')}}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-footer text-muted text-right float-right">
                    <span class="font-weight-light"> Created by </span>{{$notes->user->name}}
                </div>
            </div>
                    <img src="{{$notes->image}}" class="card-img-top" alt="...">
                
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.delete-note').on('click', function() {
            return confirm('Are you sure you want to delete this note?');
        });
    });
</script>
@endsection