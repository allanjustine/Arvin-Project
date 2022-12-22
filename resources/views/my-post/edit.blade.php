@extends('base')

@extends('navbar')

@section('title', 'Edit')

@section('content')

    <div class="container m-5">
        <livewire:my-post.edit :postId="$id"/>
    </div>
    
@endsection
