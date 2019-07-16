<?php

    class tabel extends CI_model {

        public function tabels() {  /* Все записи в табеле */

            $sql = 'select * from tabel';
            $query = $this->db->query ($sql, array());
            return $query->result_array();

        }   /* Все записи в табеле */

        public function add_tabel($date_b,$date_ex,$status,$id_worker) {    /* Добавление записи в табель */

            $sql = 'insert into tabel (date_b, date_ex, status, id_worker) values (?, ?, ?, ?)';
            $query = $this->db->query($sql, array($date_b,$date_ex,$status,$id_worker));
            return $this->db->insert_id();

        }   /* Добавление записи в табель */

        public function tabel_views() {
            
            $sql = 'select distinct n_tabel,fio,status,date_b,date_ex,name_spec from works,tabel,worker,special where tabel.id_worker=worker.id_worker and worker.n_spec=special.n_spec';
            $query = $this->db->query($sql);
            return $query->result_array();

        }
        
    }

?>