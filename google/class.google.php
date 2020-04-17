<?php
class google extends DataBoundObject {

        protected $id;
        protected $paraula;
        protected $total;
        protected $lastvisit;

        protected function DefineTableName() {
                return("formulari");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "id",
                        "paraula" => "paraula",
                        "total" => "total",
                        "lastvisit" => "lastvisit"
                ));
        }

}

?>