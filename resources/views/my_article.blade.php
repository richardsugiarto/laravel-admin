@extends('layout')
@section ('content')
<div class="row">
  @if(Session::has('update'))
  <div class="panel panel-success"><div class="panel-heading">
    <div class="row">
      <div class="col-md-12">
        <div class="alert-success">
          {{Session::get('update')}}
        </div>
      </div>
    </div>
  </div></div>
    @endif
    @if(Session::has('delete'))
    <div class="panel panel-success"><div class="panel-heading">
    <div class="row">
      <div class="col-md-12">
        <div class="alert-success">
          {{Session::get('delete')}}
        </div>
      </div>
    </div>
  </div></div>
    @endif
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    @if (count($my_articles) > 0)
    @foreach ($my_articles as $my_article)
    <div class="panel panel-info">
      <div class="panel-heading"><h2>{{$my_article->title}}</h2>
          <form action="/update_article/{{ $my_article->id }}" method="GET">
          <button  class="btn btn-default">Update</button>
          </form>
          <form action="/delete_article/{{ $my_article->id }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button class="btn btn-default">Delete</button>
          </form>
      </div>
      <div class="panel-body">
        <button class="btn btn-default" data-toggle="collapse" data-target="#{{$my_article->id}}">Read more>></button>
        <div id="{{$my_article->id}}" class="collapse">
          {{$my_article->content}}
        </div>
      </div>
    </div>
    @endforeach
    @else
    <h2>Article not found</h2>
    @endif
  </div>
  <div class="col-sm-3"></div>
</div>
@endsection




