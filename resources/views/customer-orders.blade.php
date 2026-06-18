@extends('layout.app')
@section('section')
    <x-page-header title="Your Orders" />
    <x-customer-sidebar />
    <div class="col-lg-8 col-xl-9 pl-lg-3">
        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <th># {{ $order->order_id }}</th>
                        <td>
                            {{ $order->created_at->format('d/m/Y') }}
                        </td>
                        <td>
                            ${{ number_format($order->total_price, 2) }}
                        </td>
                        <td>
                            @if($order->status == 'pending')
                                <span class="badge badge-warning">Pending</span>

                            @elseif($order->status == 'processing')
                                <span class="badge badge-info">Processing</span>

                            @elseif($order->status == 'completed')
                                <span class="badge badge-success">Completed</span>

                            @elseif($order->status == 'cancelled')
                                <span class="badge badge-danger">Cancelled</span>

                            @else
                                <span class="badge badge-secondary">
                                    {{ ucfirst($order->status) }}
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('customerOrderDetails', $order->id) }}" class="btn btn-primary btn-sm">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            <br>
                            No orders found.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    </section>
@endsection