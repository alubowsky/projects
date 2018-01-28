<?php
    class item {
        private $item;

        public function __construct(array $details) {
            $this->item = $details;
        }

        public function getItemPart($part) {
            return $this->item[$part];
        }
    };

?>