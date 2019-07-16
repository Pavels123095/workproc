<div class="container-fluid">
    
    <div class="row justify-content-center">

        <!-- Форма добавления специальности -->
                <form action="" role="form" method="post" class="form form-inline col-5">
                            <legend class="text-center">Добавить специальность</legend>
                        <div class="form_spec">
                            <input class="form-control input_spec" type="text" name="name_spec" placeholder="Название специальности">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                </form>
        <!-- Форма добавления специальности -->

        <div class="col-8">
            <!--Таблица специальностей -->
                <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <th>№</th>
                                <th>Название</th>
                            </thead>
                            <tbody>
                                <?php foreach ($special as $item) {
                            echo '<tr>';
                            echo    '<td>'.$item['n_spec'].'</td>';
                            echo    '<td>'.$item['name_spec'].'</td>';
                            echo    '</tr>';
                            }?>
                            </tbody>
                </table>
            <!--Таблица специальностей -->
        </div>
    </div>
</div>