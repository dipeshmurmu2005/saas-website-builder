<?php

namespace App\Actions;

use App\Models\TicketReservation;

class PaymentAction
{
    protected $product_code;
    protected $secret_key;
    protected $base_url;

    public function __construct()
    {
        $this->product_code = config('services.esewa.product_code');
        $this->secret_key = config('services.esewa.secret_key');
        $this->base_url = config('services.esewa.base_url');
    }

    public function initiatePayment($user_id, $reservation_id)
    {
        // $dataToSign = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
        // $s = hash_hmac('sha256', $dataToSign, $this->secret_key, true);

        // $signature = base64_encode($s);
    }
}
