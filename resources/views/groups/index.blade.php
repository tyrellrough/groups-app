@extends('layouts.template')

@section('title', "Groups")


@section('content')
    <p>Groups go here</p>
    @foreach ($groups as $group)
            <li><a href=""> {{ $group->name }}</li>
        @endforeach
@endsection