<div class="container-fluid">
    <div class="row justify-content-center">

    <div class="col-8">
        <h1>Список объектов по договору № <?php echo $n_dogovor; ?></h1>
    </div>

    <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr class="table-tr">
                    <th>№</th>
                    <th>Название объекта</th>
                    <th>Адрес объекта</th>
                    <th>ФИО контактного лица</th>
                    <th>Телефон контактного лица</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($objects as $item) {
                        echo '<tr>';
                            echo '<td>'.$item['n_object'].'</td>';
                            echo '<td>'.$item['name_object'].'</td>';
                            echo '<td>'.$item['adress_object'].'</td>';
                            echo '<td>'.$item['fio_contact'].'</td>';
                            echo '<td>'.$item['tel_contact'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>
                <div class="col">
                    <div class="float-right">
                        <button class="btn btn-primary btn-block"><a href="<? echo base_url().'control/dogovors' ?>" class="no_decor">Назад к договорам</a></button>
                    </div>
                </div>

                