@extends('template')  

@section('title')Главная страница@endsection 

@section('main_content')
<!--------------------------------------------------------------------------------------------------------->

<x-app-layout>
    <x-slot name="header">

    </x-slot>
    
    <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
       <!-- <img src="https://www.stylist.co.uk/images/app/uploads/2019/12/17162852/the-end-of-a-book-1268x845.jpeg?w=1200&h=1&fit=max&auto=format%2Ccompress" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy"> -->
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3 text-white">Библиотека</h1>
        <p class="lead text-white">Тут ты можешь выбрать книгу себе по душе</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="/order" class="btn btn-primary btn-lg px-4 me-md-2" role="button" aria-pressed="true">Заказать книгу</a>
        <a href="/members" class="btn btn-outline-secondary btn-lg px-4" role="button" aria-pressed="true">Участники</a>
          <!--<button  type="button" class="btn btn-primary btn-lg px-4 me-md-2">Заказать книгу</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">О нас</button>-->
        </div>
      </div>
    </div>
  </div>
</x-app-layout>      

<!--------------------------------------------------------------------------------------------------------->

@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
          
<!--------------------------------------------------------------------------------------------------------->


@endsection
