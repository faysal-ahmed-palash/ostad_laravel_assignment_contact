@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Contact Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $contact->name }}</h5>
            <p class="card-text">Email: {{ $contact->email }}</p>
            <p class="card-text">Phone: {{ $contact->phone }}</p>
            <p class="card-text">Address: {{ $contact->address }}</p>
            <a href="{{ route('contacts.index') }}" class="btn btn-primary">Back to Contacts</a>
        </div>
    </div>
</div>
@endsection
