@extends('base')

@extends('navbar')

@section('title', 'Recent Post')

@section('content')
    <div class="container m-3">
        <livewire:recent-post.index/>
    </div>

@endsection
