<form action="">
    <div class="panel panel-default address-panel-wrapper">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#addressCollapse" aria-expanded="true">
                    Shippping Address
                </a>
            </h4>
        </div>
        <div id="addressCollapse" class="panel-collapse collapse in" aria-expanded="true">
            <div class="panel-body customer-address-panel">
                @foreach ($customerAddresses as $index => $customerAddress)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="{{ 'deliveryAddress' . $index }}"
                            name="deliveryAddress">
                        <label class="form-check-label" for="{{ 'deliveryAddress' . $index }}">
                            {{ $customerAddress->specific_address .
                                ', ' .
                                $customerAddress->ward .
                                ', ' .
                                $customerAddress->district .
                                ', ' .
                                $customerAddress->city }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="panel panel-default payment-panel-wrapper">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#paymentCollapse" aria-expanded="true">
                    Payment Method
                </a>
            </h4>
        </div>
        <div id="paymentCollapse" class="panel-collapse collapse in" aria-expanded="true">
            <div class="panel-body customer-address-panel">
                @foreach ($paymentMethods as $index => $paymentMethod)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="{{ 'paymentMethod' . $index }}"
                            name="paymentMethod">
                        <label class="form-check-label" for="{{ 'paymentMethod' . $index }}">
                            {{ $paymentMethod }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <button class="btn action-btn place-order-btn" type="submit">Place Order</button>
</form>
