@extends('layouts.admin')

@section('content')
    @include('admin.partials.page-title')

    <livewire:admin.user-list />
@endsection
