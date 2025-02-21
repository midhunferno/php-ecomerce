@extends('auth.admin.main')
@section('contant')
{{-- edit category --}}

<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Edit Category</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="{{ route('admins.products.category_update',$data->id) }}" method="post" class="tm-edit-product-form">
                            @csrf
                            @method('put')
                            <div class="form-group mb-3">
                                <label for="name">Category Name
                                </label>
                                <input id="name" value="{{ $data->category_name }}" name="name" type="text" class="form-control validate"
                                    required />
                            </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Update
                            Now</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection