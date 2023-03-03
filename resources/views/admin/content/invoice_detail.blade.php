@extends('admin.app')

@section('title', 'Invoice Detail')

@section('header')
    @include('admin.content_head', [
        'pageTitle' => 'Invoice Detail',
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header ui-sortable-handle">
            <h3 class="card-title">
                Invoice Detail
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5>Name Buyer: <label>{{ $invoice->name_buyer }}</label> </h5>
                    <h5>Phone: <label>{{ $invoice->phone }}</label> </h5>
                    <h5>Address: <label>{{ $invoice->address }}</label> </h5>
                </div>
                <div class="col-6">
                    <h5>Email: <label>{{ $invoice->email }}</label> </h5>
                    <h5>Payment: <label>
                            @switch($invoice->payment)
                                @case(1)
                                    visit card
                                    @break
                                @case(2)
                                    Cash
                                    @break
                                @default
                                    Transfer
                            @endswitch
                        </label> </h5>
                    <h5>Note: <label>{{ $invoice->note }}</label> </h5>
                </div>
            </div>
            <div class="table-content" >
                <table class="table table-bordered table-custom table-users-wrap">
                    <thead>
                    <tr>
                        <th width="5%">id</th>
                        <th width="10%">Name</th>
                        <th width="10%">Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset('storage/image/'.$item->image ) }}" alt="" width="100px"/></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <h3>Total: <lable class="text-danger">@convert($invoice->total)</lable> </h3>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">

    </script>
@endsection
