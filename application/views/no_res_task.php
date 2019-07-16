         
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Дата начала</th>
                        <th>Дата окончания</th>
                        <th>Специальность</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($no_res as $item)
                    {  echo '<tr>';
                       echo '<td>'.$item['n_task'].'</td>';
                       echo '<td>'.$item['name_task'].'</td>';
                       echo '<td>'.$item['description'].'</td>';
                       echo '<td>'.$item['data_begin'].'</td>';
                       echo '<td>'.$item['date_srok'].'</td>';
                       echo '<td>'.$item['name_spec'].'</td>';
                       echo '<td><button class="btn btn-success btn-sm" data-target="#my-modal_go_work" data-whatever="'.$item['n_task'].'" data-placement="top" title="Постановка задачи сотруднику(наряд)" data-toggle="modal"><i class="fas fa-clipboard-list"></i></button></td>';
                       echo '</tr>';
                    } ?>
                </tbody>
            </table>

            <div id="my-modal_go_work" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="text-center"><h3>Поставить задачу (наряд)</h3></p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="naryad_add" class="form">
                            <div class="modal-body">
                            <input type="hidden" name="n_task" id="n_task">
                            <input type="hidden" name="status" value="занят">
                                <div class="form-group">
                                    <label>Выбрать Сотрудника</label>
                                    <select class="form-control" name="id_worker">
                                        <?php foreach ($worker as $item) 
                                            {
                                            echo '<option value="'.$item['id_worker'].'">'.$item['fio'].' / '.$item['name_spec'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Дата Постановки</label>
                                    <input id="my-input" class="form-control" type="date" name="date_bnar">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group col">
                                    <button type="submit" class="btn btn-primary btn-block">Поставить Задачу</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>