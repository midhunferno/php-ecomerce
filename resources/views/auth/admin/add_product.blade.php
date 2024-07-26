@extends('auth.admin.main')
@section('contant')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Product</h2>
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
                            <form action="{{ route('admins.products.store_product') }}" method="post"
                                class="tm-edit-product-form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Product Name
                                    </label>
                                    <input id="name" name="name" type="text" class="form-control validate"
                                        required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Product Image
                                    </label>
                                    <input id="name" name="image" type="file" class="form-control validate"
                                        required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Thump Image
                                    </label>
                                    <input id="name" name="cover" type="file" class="form-control validate"
                                        required />
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
                                        <input id="expire_date" name="expire_date" type="date"
                                            class="form-control validate" />
                                    </div>
                                </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

                            <div class="form-group mb-3">
                                <label for="description">Price</label>
                                <input type="text" name="price" class="form-control validate" rows="3"
                                    required></input>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Seling Price</label>
                                <input type="text" name="seling_price" class="form-control validate" rows="3"
                                    required></input>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Quantity</label>
                                <input type="number" name="quantity" class="form-control validate" rows="3"
                                    required></input>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="discription" class="form-control validate" rows="3" required></textarea>
                            </div>

                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
            <h2 class="tm-block-title">Product List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">PRODUCT NO</th>
                        <th scope="col">PRODUCT NAME</th>
                        <th scope="col">DISCRIPTION</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">SELING PRICE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">EXPIRY DATE</th>
                        <th scope="col">IMAGE</th>               
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>

                  
                 
                    @foreach ($data as $item)
                      
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><b>{{ $item->product_name }}</b></td>                        
                                <td><b>{{ $item->discription }}</b></td>
                                <td><b>{{ $item->price }}</b></td>
                                <td><b>{{ $item->seling_price }}</b></td>
                                <td><b>{{ $item->quantity }}</b></td>
                                <td><b>{{ $item->expire_Date }}</b></td>
                                <td><img style="width: 50px" src="{{ asset($item->thumb_img) }}" alt=""> </td>
                                <td><a href="{{ route('admins.products.pro_edit',$item->id) }}"><button type="submit">Edit</button></a>
                                <form action="" method="post">
                                    <button type="submit">Delete</button>
                                </form>
                                </td>
                            </tr> 
                       
                    @endforeach
                                  
                </tbody>
            </table>
        </div>
    </div>
@endsection
