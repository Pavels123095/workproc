    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr class="table-tr">
                <th>№</th>
                <th>ФИО Сотрудника</th>
                <th>Специальность</th>
                <th>Образование</th>
                <th>Телефон</th>
                <th>Электронная почта</th>
                <th>Дата приёма на работу</th>
                <th>Логин</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workers as $item) {
            echo '<tr class="table-tr">';
            echo '<td>'.$item['id_worker'].'</td>';
            echo '<td>'.$item['fio'].'</td>';
            echo '<td>'.$item['name_spec'].'</td>';
            echo '<td>'.$item['educat'].'</td>';
            echo '<td>'.$item['tel'].'</td>';
            echo '<td>'.$item['email'].'</td>';
            echo '<td>'.$item['date_received'].'</td>';
            echo '<td>'.$item['login'].'</td>';
            echo '<td><button data-placement="top" title="Увольнение Сотрудника" type="button" data-whatever="'.$item['id_worker'].'" data-id="'.$item['id_worker'].'" value="'.$item['id_worker'].'" data-toggle="modal" data-target="#my-modal_work" class="btn btn-danger btn-sm"><i class="fas fa-archive"></i></button></td></tr>'; }?>
        </tbody>
    </table>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-3">

            <div id="my-modal_work" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-center" id="my-modal-title">Увольнение Сотрудника</h3>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="worker_del" method="post" class="form">
                            <div class="modal-body">

                            <input type="hidden" name="id_worker" id="id_worker">

                                <div class="form-group">
                                    <label>Дата увольнения</label>
                                    <input type="date" name="date_dism" class="form-control">
                                </div> 
          
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger btn-block">Уволить</button> 
                            </div>

                        </form>

                    </div>

                </div>

            </div>  

        </div>
    </div>
</div>
