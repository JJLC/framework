<?php

namespace jlc\Statistics;

interface StatisticsInterface
{
	public function Frequency($valuesArray);
	
	public function Mean($valuesArray);
	
	public function Median($valuesArray);
	
	public function Mode($valuesArray);
	
	public function Range($valuesArray);
	
	public function Variance($valuesArray);
	
	public function Deviation($valuesArray);
}