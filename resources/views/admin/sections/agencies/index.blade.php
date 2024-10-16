@extends('admin.layouts.master')

@section('title', 'Đại lý')

@section('contents')

{{-- @livewire('agencies.search-agency') --}}
@livewire('agencies.list-agency')
@livewire('agencies.crud-agency')
@livewire('agencies.agency-info')

@endsection