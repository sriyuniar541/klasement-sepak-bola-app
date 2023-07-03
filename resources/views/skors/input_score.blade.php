@extends('skors.index') @section('title', 'klasement') @section('content')
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

    <form action="/skor/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container bg-light p-2">
            <div class="table my-5 pb-5">
                <div class="row" id="table">
                    <div class="col-6">
                        <h2>Klub 1</h2>
                        <!-- klub name -->
                        <input
                            type="text"
                            class="form-control"
                            name="inputs[0][klub_name]"
                            placeholder="klub_name"
                            value="{{ old('inputs[0][klub_name]') }}"
                        />

                        <!-- skor -->
                        <input
                            type="number"
                            class="form-control"
                            name="inputs[0][skor]"
                            placeholder="skor"
                            value="{{ old('inputs[0][skor]') }}"
                        />

                        <!-- status -->
                        <input
                            type="number"
                            class="form-control"
                            name="inputs[0][status]"
                            placeholder="status"
                            value="{{ old('inputs[0][status]') }}"
                        /> 
                    </div>

                    <div class="col-6">
                        <h2>Klub 2</h2>

                        <!-- klub 2 -->
                        <input
                            type="text"
                            placeholder="klub_name_2"
                            class="form-control"
                            name="inputs[0][klub_name_2]"
                            value="{{ old('inputs[0][klub_name_2]') }}"
                        />

                        <!-- skor_2 -->
                        <input
                            type="number"
                            class="form-control"
                            name="inputs[0][skor_2]"
                            placeholder="skor_2"
                            value="{{ old('inputs[0][skor_2]') }}"
                        />
        
                        <!-- status_2 -->
                        <input
                            type="number"
                            class="form-control"
                            name="inputs[0][status_2]"
                            placeholder="status_2"
                            value="{{ old('inputs[0][status_2]') }}"  
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <button class="btn btn-info text-white col-3 col-lg-1 me-2">Save</button>
            <button type="button" name="add" id="add" class="btn btn-primary text-white col-3 col-lg-1">
                Add
            </button>
        </div>
    </form>
</div> 

<script>
    let i = 0;
     $('#add').click(function(){
         ++i;
     $('#table').append(
         `
         <div class="row m-2" id="table">
            <div class="tr d-flex">
                     <div class="col-6">
                        <h2>Klub 1</h2>
                        <!-- klub name -->
                        <input
                            type="text"
                            class="form-control"
                            name="inputs[`+i+`][klub_name]"
                            placeholder="klub_name"
                            value="{{ old('inputs[`+i+`][klub_name]') }}"
                        />

                        <!-- skor -->
                        <input
                            type="number"
                            class="form-control"
                            name="inputs[`+i+`][skor]"
                            placeholder="skor"
                            value="{{ old('inputs[`+i+`][skor]') }}"
                        />

                        <!-- status -->
                        <input
                            type="number"
                            class="form-control"
                            name="inputs[`+i+`][status]"
                            placeholder="status"
                            value="{{ old('inputs[`+i+`][status]') }}"
                        /> 
                    </div>

                    <div class="col-6">
                        <h2>Klub 2</h2>

                        <!-- klub 2 -->
                        <input
                            type="text"
                            placeholder="klub_name_2"
                            class="form-control"
                            name="inputs[`+i+`][klub_name_2]"
                            value="{{ old('inputs[`+i+`][klub_name_2]') }}"
                        />

                        <!-- skor_2 -->
                        <input
                            type="number"
                            class="form-control"
                            name="inputs[`+i+`][skor_2]"
                            placeholder="skor_2"
                            value="{{ old('inputs[`+i+`][skor_2]') }}"
                        />
        
                        <!-- status_2 -->
                        <input
                            type="number"
                            class="form-control"
                            name="inputs[`+i+`][status_2]"
                            placeholder="status_2"
                            value="{{ old('inputs[`+i+`][status_2]') }}"  
                        />
                        
                          <div>
                        <button class="btn btn-danger col-4 m-2 remove-table-row">delete</button>
                    </div>
                     </div>
                    
                    </div>
                 </div>
         `);
    })

     $(document).on('click', '.remove-table-row', function() {
        $(this).parents('.tr').remove();
    })
</script>

@endsection
