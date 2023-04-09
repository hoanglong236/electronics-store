<table class="table orders-table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Delivery address</th>
            <th scope="col">Total amount</th>
            <th scope="col">Status</th>
            <th scope="col">Created at</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customOrders as $customOrder)
            <tr>
                <td>{{ $customOrder->id }}</td>
                <td>{{ $customOrder->delivery_address }}</td>
                <td>${{ number_format($customOrder->total) }}</td>
                <td>{{ $customOrder->status }}</td>
                <td>{{ $customOrder->created_at }}</td>
                <td>
                    <a href="{{ route('order.details', $customOrder->id) }}" class="btn btn-primary btn-sm">Details</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
