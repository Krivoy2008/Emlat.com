<?php

class exchange
{
	private $fxRate;

    /**
     * @param $baseCurrency
     * @param $Foreigncurrency
     */
    public function __construct($baseCurrency, $Foreigncurrency)
	{
		$url = 'http://download.finance.yahoo.com/d/quotes.csv?s='
			.$baseCurrency .$Foreigncurrency .'=X&f=l1';

		$c = curl_init($url);
		curl_setopt($c, CURLOPT_HEADER, 0);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		$this->fxRate = doubleval(curl_exec($c));
		curl_close($c);
	}

    /**
     * @param $amount
     * @return float|int
     */
    public function toBase($amount)
	{
		if($this->fxRate == 0)
			return 0;
			
		return  $amount / $this->fxRate;
	}

    /**
     * @param $amount
     * @return int
     */
    public function toForeign($amount)
	{
		if($this->fxRate == 0)
			return 0;
			
		return $amount * $this->fxRate;
	}
};
