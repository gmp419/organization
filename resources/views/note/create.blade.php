@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
                    <span class="font-weight-bold">
                        Add new note
                    </span>

                </div>
                <div class="card-body">
                    <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tag</label>
                            <input type="text" class="form-control" id="" name="tag_name" placeholder="..">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" id="" name="header" placeholder="Heading..">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Details</label>
                            <textarea class="form-control" id="" name="body" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Images:</label>
                            <input class="form-control pb-3" type="file" name="note_image" id="">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                Save Changes
                            </button>
                        </div>
                    </form>
                 
                </div>
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