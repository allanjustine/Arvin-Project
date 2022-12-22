@extends('base')

@extends('navbar')

@section('title', 'Delete')

@section('content')

    <div class="container mx-auto m-5">
        <livewire:my-post.delete :postId="$id"/>
    </div>
    
@endsection
