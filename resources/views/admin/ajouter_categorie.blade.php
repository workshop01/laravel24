@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('save_categorie') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
            </div>





            <div class="form-group">
                <label for="exampleInputEmail1">image</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
