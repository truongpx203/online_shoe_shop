@extends('admin.app')

@section('title', 'User')

@section('header')
    @include('admin.content_head', [
        'pageTitle' => 'User',
    ])
@endsection

@section('content')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Edit New</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{ route('users.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{ $user->name }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" class="form-control" id="name" placeholder="Email" value="{{ $user->email }}" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password"  class="form-control" id="name" placeholder="Password">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('users.index') }}"> <button class="btn btn-secondary" type="button">Back</button></a> <button type="submit" class="btn btn-success float-right">Submit</button>
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
