<?php

    class tasks extends CI_model {

        public function tasked($n_object) { /* Задачи по договору */

            $sql = 'select * from task join objects on task.n_object=objects.n_object join dogovor on objects.n_dogovor=dogovor.n_dogovor where task.n_object=? group by n_task,name_task';
            $query = $this->db->query ($sql, array($n_object));
            return $query->result_array();

        }   /* Задачи по договору */

        public function tasked_2($n_object) {

            $sql = 'select * from task left 
            join naryad ON task.n_task=naryad.n_task left join worker ON naryad.id_worker=worker.id_worker where task.n_object=?';
            $query = $this->db->query ($sql, array($n_object));
            return $query->result_array();
        }

        public function task_del($n_task) {    /* Удаление задачи */

            $sql = 'delete from task where n_task=?';
            $query = $this->db->query ($sql, array($n_task));

        }   /* Удаление задачи */

        public function all_task() {    /* Список всех задач */

            $sql ='select * from task';
            $query = $this->db->query($sql);
            return $query->result_array();
        }   /* Список всех задач */

        /* Запись в табель рабочего времени */

            public function add_task($name_task,$description,$date_begin,$date_srok,$n_object,$n_spec) {

                $sql = 'insert into task (name_task, description, data_begin, date_srok, n_object,n_spec) values (?, ?, ?, ?, ?, ?)';
                $query = $this->db->query($sql, array($name_task,$description,$date_begin,$date_srok,$n_object,$n_spec));
                return $this->db->insert_id();
                
            }   

        /* Запись в табель рабочего времени */

        public function task_deadline($date1) { /* Сортировка невып. задач */

            $sql = 'select * from task join naryad ON naryad.n_task=task.n_task join worker ON naryad.id_worker=worker.id_worker where date_fact<='.$date1.' and date_srok<='.$date1.' and date_endnar<='.$date1;
            $query = $this->db->query($sql, array($date1));
            return $query->result_array();

        }   /* Сортировка невып. задач  */

        public function task_not() { /* невып. задачи список */

            $sql = 'select * from naryad join task ON naryad.n_task=task.n_task join worker ON naryad.id_worker=worker.id_worker
            where date_fact is null and date_endnar is null or (date_fact="0000-00-00" and date_endnar="0000-00-00")';
            $query = $this->db->query($sql);
            return $query->result_array();

        }   /* невып. задачи список */

        public function task_user($id_worker) {

            $sql = 'select * from naryad join worker ON naryad.id_worker=worker.id_worker join task ON naryad.n_task=task.n_task
             where worker.id_worker=?';
            $query = $this->db->query($sql, array($id_worker));
            return $query->result_array();
        }

        public function task_cls($date,$n_task) {

            $sql = 'update task set date_fact=? where task.n_task=?';
            $query = $this->db->query($sql, array($date,$n_task));
            
        }

    }

?>