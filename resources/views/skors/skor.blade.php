@extends('skors.index') @section('title', 'Skor pertandingan') @section('content')

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

    <a class="btn btn-info text-white" href="/skor/get_create"
        >Create pertandingan</a
    >

    <!-- tabel klasement -->
    <table class="table text-center bg-light">
        <h2 class="text-center my-5">Tabel Pertandingan</h2>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Klub_1</th>
                <th scope="col">Skor_1</th>
                <th scope="col">Status/point</th>
                <th scope="col">VS</th>
                <th scope="col">Klub_2</th>
                <th scope="col">Skor_2</th>
                <th scope="col">Status_2/point</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- @if($skors) -->
            @foreach($skors as $skor )
            <tr>
                <td>{{$skor->id}}</td>
                <td>{{$skor->klub_name}}</td>
                <td>{{$skor->skor}}</td>
                <td>{{$skor->status}}</td>
                <td><h2>-</h2></td>
                <td>{{$skor->klub_name_2}}</td>
                <td>{{$skor->skor_2}}</td>
                <td>{{$skor->status_2}}</td>
                <td>
                    <a   href="/skor/edit/{{$skor->id}}" class="btn btn-warning text-white col-12"
                        >Edit</a
                    >
                    <a
                        class="btn btn-danger text-white col-12"
                        href="/skor/{{$skor->id}}"
                        onclick="event.preventDefault();
                    document.getElementById(&quot;delete-form-{{$skor->id}}&quot;).submit();
                    "
                        >Hapus</a
                    >
                    <form
                        action="/skor/{{$skor->id}}"
                        method="POST"
                        id="delete-form-{{$skor->id}}"
                        style="display: none"
                    >
                        @method('DELETE') @csrf
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td class='col-12'>
                    <p>Status = -1 (main)</p>
                    <p>Status = 0 (kalah)</p>
                    <p>Status = 1 (seri)</p>
                    <p>Status = 3 (menang)</p>
                </td>
            </tr>
        </tbody>
        <!-- @else -->
            <!-- <tr> -->
                <p>Data kosong</p>
            <!-- </tr> -->
            <!-- @endif -->



    </table>

    <!-- link -->
    <div class="d-flex justify-content-center col-lg-4 ">
        <a class="btn btn-white bg-white border me-2 col-lg-6" href="/klasement">< Klasement</a>
        <a class="btn btn-white bg-white border col-lg-6" href="/skor">Skor ></a>
    </div>
    
</div>

@endsection