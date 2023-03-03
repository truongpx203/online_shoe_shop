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
            <h3 class="card-title">Add New</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{ route('product.store') }}"  enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="col-12 mt-4">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 col-form-label">price</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{ old('price') }}" class="form-control" name="price" id="price" placeholder="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="id_category" class="form-control" id="">
                            @foreach($cate as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }} </option>
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
                      <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ old('description') }}</textarea>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('product.index') }}"> <button class="btn btn-secondary">Back</button></a> <button type="submit" class="btn btn-success float-right">Submit</button>
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
