@extends('base')

@extends('navbar')

@section('title', 'Users')

@section('content')
    <div class="container">
                @if (session('message'))
                    <div class="alert alert-success mt-5">{{ session('message') }}</div>
                @endif
        <livewire:admin.users.index/>
    </div>

@endsection