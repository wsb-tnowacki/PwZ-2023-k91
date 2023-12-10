@extends('layout')
@section('tytul')
    WSB - edycja posta
@endsection
@section('podtytul')
    Formularz edycji posta
@endsection
@section('tresc')
@if ($errors->any())
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
    <div>{{ $error }} </div>
@endforeach
</div> 
@endif

    <form action="{{ route('posty.update', $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tytul">Tytuł</label>
            <input type="text" class="form-control" name="tytul" id="tytul" placeholder="Podaj tytuł" value="@if(old('tytul') !== null) {{old('tytul')}} @else {{$post->tytul}} @endif" >
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
            <input type="text" class="form-control" name="autor" id="autor" placeholder="Podaj autora" value="@if(old('autor') !== null) {{old('autor')}} @else {{$post->autor}} @endif">
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
            <input type="email" class="form-control" name="email" id="email" placeholder="Podaj adres email" value="@if(old('email') !== null) {{old('email')}} @else {{$post->email}} @endif">
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
            <textarea class="form-control" name="tresc" id="tresc"  rows="4">@if(old('tresc') !== null) {{old('tresc')}} @else {{$post->tresc}} @endif</textarea>
        </div>
        @if ($errors->has('tresc'))
            <div class="alert alert-danger">
            @foreach ($errors->get('tresc') as $error)
                <div>{{ $error }} </div>
            @endforeach
            </div> 
@endif
        <br>
        <button type="submit" class="btn btn-success m-1">Zmień posta</button>
        <form action="{{route('posty.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger m-1" type="submit">Usuń posta</button>
            </form>
        <a href="{{route('posty.index')}}"><button type="button" class="btn btn-primary m-1">Powrót do listy postów</button></a>
    </form>
@endsection