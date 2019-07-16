<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="add_dogovor">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_objects">
                Добавить Объект
            </button>
        </div>

        <div id="modal_objects" class="container-fluid modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="my-modal-title">Добавление объекта</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" class="col">
                        
                        <div class="modal-body">
                            <div class="form-group">
                                <input  class="form-control" type="text" required name="name_object" placeholder="Название обхекта">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" required name="adress_object" placeholder="Адрес объекта">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" required name="fio_contact" placeholder="ФИО контакта объекта">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" required name="tel_contact" id="phone" placeholder="+7(999)-999-99-99">
                            </div>
                            <div class="modal-footer">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block" type="submit">Добавить</button>
                                    <button class="btn btn-warning btn-block" data-dismiss="close">Закрыть</button>
                                </div>
                            </div>                   
                        </div>
                    </form>
                </div>
            </div>
        </div> 

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr class="table-tr">
                    <th>№</th>
                    <th>Название объекта</th>
                    <th>Адрес объекта</th>
                    <th>ФИО контактного лица</th>
                    <th>Телефон контактного лица</th>
                    <th colspan="2">Кнопки</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($objects as $item) {

                        if ($item['status_object'] == "0") {
                            echo '<tr>';
                                echo '<td>'.$item['n_object'].'</td>';
                                echo '<td>'.$item['name_object'].'</td>';
                                echo '<td>'.$item['adress_object'].'</td>';
                                echo '<td>'.$item['fio_contact'].'</td>';
                                echo '<td>'.$item['tel_contact'].'</td>';
                                echo '<td><button data-target="#my-modal_update_object" data-placement="top" title="Закрытие объекта" data-toggle="modal" data-whatever="'.$item['n_object'].'" class="btn btn-warning btn-sm"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button></td>';
                                echo '<td><button class="btn btn-primary btn-sm" data-placement="top" title="Список задач на данный объект"><a class="no_decor" href="'.base_url().'control/task/'.$item['n_object'].'"><i class="fas fa-book"></i></a></button></td>';
                            echo '</tr>';
                        }
                        if ($item['status_object'] == "1") {
                            echo '<tr>';
                                echo '<td>'.$item['n_object'].'</td>';
                                echo '<td>'.$item['name_object'].'</td>';
                                echo '<td>'.$item['adress_object'].'</td>';
                                echo '<td>'.$item['fio_contact'].'</td>';
                                echo '<td>'.$item['tel_contact'].'</td>';
                                echo '<td><button  data-placement="top" name="dog_pod" data-target="#modal_sp_task" data-toggle="modal" data-whatever="'.$item['n_dogovor'].'" title="Объект уже закрыт и не может быть изменён!" disabled class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></td>';
                                echo '<td><button class="btn btn-primary btn-sm" data-placement="top" title="Список задач на данный объект"><a class="no_decor" href="'.base_url().'control/task_no_del/'.$item['n_object'].'"><i class="fas fa-book"></i></a></button></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>

            <div class="container">
                
                <div class="float-right">
                    <button class="btn btn-primary btn-block"><a href="<? echo base_url().'control/dogovors' ?>" class="no_decor">Назад к договорам</a></button>
                </div>
                
            </div>

<div id="my-modal_update_object" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Закрыть объект?</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_object_status" method="post">
            <input type="hidden" name="n_object" id="n_object">
                <div class="modal-body">
                    <h3 class="text-center">Объект № <span id="n_objects"></span></h3>
                </div>
                <div class="modal-footer">
                    <div class="col">
                        <button class="btn btn-primary btn-block" type="submit">Да</button>
                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Нет</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>