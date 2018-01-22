<?php 
    class Color
    {
        public $red;
        public $green;
        public $blue;
        static $verbose = False;

        public function __construct(array $kwarg)
        {
            if ($kwarg['rgb'] !== NULL) {
                $rgb = round($kwarg["rgb"]);
                $this->red = $rgb >> 16 & 255;
                $this->green = $rgb >> 8 & 255;
                $this->blue = $rgb & 255;
            }
           	else if ($kwarg['red'] !== NULL && $kwarg['green'] !== NULL && $kwarg['blue'] !== NULL) {
                $this->red = round($kwarg['red']);
                $this->green = round($kwarg['green']);
                $this->blue = round($kwarg['blue']);
            }
           	$this-> __print("constructed.");
        }

        public function __destruct()
        {
            $this->__print("destructed.");
        }

        public function __toString()
        {
            return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
        }

        public function __print($info)
        {
        	if (Self::$verbose == True)
                printf("Color( red: %3d, green: %3d, blue: %3d ) $info\n", $this->red, $this->green, $this->blue);
        }

        public function doc()
        {
        	echo "\n";
            $file = fopen('Color.doc.txt', 'r+');
            echo fread($file,filesize("Color.doc.txt"));
            echo "\n";
			fclose($file);
        }
        
        public function add($color_add)
        {
        	$kwarg_add = array();
      		$kwarg_add['red'] = $this->red + $color_add->red;
         	$kwarg_add['green'] = $this->green + $color_add->green;
         	$kwarg_add['blue'] = $this->blue + $color_add->blue;
         	return (new Color($kwarg_add));
        }

        public function sub($color_sub)
        {
        	$kwarg_sub = array();
      		$kwarg_sub['red'] = $this->red - $color_sub->red;
         	$kwarg_sub['green'] = $this->green - $color_sub->green;
         	$kwarg_sub['blue'] = $this->blue - $color_sub->blue;
         	return (new Color($kwarg_sub));
        }

        public function mult($color_mult)
        {
        	$kwarg_mult = array();
      		$kwarg_mult['red'] = $this->red * $color_mult;
         	$kwarg_mult['green'] = $this->green * $color_mult;
         	$kwarg_mult['blue'] = $this->blue * $color_mult;
         	return (new Color($kwarg_mult));
        }
}
?>