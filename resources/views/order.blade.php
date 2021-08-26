@extends('template')  

@section('title')Книги@endsection 

@section('main_content')
<x-app-layout>
    <x-slot name="header">

    </x-slot>
    
    <div class="container col-xxl-8 px-4 py-5 text-white">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/order/check">
        @csrf
        <h3>Фамилия</h3>
        <input type="lstName" name="lstName" id="lstName" placeholder="Введите фамилию" class="form-control my-input"><br>
        <h3>Имя</h3>
        <input type="frstName" name="frstName" id="frstName" placeholder="Введите имя" class="form-control my-input"><br>
        <h3>ФИО автора</h3>
        <input type="author" name="author" id="author" placeholder="Введите ФИО автора" class="form-control my-input" ><br>
        <h3>Название книги</h3>
        <input type="book" name="book" id="book" placeholder="Введите название книги" class="form-control my-input" ><br>
        <button id="orderBtn" type="submit" class="btn btn-success">Заказать</button>
    </form>
</div>
</x-app-layout>  
@endsection