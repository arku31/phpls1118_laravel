@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Books</div>
                    <div class="card-body">
                        <a href="{{route('books.create')}}" class="btn">
                            Create
                        </a>
                    </div>
                    <div class="card-body">
                       <table class="table">
                           <tr>
                               <th>Book name</th>
                               <th>User name</th>
                               <th>Actions</th>
                           </tr>

                           @foreach ($books as $book)
                               <tr>
                                   <td>{{$book->name}}</td>
                                   <td>{{$book->user->name}}</td>
                                   <td>
                                       <a href="{{route('books.edit', [$book->id])}}" class="btn">
                                           Edit
                                       </a>
                                       <a href="{{route('books.destroyshort', $book->id)}}">
                                           Delete short
                                       </a>
                                       <form action="{{route('books.destroy', $book->id)}}" method="post">
                                           @csrf
                                           @method('delete')
                                           <input type="submit" value="Delete">
                                       </form>
                                   </td>
                               </tr>
                           @endforeach
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
