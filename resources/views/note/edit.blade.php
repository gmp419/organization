@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-header">
                    <span class="font-weight-bold">
                        Edit Note
                    </span>
                    <span class="text-right float-right">
                        <a href="{{ route('note.delete', $notes->id) }}" class="delete-note text-decoration-none">
                            <i class="fa fa-trash btn-danger p-2 rounded-circle"></i>
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <form action="{{ route('note.update', $notes->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Tag</label>
                            <input type="text" class="form-control" id="" name="tag_name" value="{{$notes->tag_name}}" placeholder="..">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" id="" name="header" value="{{$notes->header}}" placeholder="Heading..">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Details</label>
                            <textarea class="form-control" id="" name="body" rows="10">{{$notes->body}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Images:</label>
                            <input class="form-control pb-3" type="file" name="images" id="formFileMultiple" multiple>
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