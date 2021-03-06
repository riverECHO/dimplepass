<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    //
    protected $guarded = [];

    // Relationships
	public function purchase()
	{
		return $this->belongsTo(\App\Purchase::class);
	}

	public function pass()
	{
		return $this->belongsTo(\App\Pass::class);
	}

	// Attributes
	public function getLineTotalAttribute()
	{
		return $this->qty*$this->price;
	}

	public function getLineTotalInDollarsAttribute()
	{
		return ($this->qty*$this->price)/100;
	}

}
