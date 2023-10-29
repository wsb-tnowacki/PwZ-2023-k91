@extends('layout')
@section('tytul')
    WSB - dodanie posta
@endsection
@section('podtytul')
    Formularz dodania posta
@endsection
@section('tresc')
    <form action="{{ route('posty.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tytul">Tytuł</label>
            <input type="text" class="form-control" name="tytul" id="tytul" placeholder="Podaj tytuł">
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Podaj autora">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Podaj adres email">
        </div>
        <div class="form-group">
            <label for="tresc">Treść</label>
            <textarea class="form-control" name="tresc" id="tresc"  rows="4"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Dodaj posta</button>
    </form>
@endsection