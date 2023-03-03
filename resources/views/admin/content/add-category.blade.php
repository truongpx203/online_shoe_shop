@extends('admin.app')

@section('title', 'Category')

@section('header')
    @include('admin.content_head', [
        'pageTitle' => 'Category',
    ])
@endsection

@section('content')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Add New</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{ route('category.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="name">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('category.index') }}"> <button class="btn btn-secondary">Back</button></a> <button type="submit" class="btn btn-success float-right">Submit</button>
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
