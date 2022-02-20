@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 d-flex">
            <div class="col-md-8 col-sm-12 mb-4">
                <ul class="list-group">
                    @forelse($tags as $tag)
                    <li class="list-group-item">{{$tag->name}}

                        <span class="text-right float-right">
                           
                            <a href="{{ url('note-tag/delete', $tag->id) }}" class="delete-note text-decoration-none">
                                <i class="fa fa-trash btn-danger p-2 rounded-circle"></i>
                            </a>
                        </span>
                    </li>
                    @empty
                    <li class="list-group-item">No items</li>
                    @endforelse
                </ul>
            </div>
            <div class="col-md-4 col-sm-12 mb-4 ">
                @if(session()->get('success'))
                <div class="alert alert-success ">
                    {{ session()->get('success') }}
                </div>
                @elseif(session()->get('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div>
                @endif

                <form action="{{ url('note-tag/store') }}" method="POST">
                    @csrf
                    <div class="form-group card">
                        <label for="name" class="form-label card-header">Enter new tag</label>
                        <div class="card-body">
                            <input type="text" class="form-control " id="" name="name" placeholder=".." required>

                            <br>
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    @endsection