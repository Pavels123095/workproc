<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-2 add_dogovor">
            <button data-target="#my-modal" data-toggle="modal" class="btn btn-primary btn-block">Добавить задачу</button>
        </div>


    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog border border-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Добавление задачи</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" role="form" class="col">

                        <div class="form-group">
                            <select name="n_spec" id="" class="form-control">
                                <?php foreach($special as $item) { echo '<option value="'.$item['n_spec'].'">'.$item['name_spec'].'</option>';} ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="name_task" class="form-control" placeholder="Название">
                        </div>

                        <div class="form-group">
                            <textarea type="text" name="description" class="form-control">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Дата начала</label>
                            <input type="date" class="form-control" name="date_begin">
                        </div>

                        <div class="form-group">
                            <label>Срок выполнения</label>
                            <input type="date" class="form-control" name="date_srok">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Записать</button>
                            <button type="submit" class="btn btn-warning btn-block" data-dismiss="modal">Закрыть</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

            <table class="table table-bordered table-hover table-striped border">
                <thead class="thead-dark">
                    <tr class="table-tr">
                        <th>№</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Дата начала</th>
                        <th>Срок выполнения</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($tasks as $item)
                        {
                        echo '<tr class="table-tr"><td>'.$item['n_task'].'</td>';
                        echo '<td>'.$item['name_task'].'</td>';
                        echo '<td>'.$item['description'].'</td>';
                        echo '<td>'.$item['data_begin'].'</td>';
                        echo '<td>'.$item['date_srok'].'</td>';
                        echo '</tr>';
                        }
                        ?>
                </tbody>
            </table>     

    </div>
</div>   

            <div class="container">
                
                <div class="float-right">
                    <button class="btn btn-primary btn-block"><a href="<? echo base_url().'control/objects/'; ?>" class="no_decor">Назад к договорам</a></button>
                </div>
                
            </div>