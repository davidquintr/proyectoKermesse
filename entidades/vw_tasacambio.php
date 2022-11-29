<?php

class Vw_tasacambio {
    
        private $id;
        private $monedaO;
        private $monedaC;
        private $fecha;
        private $tipoCambio;
        private $mes;
        private $anio;
        private $estado;
        
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
}
