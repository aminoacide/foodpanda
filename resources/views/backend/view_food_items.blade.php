@extends('backend.layouts.app')


@section('content')

@if(Session::has('message'))
<div class="row">
    <div class="col-xs-3"></div>
    <div class="col-xs-6">
        <div align="center">
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
        </div>
    </div>
</div>
@endif

<div class="items-table">
    <table>
        <thead>
            <tr>
               

                <th class="item-head">Restaurant Menu</th>
                

            </tr>
        </thead>
        <tbody>

            @foreach($category as $catego)
            <td class="item-data">{{$catego->category}}</td>
                @foreach($catego->Items as $items)
            <tr>
                
                <td class="item-data">{{$items->name}}</td>
                <td class="item-data"><i class="fa fa-inr" aria-hidden="true"></i> {{$items->price}}</td>
                <td class="item-data"> <a href="{{ route ('admin.items.edit', ['restro_item_id'=>$items->id]) }}" class="btn btn-info btn-lg edit-del-btn">
                        <span class="glyphicon glyphicon-edit  edit-del "></span></td>
                <td class="item-data">
                    {{ Form::open(['route' => ['admin.items.destroy', $items->id], 'method' => 'delete']) }}
                    {{ csrf_field() }}

                    {{Form::button('<span class="glyphicon glyphicon-trash edit-del"></span>', array('type' => 'submit', 'class' => 'btn btn-info btn-lg edit-del-btn del-btn'))}}
                    {{ Form::close() }}<br>
                </td>
            </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

@endsection
