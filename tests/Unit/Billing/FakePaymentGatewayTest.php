<?php

use App\Billing\FakePaymentGateway;
use App\Billing\PaymentFailedException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FakePaymentGatewayTest extends TestCase
{
	/** @test */
	function charges_with_a_valid_payment_token_are_successful()
	{
	    $paymentGateway = new FakePaymentGateway;

	    $paymentGateway->charge(2500,$paymentGateway->getValidTestToken());

	    $this->assertEquals(2500,$paymentGateway->totalCharges());
	}


	/** @test */
	function charges_with_invalid_payment_token_fail()
	{
		try {
		    $paymentGateway = new FakePaymentGateway;
		    $paymentGateway->charge(2500,'invalid-token');			
		} catch(PaymentFailedException $e){
			$this->assertTrue(true);
			return;
		}
		$this->fail();
	}

}