@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">customers</div>

                <div class="card-body">
                    @if (count($customers)===0)
                    <p>there are no Customers!</p>
                    @else
                    <table id="table-customers" class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                        </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr data-id="{{$customer->id }}">
                                    <td>{{$customer->name }}</td>
                                    <td>{{$customer->address }}</td>
                                    <td>{{$customer->email }}</td>
                                    <td>{{$customer->phone }}</td>
                                    <td>{{$customer->image }}</td>
                                    <td>
                                        <a href="{{ route('user.customers.show', $customer->id) }}" class="btn btn-primary">View</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
