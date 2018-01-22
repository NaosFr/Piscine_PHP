<?php
	function ft_split($str)
	{
		$tab = array();
		$tab = array_filter(explode(' ', $str));
		sort($tab);
		return $tab;
	}
?>