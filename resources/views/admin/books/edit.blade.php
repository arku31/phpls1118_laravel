@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Books</div>
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                               <li style="color: red"> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{route('books.update', $book->id)}}" method="post">
                            @method('put')
                            @csrf
                            <input type="text" name="name" value="{{$book->name}}"/>

                            <select name="user_id" id="">
                                @foreach ($users as $user)
                                     <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
