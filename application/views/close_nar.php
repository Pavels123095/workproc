<div class="container-fluid">

    <div class="row">

        
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                            <th>№</th>
                            <th>Сотрудник</th>
                            <th>Название</th>
                            <th colspan="2">Описание</th>
                            <th>Дата начала наряда</th>
                            <th>Срок выполнения</th>
                            <th colspan="2">Кнопки управления</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($naryad as $item) 
                    {
                        echo '<tr>';
                        echo    '<td>'.$item['n_naryad'].'</td>';
                        echo    '<td>'.$item['fio'].'</td>';
                        echo    '<td>'.$item['name_task'].'</td>';
                        echo    '<td colspan="2">'.$item['description'].'</td>';
                        echo    '<td>'.$item['date_bnar'].'</td>';
                        echo    '<td>'.$item['date_srok'].'</td>';
                        echo    '<td><button data-target="#new_nar" data-placement="top" title="Передать наряд" class="btn btn-primary btn-sm" data-whatever="'.$item['n_naryad'].'" data-id="'.$item['n_task'].'" data-name="id_worker_cls" data-toggle="modal"><i class="fas fa-edit"></i></button></td>';
                        echo    '<td><button data-target="#my-modal_cls_nar" data-name="'.$item['n_task'].'" data-placement="top" data-id="'.$item['id_worker'].'" title="Закрытие наряда" data-whatever="'.$item['n_naryad'].'" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-file-excel"></i></button></td>';
                        echo '</tr>';                
                    } ?>
                </tbody>
            </table>

        <!-- Модальное окно закрытия наряда -->
        <div id="my-modal_cls_nar" class="modal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="my-modal-title">Закрытие наряда</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="nar_close" method="POST" role="form" class="col">
                            <div class="modal-body">
                                
                                <input type="hidden" name="n_naryad" id="n_naryad">
                                <input type="hidden" name="n_task" id="n_task">
                                <input type="hidden" name="id_worker" id="id_worker">
                                <input type="hidden" name="status" value="свободен">
                                <input type="hidden" name="result" value="Выполнен">
                                <div class="form-group">
                                    <label>Дата Закрытия</label>
                                    <input type="date" id="input1" class="form-control" name="date_endnar">
                                </div>
                                <div class="form-group">
                                    <label>Введите оценку работы(от 1 до 10)</label>
                                    <input class="form-control" id="input2" type="number" name="assessment">
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-block">Закрыть Наряд</button>   
                                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Отмена</button> 
                                    </div> 
                                </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- Модальное окно закрытия наряда -->
        
        <!-- Модальное окно передаяи наряда -->
            <div id="new_nar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="my-modal-title">Передача наряда</h5>
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="new_nar" method="post" class="col" role="form">
                                <div class="modal-body">
                                    <input type="hidden" name="n_task" id="n_task">
                                    <input type="hidden" name="n_naryad" id="n_naryad">
                                    <input type="hidden" name="id_worker_cls" id="id_worker_cls">
                                    <div class="form-group">
                                        <select name="id_worker" class="form-control">
                                        <?php foreach ($worker_free as $item) {
                                            echo '<option value="'.$item['id_worker'].'">'.$item['fio'].' / '.$item['name_spec'].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Дата передачи</label>
                                        <input id="my-input" class="form-control" type="date" name="date_bnar">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-block">Передать</button>
                                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Отмена</button> 
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Модальное окно передаяи наряда -->

    </div>

</div>


