@extends('admin.app')

@section('title', 'invoice')

@section('header')
    @include('admin.content_head', [
        'pageTitle' => 'invoice',
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header ui-sortable-handle">
            <h3 class="card-title">
                invoice
            </h3>
        </div>
        <div class="card-body">
            <div class="table-content" >
                <table class="table table-bordered table-custom table-users-wrap" id="table-tenants">
                    <thead>
                    <tr>
                        <th width="5%">Id</th>
                        <th width="10%">Name Buyer</th>
                        <th width="10%">Phone</th>
                        <th width="10%">Address</th>
                        <th width="10%">Total</th>
                        <th width="10%">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($invoices as $item)
                        <tr>
                            <td class="text-center"><a href="{{ route('invoices.detail', $item->id) }}" title="Detail"> <button class="btn btn-info">{{ $item->id }}</button></a></td>
                            <td>{{ $item->name_buyer }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>@convert($item->total)</td>
                            <td>{{ $item->created_at }}</td>
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
