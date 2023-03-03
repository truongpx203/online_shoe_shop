@extends('admin.app')

@section('title', 'product')

@section('header')
    @include('admin.content_head', [
        'pageTitle' => 'Product',
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header ui-sortable-handle">
            <h3 class="card-title">
                product
            </h3>
          <a class="float-right" href="{{ route('product.create') }}"><button class="btn btn-primary" type="button">Add New</button></a>
        </div>
        <div class="card-body">
            <div class="table-content" >
                <table class="table table-bordered table-custom table-users-wrap" id="table-tenants">
                    <thead>
                        <tr>
                            <th width="5%">id</th>
                            <th width="10%">Name</th>
                            <th width="10%">Image</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $item)
                         <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset('storage/image/'.$item->image ) }}" alt="" width="100px"/></td>
                            <td class="text-center">
                               <a href="{{ route('product.show' , $item->id) }}"><button class="btn btn-warning">Edit</button></a>
                               <a href="{{ route('product.destroy' , $item->id) }}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#table-tenants').DataTable({
            serverSide: false,
            lengthChange : false,
            pageLength: 10,
            deferLoading: 20,
            searching: false
        });
    });
</script>
@endsection
