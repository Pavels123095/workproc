<?php

    class spec extends CI_model {

        public function specials() {  /* Список должностей */

            $sql = 'select * from special';
            $query = $this->db->query($sql, array());
            return $query->result_array();

        }   /* Список должностей */

        public function add_spec($name_spec) {  /* Добавление должности */

            $sql = 'insert into special (name_spec) values (?)';
            $query = $this->db->query($sql, array($name_spec));
            return $this->db->insert_id();
            
        }   /* Добавление должности */

        public function spec_del($n_spec) { /* Удаление должности */

            $sql = 'delete from special where n_spec='.$n_spec;
            $query = $this->db->query($sql, array($n_spec));

        }   /* Удаление должности */

    }

?>