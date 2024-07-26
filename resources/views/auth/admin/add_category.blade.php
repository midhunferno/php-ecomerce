@extends('auth.admin.main')
@section('contant')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Category</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="{{ route('admins.products.category') }}" method="post"
                                class="tm-edit-product-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Category Name
                                    </label>
                                    <input id="name" name="name" type="text" class="form-control validate"
                                        required />
                                </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Category
                                Now</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>       
    </div>

    <div class="row tm-content-row">     
        <div class=" container col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Category List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Category NO.</th>
                            
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data  as $item )
                        <tr>                          
                            <th scope="row"><b>{{ $item->id }}</b></th>                          
                            <td><b>{{ $item->category_name }}</b></td>
                            <td><a href="{{ route('admins.products.edit_category',$item->id)  }}"><button type="submit">Edit</button></a><br><br>                         
                            <form action="{{ route('admins.products.delete',$item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">delete</button>
                            </form>
                            
                            </td>                           
                        </tr> 
                        @endforeach                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
