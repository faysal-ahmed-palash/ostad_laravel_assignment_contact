@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Contacts</h1>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Create Contact</a>
    <form method="GET" action="{{ route('contacts.index') }}" class="mb-3">
        <input type="text" name="search" placeholder="Search by name or email" value="{{ request()->search }}">
        <button type="submit" class="btn btn-info">Search</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th><a href="{{ route('contacts.index', ['sort' => 'name', 'direction' => request()->direction == 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th><a href="{{ route('contacts.index', ['sort' => 'created_at', 'direction' => request()->direction == 'asc' ? 'desc' : 'asc']) }}">Created At</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ $contact->created_at }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
@endsection
