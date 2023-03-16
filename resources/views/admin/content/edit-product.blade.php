@extends('admin.app')

@section('title', 'product')

@section('header')
    @include('admin.content_head', [
        'pageTitle' => 'Product',
    ])
@endsection

@section('content')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Edit New</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{ route('product.edit', $product->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" id="name" placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $product->price }}" name="price" id="price" placeholder="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="id_category" class="form-control" id="">
                            @foreach($cate as $item)
                                <option value="{{ $item->id }}" @if($product->id_category == $item->id)  selected @endif> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="image" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-6">
                    <input type="file" class="form-control" name="image" id="image" placeholder="image">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-6">
                      <textarea class="form-control" name="description" id="" cols="30" rows="5"> {{ $product->description }}</textarea>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('products.index') }}"> <button class="btn btn-secondary">Back</button></a> <button type="submit" class="btn btn-success float-right">Submit</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#table-tenants').DataTable({
                serverSide: false,
                lengthChange: true,
                pageLength: 10,
                deferLoading: 20,
            });
        });
    </script>
@endsection
