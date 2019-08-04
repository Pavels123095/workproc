<?php

    class worker extends CI_model {

        public function vxod_worker($login,$password) { /* Авторизация */

            $sql = 'select id_worker,login,password from worker where login=? and password='.password_verify($password,PASSWORD_DEFAULT);
            $query = $this->db->query ($sql, array($login,$password));
            return $query->row();

        }   /* Авторизация */

        public function workers() { /* Вывод всех сотрудников*/

            $sql = 'select distinct * from worker inner join special ON worker.n_spec=special.n_spec where date_dismissal is null or date_dismissal=0000-00-00 group by id_worker';
            $query = $this->db->query ($sql, array());
            return $query->result_array();
            
        }   /* Вывод всех сотрудников*/

        /* Добавление сотрудника*/
        public function add_worker($fio_worker,$tel_worker,$email_worker,$n_spec,$educat,$date_rec,$date_dism,$login,$password) {

            $sql = 'insert into worker 
            (status_worker,fio, tel, email, n_spec, educat, date_received, date_dismissal,login,password) 
            VALUES ("свободен", ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $query = $this->db->query ($sql, array($fio_worker,$tel_worker,$email_worker,$n_spec,$educat,$date_rec,$date_dism,$login,$password));
            return $this->db->insert_id();

        } /* Добавление сотрудника*/

        public function update_worker($date_dism,$id_worker) {  /* Увольнение Сотрудника */

            $sql = 'update worker set date_dismissal=? where id_worker=?';
            $query = $this->db->query($sql, array($date_dism,$id_worker));

        }   /* Увольнение Сотрудника */
        
        public function update_status($status,$id_worker) {   /* Изменение статуса */

            $sql = 'update worker set status_worker=? where id_worker=?';
            $query = $this->db->query($sql, array($status,$id_worker));

        }   /* Изменение статуса */

        public function worker_free() { /* Свободные сотрудники */

            $sql = 'select * from worker inner join special ON worker.n_spec=special.n_spec where status_worker="свободен"';
            $query = $this->db->query($sql, array());
            return $query->result_array();

        }   /* Свободные сотрудники */


        public function worker_result_work1($date1,$date2) {

            $sql = ' select worker.id_worker,fio, name_spec, name_task, description, result, date_bnar, date_srok, date_endnar 
             from naryad, worker, task, special where
            naryad.id_worker=worker.id_worker and naryad.n_task=task.n_task and worker.n_spec=special.n_spec
            and (date_endnar between ? and ? or date_bnar between ? and ?
            or date_bnar<? and date_endnar>?) and result is null 
            group by fio, name_spec';
            $query = $this->db->query($sql, array ($date1,$date2,$date1,$date2,$date1,$date2));
            return $query->result_array();

        }

        public function worker_result_work($date1,$date2) {

            $sql = ' select naryad.n_naryad,worker.id_worker,fio,description, name_spec,name_task, date_endnar,date_bnar from naryad, worker, task, special where
            naryad.id_worker=worker.id_worker and naryad.n_task=task.n_task and worker.n_spec=special.n_spec
            and (date_endnar between ? and ? or date_bnar between ? and ?
            or date_bnar<? and date_endnar>?)
            group by fio, name_spec';
            $query = $this->db->query($sql, array ($date1,$date2,$date1,$date2,$date1,$date2));
            return $query->result_array();

        }

        /**
         * @param DateTime $date1 Start of interval date
         * @param DateTime $date2 End of interval date
         *
         * @return array
         */
        public function result_works($date1,$date2)
        {
            $sql = 'SELECT * FROM naryad n INNER JOIN worker w ON n.id_worker=w.id_worker INNER JOIN task t ON n.n_task=t.n_task INNER JOIN special s ON w.n_spec = s.n_spec WHERE w.date_received <= ? AND n.date_bnar >= ? AND (w.date_dismissal >= ? OR w.date_dismissal IS NULL) AND n.date_endnar <= ?';

            $query = $this->db->query($sql, array($date1, $date1, $date2, $date2));

            return $query->result_array();
        }

    }

?>
