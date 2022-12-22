@extends('base')

@extends('navbar')

@section('title', 'Create')

@section('content')

    <div class="container m-5">
        <div class="col-sm-5 offset-4">

            <livewire:admin.users.create/>

        </div>
    </div>

@endsection
