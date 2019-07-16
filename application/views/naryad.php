
<div class="container add_dogovor">
    
    <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Поставить Задачу
            </button>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                        Закрыть Наряд
            </button>
        </div>

        <!-- Постановка задачи -->
        <div class="modal" tabindex="-1" role="dialog" id="exampleModalCenter" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">Постановка Задачи</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="naryad" method="POST" role="form">

                                    <div class="form-group">
                                        <label>Выберите Сотрудника</label>
                                        <select name="id_worker" class="form-control">
                                        <?php foreach ($worker as $item) {
                                            echo '<option value="'.$item['id_worker'].'">'.$item['fio'].'</option>';} ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Выберите задачу</label>
                                        <select class="form-control" name="n_task">
                                            <?php foreach ($task as $item) { echo '<option value="'.$item['n_task'].'">'.$item['name_task'].'</option>'; }?>
                                        </select>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Дата постановки</label>
                                        <input type="date" name="date_bnar" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Дата окончания</label>
                                        <input type="date" name="date_endnar" class="form-control">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Закрыть</button>
                                    </div>
                                </form>
                            </div>
                </div>
            </div>
        </div>
        <!-- Постановка задачи -->

        <!-- Закрытие Наряда --> 
        <div class="modal" tabindex="-1" role="dialog" id="exampleModalCenter1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered col-3" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">Закрытие Наряда</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="naryad" method="POST" role="form">
                                    <div class="form-group">
                                        <select name="result" class="form-control">
                                            <option value="Передан">Передан</option>
                                            <option value="Выполнен">Выполнен</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <p class="text-center">Дата передачи(Закрытия)</p>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-block">Закрыть Наряд</button>
                                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Закрыть</button>
                                    </div>
                                </form>
                            </div>
                </div>
            </div>
        </div>                                 
        <!-- Закрытие Наряда -->     

    </div>  
    
</div>
