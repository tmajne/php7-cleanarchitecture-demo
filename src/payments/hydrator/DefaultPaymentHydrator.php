<?php

declare(strict_types=1);

namespace DawidMazurek\CleanArchitectureDemo\payments\hydrator;

use DawidMazurek\CleanArchitectureDemo\payments\entity\Payment;
use DawidMazurek\CleanArchitectureDemo\payments\mapping\PaymentFields;
use DawidMazurek\CleanArchitectureDemo\valueobjects\PaymentId;

/**
 * Class DefaultPaymentHydrator
 * @package DawidMazurek\CleanArchitectureDemo\payments\hydrator
 */
class DefaultPaymentHydrator implements PaymentHydratorInterface
{
    /**
     * @param Payment $payment
     * @return array
     */
    public function extract(Payment $payment): array
    {
        return [
            PaymentFields::PAYMENT_ID => $payment->getPaymentId()->getId(),
        ];
    }

    /**
     * @param Payment $payment
     * @param array $paymentData
     * @return Payment
     */
    public function hydrate(Payment $payment, array $paymentData): Payment
    {
        $payment->setPaymentId(
            new PaymentId($paymentData[PaymentFields::PAYMENT_ID])
        );

        return $payment;
    }
}
