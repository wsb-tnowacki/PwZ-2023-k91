@extends('layout')
@section('tytul')
    WSB - lista postów
@endsection
@section('podtytul')
    Lista postów
@endsection
@section('tresc')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Lp</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Autor</th>
        <th scope="col">Czas dodania</th>
      </tr>
    </thead>
    <tbody>
      @if ($posty->count())
      @foreach ($posty as $post)
      <tr>
        <th scope="row">{{ $post['id'] }}</th>
        <td><a href="{{route('posty.show', $post->id)}}">{{ $post['tytul'] }}</a></td>
        <td>{{ $post->autor }}</td>
        <td>{{ date('j F Y H:i:s', strtotime($post->created_at)) }}</td>
      </tr>
      @endforeach
      @else
      <tr>
        <th scope="row" colspan="4">Nie ma żadnych postów</th>
      </tr>
      @endif
      
    </tbody>
  </table>
@endsection