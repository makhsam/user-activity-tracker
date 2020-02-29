@extends('layouts.app')

@section('content')
<div class="container">
    {{-- DIsplay List of websites --}}
    
    <h4>List of websites of <b>{{ $name }}</b></h4>

    <table class="table bg-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">URL</th>
                <th scope="col">Token</th>
                
                @can('is-admin')
                    <th scope="col">Plan</th>
                    <th scope="col">Activated</th>
                @endcan

                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sites as $site)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $site->name }}</td>
                    <td><a href="http://{{ $site->url }}" target="_blank">www.{{ $site->url }}</a></td>
                    <td><input type="text" class="site-input" readonly value="{{ $site->token }}"></td>

                    @can('is-admin')
                        <td>{{ $site->plan }}</td>
                        <td><input type="checkbox" {{ $site->activated ? 'checked' : '' }}></td>
                    @endcan

                    <td>
                        <a class="btn btn-sm btn-primary" href="/users/{{$userId}}/sites/{{$site->id}}/clients">Clients</a>
                        @can('is-admin')
                            <a class="btn btn-sm btn-success" href="#">Devices</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>


    {{-- Create a new website --}}

    @can('is-admin')
        <form class="mt-4" action="/users/{{$userId}}/sites" method="post">
            @csrf
            <h4>Add a website:</h4>

            {{-- Enter Name --}}
            <div class="form-group row">
                <label for="name" class="col-md-1 col-form-label">Name:</label>
                <div class="col-md-11">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Enter URL --}}
            <div class="form-group row">
                <label for="url" class="col-md-1 col-form-label">URL:</label>
                <div class="col-md-11">
                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}">
                    
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Enter Plan --}}
            <div class="form-group row">
                <label for="url" class="col-md-1 col-form-label">Plan:</label>
                <div class="col-md-11">
                    {{-- Option 1: FREE --}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="plan" id="free-plan" value="FREE" checked>
                        <label class="form-check-label" for="free-plan">FREE</label>
                    </div>
                    {{-- Option 2: STANDARD --}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="plan" id="standard-plan" value="STANDARD">
                        <label class="form-check-label" for="standard-plan">STANDARD</label>
                    </div>
                    {{-- Option 3: PREMIUM --}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="plan" id="premium-plan" value="PREMIUM">
                        <label class="form-check-label" for="premium-plan">PREMIUM</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create a website</button>
        </form>
    @endcan
    
</div>
@endsection
