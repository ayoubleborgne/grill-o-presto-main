@extends('layouts.app')

@section('title', 'menus')

@section('content')


    <h1 class="display-3 text-center">Commandes</h1>

    <div class="d-flex text-success justify-content-center  fs-1"> {{ session('OrderDel') }}</div>
    <div class="d-flex text-success justify-content-center fs-1"> {{ session('success') }}</div>

    <div class="orderTableContainer w-75 mx-auto  pb-2">


        <table class="table table-bordered table-striped table-light ">
            <thead>
                <tr class=" text-center">
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sup.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allOrders as $order)
                    <tr class="text-center">
                        <td class="align-middle" scope="row"><form type="GET" action="{{ route('admin.orders.show', ['order' => $order]) }}">
                            <button type="submit" class="btn btn-orange">{{ $order->id }}</button></form> </th>
                        <td class="align-middle">{{ date('d M Y  |  H:i:s', $order->created_at->timestamp) }}</td>
                        <td class="align-middle">{{ $order->name }}</td>
                        <td class="align-middle">
                            <form method="POST" action="{{ route('admin.orders.update', ['order' => $order]) }}">
                                @csrf
                                @method('PUT')
                                <select class="statusSelect" name="statusSelect" id="statusSelect">
                                    @foreach ($allStatuses as $status)
                                        <option value="{{ $status->id }}" id="{{ $status->id }}"
                                            @if ($order->status->name === $status->name) selected @endif>{{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>

                        <td class="align-middle">
                            <form method="POST"
                                class="p-2"action="{{ route('admin.orders.destroy', ['order' => $order]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-close" type="submit"
                                    @if (!($order->status->name === 'En préparation')) {{ 'disabled' }} @endif> </button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>



@endsection
