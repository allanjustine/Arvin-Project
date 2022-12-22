@extends('base')

@include('navbar')

@section('title', 'Dashboard')

@section('content')
    <div class="container m-3">
        <h1 class="text-center offset-sm-2">Dashboard</h1>
        <div class="card col-sm-4 offset-sm-5 border border-light mt-5">
            <div class="card-header">
                <h1 class="text-center">Final Project</h1>
            </div>
            <div class="card-body shadow">
                <h2 class="text-center">This is my Final Project</h2>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, quos quia temporibus in corporis culpa dignissimos aspernatur. Aut quo qui harum aliquam esse expedita molestiae eius illo rerum quisquam eos error consectetur necessitatibus, sit minima corrupti voluptatibus omnis! Repudiandae vel et earum corporis, nesciunt iusto dignissimos laborum animi perferendis atque?
            </div>
        </div>
    </div>

@endsection

<style>
    .card {
        background-color: #bd4bb1;
        background-image: url("images/bg.gif");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        color: white;
    }
</style>
