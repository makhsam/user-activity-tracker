@extends('layouts.app')

@section('content')
<div class="container">
    <h3>List of clients</h3>

    <table class="table table-hover bg-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>{{ $client->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
