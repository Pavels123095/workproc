   
 <div class="container add_dogovor">    <!-- Добавление сотрудника начало -->

    <div class="row justify-content-center">
    <!-- Кнопка для модального окна -->  
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Добавить Сотрудника
        </button>    
    <!-- Кнопка для модального окна -->

    <!-- модальное окно с формой добавления -->   
        <div class="modal" tabindex="-1" role="dialog" id="exampleModalCenter" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">Приём на работу сотрудника</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="workers" method="POST" role="form">
                        <?php echo '<p class="error-text">'.$message.'</p>'; ?>
                            
                            <div class="row">     
                        
                                <div class="col"> <!--Личные данные о сотуднике-->
                                    <div class="form-group">
                                        <input type="text" class="form-control" required name="fio_worker" id="fio" placeholder="ФИО сотрудника">
                                    </div>
                                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" required name="tel_worker" id="tel" placeholder="+7 (999) 999-99-99">
                                    </div>
                                
                                    <div class="form-group">
                                        <input type="email" name="email_worker" class="form-control" required placeholder="email">
                                    </div>
                                </div>   <!--Личные данные о сотуднике-->
                                            
                                <div class="col"> <!-- Образование и спец. сотрудника -->
                                    <div class="form-group">
                                        <select class="form-control" name="n_spec">
                                        <?php foreach ($spec as $item) { 
                                            echo '<option value="'.$item['n_spec'].'">'.$item['name_spec'].'</option>';
                                        }?>
                                        </select>
                                    </div>
                            
                                    <div class="form-group">
                                        <input type="text" name="educat" class="form-control" required placeholder="Образование">
                                    </div>
                                </div>  <!-- Образование и спец. сотрудника -->
                        
                            </div>
                                <hr>      
                            <div class="row justify-content-center">
                                <div class="col-7">
                                    <div class="form-group">
                                        <p class="text-center">Дата приёма на работу</p>
                                        <input type="date" name="date_rec" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Должность" type="text" name="post">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <p class="text-center">Присвойте логин и пароль сотруднику</p>
                                        <div class="form-group">
                                            <input name="login" class="form-control" type="text" placeholder="Логин">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password1" placeholder="Пароль">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Подтвердите пароль">
                                        </div>    
                                </div>
                            </div>
                            <div class="col">
                                <button name="add_worker" type="submit" class="btn btn-primary btn-block">Добавить</button>
                                <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Закрыть</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>    
    <!-- модальное окно с формой добавления -->

    </div>  
 </div>     <!-- Добавление сотрудника конец -->  