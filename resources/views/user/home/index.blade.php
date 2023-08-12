@extends('layouts.user')

@section('content')
    <x-header.user></x-header.user>
    @include('user.partials.section.hero')
    <x-footer.user></x-footer.user>
@endsection
