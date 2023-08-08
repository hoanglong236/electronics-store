<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" colspan="2">Customer Info</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>ID</td>
            <td>{{ $customerInfo->id }}</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Name</td>
            <td>{{ $customerInfo->name }}</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Phone</td>
            <td>{{ $customerInfo->phone }}</td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>Email</td>
            <td>{{ $customerInfo->email }}</td>
        </tr>
    </tbody>
</table>
