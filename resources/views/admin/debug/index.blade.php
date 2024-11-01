@extends('admin.layouts.app')

@section('subtitle', 'Status')
@section('content_header_title', 'Debug Tools')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>

    {{-- Work in progress --}}
    <x-adminlte-alert theme="warning" title="Work in progress!">
        This page may change in the future for showing more information and tools.
    </x-adminlte-alert>
    <div>

    </div>
    <x-adminlte-card theme="lime" theme-mode="outline">
        <i class="fas fa-fw fa-check text-success"></i>
        All systems are operational.
    </x-adminlte-card>
@stop
