@extends('layouts.app')
@section('content')

<a class="btn btn-primary" href="{{route('ajouter_categorie')}}"> Ajouter </a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>

        <th scope="col">image</th>
        <th>Actions<th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $p)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->title}}</td>

                <td>
                    <img src="{{ env('APP_IMAGE') }}{{ $p->image }}" style="width: 50px" alt="">
                </td>

                <td>
                    <form action="{{route('delete_categorie' , $p->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>


                </td>

                <td>
                    <button type="button" class="btn btn-waring" data-bs-toggle="modal" data-bs-target="#exampleModal{{$p->id}}">
                       Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('edit_categorie' , $p->id) }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">title</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Enter email" value="{{$p->title}}">
                                    </div>






                                    <div class="form-group">
                                        <label for="exampleInputEmail1">image</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                          </div>
                        </div>
                      </div>
                </td>
            </tr>
      @endforeach

    </tbody>
  </table>

@endsection
