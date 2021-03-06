@extends('layouts.master')

@section('title')
myCloset - Edit Item
@stop

@section('head')
<style>

th, td {
    padding-bottom: 5px;
    padding-right: 5px;
}

input[type=text] {
    width: 110px;
    font-size: 1em;
}
.itemImage {
    text-align: center;
}

h1,h3 {
    text-align: center;
}
</style>
@stop

@section('content')
<!--
    *
    *
    Generated by edit.blade.php
    *
    *
-->

<div class="container">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

        <h1>Edit Item</h1>
        <div class="itemImage">
        <img src="{{$item->src}}" class="img-thumbnail"/>
        </div>
        <br>

</div>
<div class="col-md-4"></div>
</div>

<div class="row">
<div class="col-md-5"></div>
<div class="col-md-2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Tags</h3>
      </div>
      <div class="panel-body">
          <table style="background:transparent;">
              @foreach($item->tags as $tag)
                  <tr>
                      <td>
                          <a href="/tags/{{$tag->name}}" class="btn btn-primary btn-sm btn-block">{{$tag->name}}</a>
                      </td>

                      <td>
                          <form action="/tags/unlink" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              {!! Form::hidden('item_id', $item->id) !!}
                              {!! Form::hidden('tag_id', $tag->id) !!}
                          <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                          </form>

                      </td>
                  </tr>
              @endforeach
              <tr>
                  <td>

                      <form action="/tags/link" method="post">
                          <div class="form-group">
                              {{ csrf_field() }}
                              {!! Form::hidden('item_id', $item->id) !!}
                              <input class="form-control input-sm" type="text" autofocus placeholder="Tag" name="tag">
                          </div>
                          </td>
                          <td>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-xs btn-info glyphicon glyphicon-ok"></button>
                              </form>
                          </div>
                      </div>
                  </td>
              </tr>
          </table>
      </div>
  </div>
    <div class="form-group">
            <form method="POST" action="/items/{{$item->id}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

                <label for="sel1">Change where worn to:</label>
                <select class="form-control" name="type" id="sel1" onchange='this.form.submit()'>

                    <option {{ ($item->type == "top") ? "SELECTED" : ''}}>Top</option>
                    <option {{ ($item->type == "bottom") ? "SELECTED" : ''}}>Bottom</option>
                    <option {{ ($item->type == "shoe") ? "SELECTED" : ''}}>Shoes</option>
                    <!-- <option {{ ($item->type == "accessory") ? "SELECTED" : ''}}>Accessory</option> -->
                </select>
            </div>
        </form>

    <div class="form-group">
        <form action="/items/{{$item->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn-block btn btn-danger">Delete Item</button>
        </form>
        <p class="text-warning"><strong>Warning: Deleting this item will delete any outfits associated with this item.</strong></p>
    </div>

@if(count($errors) > 0)
    @include('_partials.validation')
@endif

</div>

<div class="col-md-5"></div>
</div>
</div>


<!--
    *
    *
    END edit.blade.php
    *
    *
-->

@stop
