@extends('klasements.index') @section('title', 'create') @section('content')

<div class="my-5 p-5 col-lg-4 col-10 offset-lg-4 offset-1 bg-light">
    <form
        action="/klasement/create"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="row mb-3">
            <label for="klub_name" class="col-form-label">Nama Klub</label>
            <div>
                <input
                    name="klub_name"
                    type="text"
                    class="form-control @error('klub_name') is-invalid @enderror"
                    id="klub_name"
                    value="{{ old('klub_name') }}"
                    required
                />
                @error('klub_name')
                <div id="klub_name" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="klub_city" class="col-form-label">Kota Klub</label>
            <div>
                <input
                    name="klub_city"
                    type="city"
                    class="form-control @error('klub_city') is-invalid @enderror"
                    id="klub_city"
                    value="{{ old('klub_city') }}"
                    required
                />
                @error('klub_city')
                <div id="klub_city" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection
