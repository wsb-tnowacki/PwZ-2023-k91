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
        <th scope="col">Akcja</th>
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
        <td class="d-flex flex-row"><a href="{{route('posty.edit', $post->id)}}"><button class="btn btn-success m-1" type="button">E</button></a>
        <form action="{{route('posty.destroy', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger m-1" type="submit">X</button>
        </form></td>
      </tr>
      @endforeach
      @else
      <tr>
        <th scope="row" colspan="5">Nie ma żadnych postów</th>
      </tr>
      @endif
      
    </tbody>
  </table>
@endsection