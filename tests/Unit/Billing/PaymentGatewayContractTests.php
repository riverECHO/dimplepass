<?php

use App\Billing\PaymentFailedException;

trait PaymentGatewayContractTests
{
	abstract protected function getPaymentGateway();
	/** @test */
	function charges_with_a_valid_payment_token_are_successful()
	{
	    $paymentGateway = $this->getPaymentGateway();    

	    $newCharges = $paymentGateway->newChargesDuring(function($paymentGateway){
		    $paymentGateway->charge(2500,$paymentGateway->getValidTestToken());	    	
	    });


	    $this->assertCount(1,$newCharges);
	    $this->assertEquals(2500,$newCharges->sum());
	}   

	// 	https://course.testdrivenlaravel.com/lessons/module-10/making-the-tests-identical
	/** @test */
	function can_fetch_charges_created_during_a_callback()
	{
	    $paymentGateway = $this->getPaymentGateway();
	    $paymentGateway->charge(2000,$paymentGateway->getValidTestToken());
	    $paymentGateway->charge(3000,$paymentGateway->getValidTestToken());

	    $newCharges = $paymentGateway->newChargesDuring(function($paymentGateway){
	    	$paymentGateway->charge(4000,$paymentGateway->getValidTestToken());
	    	$paymentGateway->charge(5000,$paymentGateway->getValidTestToken());
	    });

	    $this->assertCount(2, $newCharges);
	    $this->assertEquals([5000,4000],$newCharges->all());
	}

	/** @test */
	function charges_with_invalid_payment_token_fail()
	{
		$paymentGateway = $this->getPaymentGateway();
		$newCharges = $paymentGateway->newChargesDuring(function($paymentGateway){
			try {
				$paymentGateway->charge(2500,'invalid-token');     	
			} catch(PaymentFailedException $e){
				return $e->getMessage();
			}
			$this->fail('Charges with invalid token, did not fail!');
	    });
		$this->assertCount(0,$newCharges);
		
	}
}