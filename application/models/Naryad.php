<?php

    class naryad extends CI_model {

        public function naryads() { /* Список всех нарядов */

            $sql = 'select * from naryad';
            $query = $this->db->query ($sql, array());
            return $query->result_array();

        }   /* Список всех нарядов */

        public function add_naryad($id_worker, $n_task, $date_bnar) {    /* Добавление наряда */

            $sql = 'insert into naryad (id_worker, n_task, assessment, date_bnar) values (?, ?, null, ?)';
            $query = $this->db->query($sql, array($id_worker, $n_task, $date_bnar));
            return $this->db->insert_id();
        }   /* Добавление наряда */

        /* Выбор нераспределённых задач */

            public function no_ras_task() {

                $sql = 'select * from task join special on task.n_spec=special.n_spec 
                where not EXISTS (select n_naryad from naryad where naryad.n_task=task.n_task)';
                $query = $this->db->query ($sql);
                return $query->result_array();

            }

        /* Выбор нераспределённых задач */

        public function naryad_works() {

            $sql = 'select * from naryad join task ON naryad.n_task=task.n_task join worker ON naryad.id_worker=worker.id_worker
            join objects ON task.n_object=objects.n_object 
             group by n_naryad,fio';
            $query = $this->db->query($sql, array());
            return $query->result_array();

        }

        public function update_status_s($n_naryad) {

            $sql = 'update worker set status_worker="свободен" where EXISTS 
            (select * from naryad join worker ON naryad.id_worker=worker.id_worker where naryad.n_naryad=?)';
            $query = $this->db->query($sql, array($n_naryad));
            return $query->result_array();

            }

        /*Список нарядов в работе */

            public function naryad_work() {

                $sql = 'select * from naryad join task ON naryad.n_task=task.n_task
                 join worker ON naryad.id_worker=worker.id_worker where
                date_endnar is null or date_endnar=0000-00-00 GROUP BY n_naryad,fio';
                $query = $this->db->query($sql, array());
                return $query->result_array();

            }
            
        /*Список нарядов в работе */

        public function update_result($result,$n_naryad) {  /* передача наряда */

            $sql = 'update naryad set result=? where naryad.n_naryad=?';
            $query = $this->db->query($sql, array($result,$n_naryad));

        }    

            public function close_nar($date_endnar,$assessment,$result,$n_naryad) {

                $sql = 'update naryad set date_endnar=?, assessment=?, result=? where naryad.n_naryad=?';
                $query = $this->db->query($sql, array($date_endnar,$assessment,$result,$n_naryad));

            }

        public function worker_task($id_worker) {

            $sql = "select * from naryad,task,worker where naryad.id_worker=worker.id_worker and
            naryad.n_task=task.n_task and worker.id_worker=?";
            $query = $this->db->query($sql, array($id_worker));
            return $query->result_array();

        }
    }

?>