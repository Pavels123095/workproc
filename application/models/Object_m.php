<?php

    class object_m extends CI_model {

        public function object_all() {  /* Список всех объектов */

            $sql = 'select * from objects';
            $query = $this->db->query($sql);
            return $query->result_array();

        }   /* Список всех объектов */

        public function object_add($name_object,$adress_object,$fio_contact,$tel_contact,$n_dogovor) {  /* Добавить объект */

            $sql = 'insert into objects (name_object,adress_object,fio_contact,tel_contact, n_dogovor)
            values (?, ?, ?, ?, ?)';
            $query = $this->db->query($sql, array($name_object,$adress_object,$fio_contact,$tel_contact,$n_dogovor));
            return $this->db->insert_id();

        }   /* Добавить объект */

        public function object_dog($n_dogovor)  {    /* Список объектов по договору */

            $sql = 'select * from objects where n_dogovor=?';
            $query = $this->db->query($sql, array($n_dogovor));
            return $query->result_array();

        }   /* Список объектов по договору */

        public function update_object($n_object) {

            $sql = 'update object set status_object=1 where n_object=?';
            $query = $this->db->query($sql, array($n_object));
            
        }

    }   

?>