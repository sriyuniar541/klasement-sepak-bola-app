@extends('skors.index') @section('title', 'update skor') @section('content')
<div class="container my-5">
    @if($errors->any())
    <div>
        <div
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
        >
            @foreach($errors->all() as $error)
            <strong>{{ $error }}</strong>
            @endforeach
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    </div>
    @endif @if(session()->has('success'))
    <div>
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            <strong>{{ session("success") }}</strong>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    </div>
    @endif

    <form
        action="/skor/update/{{$skor->id}}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf 
        @method('PUT')

        <div class="container bg-light p-2">
            <div class="table my-5 pb-5">
                <div class="row" id="table">
                    <div class="col-6">
                        <h2>Klub 1</h2>
                        <!-- klub name -->
                        <input
                            type="text"
                            class="form-control"
                            name="klub_name"
                            placeholder="klub_name"
                            value="{{ $skor->klub_name }}"
                        />

                        <!-- skor -->
                        <input
                            type="number"
                            class="form-control"
                            name="skor"
                            placeholder="skor"
                            value="{{ $skor->skor }}"
                        />

                        <!-- status -->
                        <input
                            type="number"
                            class="form-control"
                            name="status"
                            placeholder="status"
                            value="{{ $skor->status }}"
                        />
                    </div>

                    <div class="col-6">
                        <h2>Klub 2</h2>

                        <!-- klub 2 -->
                        <input
                            type="text"
                            placeholder="klub_name_2"
                            class="form-control"
                            name="klub_name_2"
                            value="{{ $skor->klub_name_2 }}"
                        />

                        <!-- skor_2 -->
                        <input
                            type="number"
                            class="form-control"
                            name="skor_2"
                            placeholder="skor_2"
                            value="{{ $skor->skor_2 }}"
                        />

                        <!-- status_2 -->
                        <input
                            type="number"
                            class="form-control"
                            name="status_2"
                            placeholder="status_2"
                            value="{{ $skor->status_2 }}"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <button class="btn btn-info text-white">Update</button>
        </div>
    </form>
</div>

@endsection
