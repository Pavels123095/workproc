<div class="table-responsive-sm">   <!-- Список договоров -->   

            <table class="table table-bordered table-hover table-striped">    
                <thead class="thead-dark">
                    <tr>
                        <th>№</th>
                        <th>Название клиента</th>
                        <th>Юридический адрес</th>
                        <th>Телефон клиента</th>
                        <th>Электронная почта клиента</th>
                        <th>Дата заключения</th>
                        <th>Срок окончания</th>
                        <th colspan="3" class="text-center">Кнопки управления</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($dogovor as $item) {

                            if ($item['status_d'] == "0") {

                                echo '<tr><td>'.$item['n_dogovor'].'</td>';
                                echo '<td>'.$item['name_client'].'</td>';
                                echo '<td>'.$item['adress_client'].'</td>';
                                echo '<td>'.$item['tel_client'].'</td>';
                                echo '<td>'.$item['email_client'].'</td>';
                                echo '<td>'.$item['date_concl'].'</td>';
                                echo '<td>'.$item['date_validity'].'</td>';
                                echo '<td><button data-target="#my-modal_update_dog" data-placement="top" title="Подписание договора" data-toggle="modal" data-whatever="'.$item['n_dogovor'].'" class="btn btn-warning btn-sm"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button></td>';
                                echo '<td><button class="btn btn-primary btn-sm" data-placement="top" title="Список объектов по данному договору"><a class="no_decor" href="'.base_url().'control/objects/'.$item['n_dogovor'].'"><i class="fa fa-align-justify" aria-hidden="true"></i></a></button></td>';
                                echo '</tr>';

                                }

                            if ($item['status_d'] == "1")  {

                                    echo '<tr style="background: green; color:white"><td>'.$item['n_dogovor'].'</td>';
                                    echo '<td>'.$item['name_client'].'</td>';
                                    echo '<td>'.$item['adress_client'].'</td>';
                                    echo '<td>'.$item['tel_client'].'</td>';
                                    echo '<td>'.$item['email_client'].'</td>';
                                    echo '<td>'.$item['date_concl'].'</td>';
                                    echo '<td>'.$item['date_validity'].'</td>';                            
                                    echo '<td><button  data-placement="top" name="dog_pod" data-target="#modal_sp_task" data-toggle="modal" data-whatever="'.$item['n_dogovor'].'" title="Договор уже подписан и не может быть изменён!" disabled class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></td>';
                                    echo '<td><button class="btn btn-primary btn-sm" data-placement="top" title="Список задач на данный договор"><a class="no_decor" href="'.base_url().'control/task_no_del/'.$item['n_dogovor'].'"><i class="fas fa-book"></i></a></button></td>';
                                    echo '<td><button class="btn btn-primary btn-sm" data-placement="top" title="Список объектов по данному договору"><a class="no_decor" href="'.base_url().'control/objects_no_update/'.$item['n_dogovor'].'"><i class="fa fa-align-justify" aria-hidden="true"></i></a></button></td>';
                                    echo '</tr>';

                            }

                        }
?>
                </tbody>
            </table>
</div>
<!-- Список договоров -->

<div id="my-modal_update_dog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Подписать договор?</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_dogovor" method="post">
            <input type="hidden" name="n_dogovor" id="n_dogovor">
                <div class="modal-body">
                    <h3 class="text-center">Договор № <span id="n_dog"></span></h3>
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



