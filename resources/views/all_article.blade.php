@extends('layout')
@section ('content')

@php($ctr=0)
  @if (count($articles) > 0)
    @foreach ($articles as $article)
      @if($ctr==0)
      <div class="row">
      @endif
      <div class="col-sm-4">
        <div class="panel panel-info">
          <div class="panel-heading"><h2>{{$article->title}}</h2></div>
            <div class="panel-body">
              <button data-toggle="collapse" data-target="#{{$article->id}}">Read more>></button>
              <div id="{{$article->id}}" class="collapse">
                {{$article->content}}
              </div>
            </div>
        </div>
      </div>
      @php($ctr+=1)
      @if($ctr>=3)
        </div>
        @php($ctr=0)
      @endif
    @endforeach
  @else
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6"><h2>No Article</h2></div>
    <div class="col-sm-3"></div>
  </div>
  @endif
  
  

@endsection




