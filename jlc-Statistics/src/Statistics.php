<?php

namespace jlc\Statisctics;

class Statistics implements StatisticsInterface
{
	public function __construct()
	{
		
	}
	
	public function Frequency($valuesArray)
	{
		$newArray = array();
		
		for ($x=0; $x<sizeof($valuesArray); $x++)
		{
			if (array_key_exists($valuesArray[$x], $newArray))
			{
				$temp = $newArray[$valuesArray[$x]];
				$newArray[$valuesArray[$x]] = $temp+1;
			}
			else
				{
					$newArray[$valuesArray[$x]]=1;
				}
		}
		return $newArray;
	}
	
	public function Mean($valuesArray)
	{
		$n = sizeof($valuesArray);
		$sum = 0;
		for ($x=0; $x<$n; $x++)
			$sum += $valuesArray[$x];
		return $sum/$n;
	}
	
	public function Median($valuesArray)
	{
		sort($valuesArray);
		if (sizeof($valuesArray) % 2 == 0)
		{
			$m = sizeof($valuesArray)/2;
			$median = ($valuesArray[$m-1]+$valuesArray[$m])/2;
		}
		else
			{
				$m = intdiv(sizeof($valuesArray), 2);
				$median = $valuesArray[$m];
			}
		return $median;
	}
	
	public function Mode($valuesArray)
	{
		$newArray = $this->Frequency($valuesArray);
		rsort($newArray);
		return $newArray[0];
	}
	
	public function Range($valuesArray)
	{
		sort($valuesArray);
		$min = $valuesArray[0];
		rsort($valuesArray);
		$max = $valuesArray[0];
		return $max-$min;
	}
	
	public function Variance($valuesArray)
	{
		$mean = $this->Mean($valuesArray);
		$sum = 0;
		for ($x=0; $x<sizeof($valuesArray); $x++)
		{
			$sum += pow($valuesArray[$x]-$mean,2);
		}
		return $sum/(sizeof($valuesArray)-1);
	}
	
	public function Deviation($valuesArray)
	{
		$variance = $this->Variance($valuesArray);
		return sqrt($variance);
	}
}