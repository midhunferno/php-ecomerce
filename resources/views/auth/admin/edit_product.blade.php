@extends('auth.admin.main')

@section('contant')

<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                    </div>
                </div>


                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="{{ route('admins.products.update_pro',$data->id ) }}" method="post"
                            class="tm-edit-product-form" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group mb-3">
                                <label for="name">Product Name
                                </label>
                                <input id="name" value="{{ $data->product_name }}" name="name" type="text" class="form-control validate"
                                     />
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Product Image
                                </label>
                                @if (isset($data->image))
                                  <div class="mb-2">
                                    <img src="{{ asset($data->image) }}" alt="Current Thumbnail" style="max-width: 100px;">
                                  </div>                   
                                @endif
                                <input id="name" name="image" type="file" class="form-control validate" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Thump Image
                                </label>
                            @if(isset($data->thumb_img))
                                <div class="mb-2">
                                    <img src="{{ asset($data->thumb_img) }}" alt="Current Thumbnail" style="max-width: 100px;">
                                </div>
                            @endif
                                <input id="name" name="cover" type="file" class="form-control validate"/>
                            </div>



                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="custom-select tm-select-accounts" name="category" id="category">
                                    @foreach ($get_category as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="expire_date">Expire Date
                                    </label>
                                    <input value="{{ $data->expire_Date }}" id="expire_date" name="expire_date" type="date"
                                        class="form-control validate" />
                                </div>
                            </div>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

                        <div class="form-group mb-3">
                            <label for="description">Price</label>
                            <input type="text" value="{{ $data->price }}" name="price" class="form-control validate"></input>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Seling Price</label>
                            <input type="text" value="{{ $data->seling_price }}" name="seling_price" class="form-control validate" rows="3"></input>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Quantity</label>
                            <input type="number" value="{{ $data->quantity }}" name="quantity" class="form-control validate" rows="3"></input>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea  name="discription" class="form-control validate" rows="3">{{ old('discription', $data->discription) }}</textarea>
                        </div>

                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Product Now</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection