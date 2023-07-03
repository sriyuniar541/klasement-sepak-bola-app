@extends('klasements.index') @section('title', 'klasement') @section('content')

<div class="col-10 offset-1 my-5 bg-light p-5">
    @if(session()->has('success'))
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

    <a class="btn btn-info text-white" href="/klasement/get_create"
        >Create klub</a
    >

    <!-- tabel klasement -->
    <table class="table text-center bg-light">
        <h2 class="text-center my-5">Tabel Klasement</h2>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Klub</th>
                <th scope="col">Main</th>
                <th scope="col">Menang</th>
                <th scope="col">Seri</th>
                <th scope="col">Kalah</th>
                <th scope="col">Gol Menang</th>
                <th scope="col">Gol Kalah</th>
                <th scope="col">Point</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($klasements as $klasement )
            <tr>
                <td scope="row">{{$klasement->id}}</td>
                <td scope="row">{{$klasement->klub_name}}</td>
                <td>{{$klasement->main}}</td>
                <td>{{$klasement->menang}}</td>
                <td>{{$klasement->seri}}</td>
                <td>{{$klasement->kalah}}</td>
                <td>{{$klasement->gol_menang}}</td>
                <td>{{$klasement->gol_kalah}}</td>
                <td>{{$klasement->point}}</td>
                <td>
                    <a
                        class="btn btn-warning text-white"
                        href="/klasement/edit/{{$klasement->id}}"
                        >Edit</a
                    >
                    <a
                        class="btn btn-danger text-white"
                        href="/klasement/{{$klasement->id}}"
                        onclick="event.preventDefault();
                    document.getElementById(&quot;delete-form-{{$klasement->id}}&quot;).submit();
                    "
                        >Hapus</a
                    >
                    <form
                        action="/klasement/{{$klasement->id}}"
                        method="POST"
                        id="delete-form-{{$klasement->id}}"
                        style="display: none"
                    >
                        @method('DELETE') @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

     <!-- link -->
     <div class="d-flex justify-content-center col-lg-4 ">
        <a class="btn btn-white bg-white border me-2 col-lg-6" href="/klasement">< Klasement</a>
        <a class="btn btn-white bg-white border col-lg-6" href="/skor">Skor ></a>
    </div>
</div>

@endsection
