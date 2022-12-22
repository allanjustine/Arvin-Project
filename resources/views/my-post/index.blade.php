@extends('base')

@extends('navbar')

@section('title', 'My Post')

@section('content')
    <div class="container m-3">
        <livewire:my-post.index/>
    </div>

@endsection
