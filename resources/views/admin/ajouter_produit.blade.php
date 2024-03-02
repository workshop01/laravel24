@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('save_produit') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">description</label>
                <input type="text" name="description" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Categories</label>
                <select name="category_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
                    @foreach ($categories as $categ)
                        <option value="{{ $categ->id }}"> {{ $categ->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">price</label>
                <input type="number" name="price" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Is new ?</label>
                <input type="checkbox" name="new" value="1" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Is bast seller ?</label>
                <input type="checkbox" name="best_seller" value="1" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Hot ?</label>
                <input type="checkbox" name="hot" value="1" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">image</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
