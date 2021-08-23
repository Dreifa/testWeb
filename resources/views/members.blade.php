@extends('template')  

@section('title')Участники@endsection 

@section('main_content')

<div class="container col-xxl-8 px-4 py-5 text-white">
<h1>Все участники</h1>
    @foreach($books as $book)
        <div class = "alert alert-warning">
            <h3>{{ $book->lstName }}  {{$book->frstName}}</h3>
            <b>{{ $book->author }}: {{ $book->book }}</b><br>
            <a href="{{ route('member_check', $book->member_id)}}" class="btn btn-danger btn-sm px-4 me-md-2" id='$book->id' role="button" aria-pressed="true">Удалить запись</a>
        </div>
    @endforeach
</div>
@endsection