@extends('layout')
@section('tytul')
    WSB - dodanie posta
@endsection
@section('podtytul')
    Formularz dodania posta
@endsection
@section('tresc')
@if ($errors->any())
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
    <div>{{ $error }} </div>
@endforeach
</div> 
@endif

    <form action="{{ route('posty.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tytul">Tytuł</label>
            <input type="text" class="form-control" name="tytul" id="tytul" placeholder="Podaj tytuł" value="{{ old('tytul') }}" >
            @if ($errors->has('tytul'))
            <div class="alert alert-danger">
            @foreach ($errors->get('tytul') as $error)
                <div>{{ $error }} </div>
            @endforeach
            </div> 
@endif
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Podaj autora" value="{{ old('autor') }}">
            @if ($errors->has('autor'))
            <div class="alert alert-danger">
            @foreach ($errors->get('autor') as $error)
                <div>{{ $error }} </div>
            @endforeach
            </div> 
@endif
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Podaj adres email" value="{{ old('email') }}">
            @if ($errors->has('email'))
            <div class="alert alert-danger">
            @foreach ($errors->get('email') as $error)
                <div>{{ $error }} </div>
            @endforeach
            </div> 
@endif
        </div>
        <div class="form-group">
            <label for="tresc">Treść</label>
            <textarea class="form-control" name="tresc" id="tresc"  rows="4">{{ old('tresc') }}</textarea>
        </div>
        @if ($errors->has('tresc'))
            <div class="alert alert-danger">
            @foreach ($errors->get('tresc') as $error)
                <div>{{ $error }} </div>
            @endforeach
            </div> 
@endif
        <br>
        <button type="submit" class="btn btn-primary">Dodaj posta</button>
    </form>
@endsection