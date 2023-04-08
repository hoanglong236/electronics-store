<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Address</th>
            <th scope="col">Type</th>
            <th scope="col">Default</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customerAddresses as $index => $customerAddress)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $customerAddress->specific_address .
                    ', ' .
                    $customerAddress->ward .
                    ', ' .
                    $customerAddress->district .
                    ', ' .
                    $customerAddress->city }}
                </td>
                <td>{{ $customerAddress->address_type }}</td>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">&nbsp;</label>
                        <input class="form-check-input" type="checkbox" @checked($customerAddress->default_flag)>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
