@extends('admin.layouts.master')

@section('title', 'Thẻ sim')

@section('contents')

{{-- @livewire('sim-cards.search-sim-card') --}}
@livewire('sim-cards.list-sim-card')
@livewire('sim-cards.crud-sim-card')
@livewire('sim-cards.sim-card-info')

@endsection