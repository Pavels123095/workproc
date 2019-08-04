<?php

	class Control extends CI_Controller 	{
			
		public function index() {	/*Загрузка главной страницы начало*/

				$this->load->model('worker');	

				$data['message']='';

				/*Проверка пользователя и доб. в сессию */
					if (!empty($_POST)) {	
						
						$this->form_validation->set_rules('login','password','required');
						$this->form_validation->set_message('required','Поля %з не заполнены');

					$data['worker'] = $this->worker->vxod_worker($_POST['login'],$_POST['password']);

					if (!empty($data['worker'])) {
							$worker = array (
							'id_worker' => $data['worker']->id_worker,
							'username' => $_POST['login'],
							'password' => $_POST['password']
							);
							$this->session->set_userdata($worker);
							redirect('home');
							} else {
								$data['message'] = 'Пользователь не существует или проверьте правильность введённых данных!';
							}

					} 
				/*Проверка пользователя и доб. в сессию */	
				
				$this->load->view('headerOne');
				$this->load->view('home_head');
				$this->load->view('sign',$data);
				$this->load->view('footer');

		}	/*Загрузка главной страницы конец */

		public function home() {	/*Домашняя страница */

				if ($this->session->has_userdata('username')) {

					if ($this->session->userdata('username') == 'manager') {

						$this->load->model('dogovors');
						$data['dogovor'] = $this->dogovors->dogovor_all();
						$this->load->model('tasks');
						
						$this->load->view('header');
						$this->load->view('navbar_manager');
						$this->load->view('dogovors',$data);

					}

					if ($this->session->userdata('username') == 'director') {

						$this->load->model('tasks');
						$this->load->model('naryad');
						$this->load->model('spec');
						$this->load->model('worker');
						
						$data['worker'] = $this->worker->workers();
						$data['process_work'] = $this->naryad->naryad_works();

						if (!empty($_POST)) {
							
							$data['worker_result'] = $this->worker->result_works($_POST['date1'],$_POST['date2']);
							
						} else {

							$data['worker_result'] = $this->worker->result_works(
								date('Y-m-d', strtotime('2019-05-01')),
								date('Y-m-d', strtotime('2019-06-30'))
							);
						}

						$this->load->view('headeruser');
						$this->load->view('process_work',$data);

					}

					if ($this->session->userdata('username') != 'manager') {

						if ($this->session->userdata('username') != 'director') {
			
							$this->load->model('worker');
							$data['worker'] = $this->worker->workers();

							$id_worker = $_SESSION['id_worker'];

							$this->load->model('tasks');
							$data['task'] = $this->tasks->task_user($id_worker);

							$this->load->model('naryad');
							$data['naryad'] = $this->naryad->naryads();
							
							$this->load->view('headeruser');
							$this->load->view('proc_work',$data);
							$this->load->view('footer');

						}

					}
					
				}

				$this->load->view('footer');

		}	/*Домашняя страница */

		public function worker_task() {	/* Страница задач сотрудника */

			$id_worker = $this->uri->segment(3);

			$this->load->model('naryad');
			$data['worker_task'] = $this->naryad->worker_task($id_worker);

			$this->load->view('headeruser');
			$this->load->view('worker_task',$data);
			$this->load->view('footer');

		}	/* Страница задач сотрудника */

		public function workers() { 	/*Страница Сотрудники */

				$data['message'] = '';

				$this->load->model('worker');
				$data['workers'] = $this->worker->workers();

				$this->load->model('spec');
				$data['spec'] = $this->spec->specials();

				if (!empty($_POST))	{

					$data['errors'] = array();

						if ($_POST['password1'] != $_POST['password']) {

							$data['errors'] = "В двух полях должен быть одинаковый пароль, пожалуйста проверьте.";

						}

						if (empty($data['errors'])) {

							$this->form_validation->set_rules('fio_worker','tel_worker','email_worker','n_spec','educat','login','password','required');
							$this->form_validation->set_message('required','Поля %з не заполнены');

							$data['add_worker'] = $this->worker->add_worker($_POST['fio_worker'],$_POST['tel_worker'],$_POST['email_worker'],$_POST['n_spec'],$_POST['educat'],$_POST['date_rec'],'null',$_POST['login'],password_hash($_POST['password'],PASSWORD_DEFAULT));

							$data['message'] = 'Сотрудник успешно добавлен!';

							redirect('workers');
						}
				}

				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('add_worker',$data);
				$this->load->view('workers',$data);
				$this->load->view('footer');

		}		/*Страница Сотрудники */

		public function worker_del() { 	/* Увольнение Сотрудника */

				$this->load->model('worker');

				if (!empty($_POST)) {

					$this->worker->update_worker($_POST['date_dism'],$_POST['id_worker']);
					redirect('workers');

				}

		}	/* Увольнение Сотрудника */

		public function dogovors() {	/*Страница добавления договора */
				
				$this->load->model('dogovors');
				$data['dogovor'] = $this->dogovors->dogovor_all();
				$this->load->model('tasks');

				if (isset($_POST['submit'])) {

					$data['tasks'] = $this->tasks->tasked($_POST['n_object']);

				}
				

				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('add_dogovor');

					if (!empty($_POST))		{
					

						$this->form_validation->set_rules('name_client','adress_client','tel_client','email_client','date_concl','date_validity','required');
						$this->form_validation->set_message('required','Поля %з не заполнены');

						$data['add_dogovor'] = $this->dogovors->add_dogovor($_POST['name_client'],$_POST['adress_client'],$_POST['tel_client'],$_POST['email_client'],$_POST['date_concl'],$_POST['date_validity']);
						$dogovor = array (
							'n_dogovor' => 'n_dogovor'
							);
							$this->session->set_userdata($dogovor);

						redirect('control/objects/'.$data['add_dogovor']);

					} 
				
					$this->load->view('dogovors',$data);
					$this->load->view('footer');

		}	/*Страница добавления договора */

		public function task() { /*Страница задач */

				$n_object = $this->uri->segment(3);

				$this->load->model('tasks');
				$this->load->model('spec');
				$data['special'] = $this->spec->specials();

				if (!empty($_POST)){

					$this->form_validation->set_rules('name_task','description','date_begin','date_srok','n_spec','required');
					$this->form_validation->set_message('required','Поля %з не заполнены');
					
					$data['add_task'] = $this->tasks->add_task($_POST['name_task'], $_POST['description'], $_POST['date_begin'], $_POST['date_srok'], $n_object,$_POST['n_spec']);
					
				}

				$data['tasks'] = $this->tasks->tasked($n_object);
				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('tasks',$data);
				$this->load->view('footer');

		}	/*Страница задач */

		public function update_object_status() {	/*  */
			
			$n_dogovor = $this->uri->segment(3);
			$this->load->model('object_m');
			$data['update'] = $this->object_m->update_object($_POST['n_object']);
			redirect('control/objects/'.$n_dogovor);
			
		}	/*  */

		public function task_no_del() {		/* Список задач на подписанный договор */

			$n_object = $this->uri->segment(3);
			$data['n_object'] = $this->uri->segment(3);

			$this->load->model('tasks');

			$data['tasks'] = $this->tasks->tasked_2($n_object);
			$this->load->view('header');
			$this->load->view('navbar_manager');
			$this->load->view('tasks_no_del',$data);
			$this->load->view('footer');

		}	/* Список задач на подписанный договор */

		public function task_del() {	/* Удаление задачи */

				$n_object = $this->uri->segment(3);
				$n_task = $this->uri->segment(4);
				$this->load->model('tasks');
				$this->tasks->task_del($n_task);

				redirect('control/task/'.$n_object);

		}	/* Удаление задачи */

		public function close_nar() {	/* список (распределённых задач) нарядов */

				$this->load->model('naryad');
				$data['naryad'] = $this->naryad->naryad_work();

				$this->load->model('worker');
				$data['worker_free'] = $this->worker->worker_free();

				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('close_nar',$data);
				$this->load->view('footer');

		}	/* список (распределённых задач) нарядов */

		public function new_nar() {		/* Передача наряда */

			$result = "передан";

				$this->load->model('naryad');
				$this->load->model('tasks');
				$this->load->model('worker');
				$data['worker_free'] = $this->worker->worker_free();
				
				if (!empty($_POST)) {

					/* Изменение результата выбранного наряда */
					$data['nar_res'] = $this->naryad->update_result($result,$_POST['n_naryad']);

					$this->worker->update_status("свободен",$_POST['id_worker_cls']);
					/* Добавление нового наряда */
					$this->naryad->add_naryad($_POST['id_worker'],$_POST['n_task'],$_POST['date_bnar']);
					/* Изменение статуса выбранного сотрудника на занят */
					$this->worker->update_status("свободен",$_POST['id_worker']);

					redirect('close_nar');

				}

		}		/* Передача наряда */

		public function nar_close() {	/* Закрытие наряда */

				$this->load->model('naryad');
				$this->load->model('worker');
				$this->load->model('tasks');

				if(!empty($_POST)) {

					$this->form_validation->set_rules('date_endnar','assessment','result','required');
					$this->form_validation->set_message('required','Поля %з не заполнены');

					$this->naryad->close_nar($_POST['date_endnar'],$_POST['assessment'],$_POST['result'],$_POST['n_naryad']);

					$data['update_status'] = $this->worker->update_status($_POST['status'],$_POST['id_worker']);

					$data['task_cls'] = $this->tasks->task_cls($_POST['date_endnar'],$_POST['n_task']);

					redirect('close_nar');

				}

		}	/* Закрытие наряда */

		public function update_dogovor() { /* Подписание договора */
				
				if (!empty($_POST)) {

					$this->load->model('dogovors');
					$this->dogovors->update_dogovor($_POST['n_dogovor']);

					redirect('dogovors');

				}
		}	/* Подписание договора */

		public function objects() {	/* Список объектов по договору */
			
			$n_dogovor = $this->uri->segment(3);
			$this->load->model('object_m');
			$data['objects'] = $this->object_m->object_dog($n_dogovor);
			$data['n_dogovor'] = $this->uri->segment(3);

			if (!empty($_POST)) {

				$this->form_validation->set_rules('name_object','adress_object','fio_contact','tel_contact','required');
				$this->form_validation->set_message('required','Поля %з не заполнены');

				$data['add_object'] = $this->object_m->object_add($_POST['name_object'],$_POST['adress_object'],$_POST['fio_contact'],$_POST['tel_contact'], $n_dogovor);

				redirect('control/objects/'.$data['n_dogovor']);
			}

			$this->load->view('header');
			$this->load->view('navbar_manager');
			$this->load->view('objects_v',$data);
			$this->load->view('footer');

		}	/* Список объектов по договору */

		public function objects_no_update() {	/* Список объектов подписанного договора */

			$n_dogovor = $this->uri->segment(3);
			$data['n_dogovor'] = $this->uri->segment(3);
			$this->load->model('object_m');
			$data['objects'] = $this->object_m->object_dog($n_dogovor);

			$this->load->view('header');
			$this->load->view('navbar_manager');
			$this->load->view('object_no_update',$data);
			$this->load->view('footer');

		}	/* Список объектов подписанного договора */

		public function spec_del() {	/* Удаление специальность */

				$n_spec = $this->uri->segment(3);
				$this->load->model('spec');

				$this->spec->spec_del($n_spec);

				redirect('specials');

		}	/* Удаление специальность */

		public function task_deadline() {	/* Список невыполненных задач в срок */
				
				$this->load->model('tasks');
				$data['task_not'] = $this->tasks->task_not();
				$this->load->model('worker');

				if (!empty($_POST)){

					$data['task_deadline'] = $this->worker->worker_result_work1($_POST['date1'],$_POST['date2']);
					
				}

				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('task_deadline',$data);
				$this->load->view('footer');

		}	/* Список невыполненных задач в срок */

		public function specials() {	/*Специальности*/

				$this->load->model('spec');
				$data['special'] = $this->spec->specials();

				if(!empty($_POST)) {

					$this->form_validation->set_rules('name_spec','required');
					$this->form_validation->set_message('required','Поля %з не заполнены');

					$data['add_spec'] = $this->spec->add_spec($_POST['name_spec']);

					redirect('specials');

				}

				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('spec',$data);
				$this->load->view('footer');

		} 	/*Специальности*/

		public function naryad() {	/* Страница Нарядов */

				$this->load->model('naryad');
				$data['no_res'] = $this->naryad->no_ras_task();

				$this->load->model('worker');
				$data['worker'] = $this->worker->worker_free();
				
				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('no_res_task',$data);
				$this->load->view('footer');

		}	/* Страница Нарядов */

		public function naryad_add() {	/* Постановка задачи (запись наряда) */

				$this->load->model('worker');
				$data['worker'] = $this->worker->worker_free();

				$this->load->model('naryad');

				if (!empty($_POST)) {

					$this->form_validation->set_rules('id_worker','date_bnar','status','required');
					$this->form_validation->set_message('required','Поля %з не заполнены');

					$this->naryad->add_naryad($_POST['id_worker'],$_POST['n_task'],$_POST['date_bnar']);

					$this->worker->update_status($_POST['status'],$_POST['id_worker']);

					redirect('naryad');

				}

				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('naryad_add',$data);
				$this->load->view('footer');

		}	/* Постановка задачи (запись наряда) */

		public function tabels() {	/* Табель больничных и отпусков */

				$this->load->model('worker');
				$data['workers'] = $this->worker->workers();

				$this->load->model('tabel');
				$data['tabs'] = $this->tabel->tabel_views();

				if (!empty($_POST)){

					$this->form_validation->set_rules('id_worker','date_b','date_ex','status','required');
					$this->form_validation->set_message('required','Поля %з не заполнены');
			
					$data['add_tabel'] = $this->tabel->add_tabel($_POST['date_b'], $_POST['date_ex'], $_POST['status'], $_POST['id_worker']);
			
					redirect('tabels');
				}

				$this->load->view('header');
				$this->load->view('navbar_manager');
				$this->load->view('add_tabel',$data);
				$this->load->view('tabel',$data);
				$this->load->view('footer');

		}	/* Табель больничных и отпусков */

		public function quites() {	/* Выход из аккаунта */

				$this->session->unset_userdata('username');
				redirect('index');

		}	/* Выход из аккаунта */

	}

?>
