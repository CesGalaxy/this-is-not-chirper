@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Status')
@section('content_header_title', 'Debug')
@section('content_header_subtitle', 'Status')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
    {{-- Minimal without header / body only --}}
    <x-adminlte-card theme="lime" theme-mode="outline">
        A card without header...
    </x-adminlte-card>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush
