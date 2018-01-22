<?php 

	class NightsWatch implements IFighter
	{
		private $soldat = array();
		
		function fight()
		{
			foreach ($this->soldat as $value) {
	            if (method_exists($value, 'fight'))
	                $value->fight();
	        }
		}
		
		function recruit($unite)
		{
			$this->soldat[] = $unite;
		}
	}


?>