<?php 
    class Vertex
    {
        private $_x = 0;
        private $_y = 0;
        private $_z = 0;
        private $_w = 1.0;
        private $_color;
        static $verbose = False;

        public function __construct(array $kwarg)
        {
          $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));

          if ($kwarg['x'] !== NULL && $kwarg['y'] !== NULL && $kwarg['z'] !== NULL){ 
            $this->_x = $kwarg['x'];
            $this->_y = $kwarg['y'];
            $this->_z = $kwarg['z'];
            if ($kwarg['color'] !== NULL) {
              $this->_color = $kwarg['color'];
            }
            if ($kwarg['w'] !== NULL) {
              $this->_w = $kwarg['w'];
            }
           }
          $this-> __print("constructed");
        }

        public function __destruct()
        {
          $this->__print("destructed");
        }

        public function __toString()
        {
          if (Self::$verbose == True){
            
            return (vsprintf("Vertex( x: %.02f, y: %.02f, z:%.02f, w:%.02f, %s )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->__toString())));
          }
          else{
            return (vsprintf("Vertex( x: %.02f, y: %.02f, z:%.02f, w:%.02f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
          }
        }

        public function __print($info)
        {
          if (Self::$verbose == True)
            printf("Vertex( x: %.02f, y: %.02f, z:%.02f, w:%.02f, %s ) $info\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        }

        public function doc()
        {
          echo "\n";
          $file = fopen('Vertex.doc.txt', 'r+');
          echo fread($file,filesize("Vertex.doc.txt"));
          echo "\n";
          fclose($file);
        }
}
?>