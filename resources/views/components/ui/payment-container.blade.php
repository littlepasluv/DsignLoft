<div class="payment-layout">
    <div class="payment-summary-cards">
        <div class="summary-card">
            <div class="card-label">Total</div>
            <div class="card-value" id="payment-total">${{ $paymentTotal ?? '0.00' }}</div>
        </div>
        <div class="summary-card">
            <div class="card-label">Secured by DsignLoft</div>
            <div class="card-value" id="payment-secured">${{ $paymentSecured ?? '0.00' }}</div>
        </div>
        <div class="summary-card">
            <div class="card-label">Released to designer</div>
            <div class="card-value" id="payment-released">${{ $paymentReleased ?? '0.00' }}</div>
        </div>
        <div class="summary-card">
            <div class="card-label">Earnings</div>
            <div class="card-value" id="payment-earnings">${{ $paymentEarnings ?? '0.00' }}</div>
        </div>
    </div>

    <div class="invoice-container">
        <div class="invoice-header">
            <div class="invoice-column-service">Service</div>
            <div class="invoice-column-amount">Amount</div>
        </div>
        <div class="invoice-body" id="invoice-items">
            @if(isset($invoiceItems) && count($invoiceItems) > 0)
                @foreach($invoiceItems as $item)
                    <div class="invoice-item">
                        <div class="invoice-column-service">{{ $item['service'] }}</div>
                        <div class="invoice-column-amount">${{ $item['amount'] }}</div>
                    </div>
                @endforeach
            @else
                <p>Loading invoice details...</p>
            @endif
        </div>
        <div class="invoice-footer">
            <div class="invoice-column-service">Total</div>
            <div class="invoice-column-amount" id="invoice-total">${{ $invoiceTotal ?? '0.00' }}</div>
        </div>
    </div>

    <div class="button-group">
        <button class="btn btn-secondary" @click="completeProject">Complete Project</button>
        <button class="btn btn-primary" @click="createNewQuote">Create New Quote</button>
    </div>
</div>

