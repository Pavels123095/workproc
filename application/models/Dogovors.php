<?php

    class dogovors extends CI_model {

        public function dogovor_all() {
            
            $sql = 'select * from dogovor';
            $query = $this->db->query ($sql, array());
            return $query->result_array();
        }

        public function add_dogovor($name_client,$adress_client,$tel_client,$email_client,$date_concl,$date_validity) {
            
            $sql = 'insert into dogovor 
            (name_client, adress_client, tel_client, email_client, date_concl, date_validity) VALUES (?, ?, ?, ?, ?, ?)';
            $query = $this->db->query ($sql, array($name_client,$adress_client,$tel_client,$email_client,$date_concl,$date_validity));
            return $this->db->insert_id();

        }

        public function update_dogovor($n_dogovor) {

            $sql = 'update dogovor set status_d=1 where n_dogovor=?';
            $query = $this->db->query($sql, array($n_dogovor));

        }

    }

?>