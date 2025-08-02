@extends('layouts.app')

@section('title', 'DsignLoft Client Dashboard')

@section('content')
<div id="dashboard-app">
    <!-- Tab Content Components -->
    @include('components.brief-tab')
    @include('components.files-tab')
    @include('components.messages-tab')
    @include('components.payment-tab')

    <!-- Modal Components -->
    @include('components.modals.edit-brief-modal')
    @include('components.modals.upload-modal')
    @include('components.modals.payment-modal')
    @include('components.modals.attachment-modal')
    @include('components.modals.complete-project-modal')
    @include('components.modals.new-quote-modal')
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/dashboard-vue.js') }}"></script>
@endpush

