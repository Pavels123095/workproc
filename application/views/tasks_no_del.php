<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-4 add_dogovor">
            <h3>Список задач по объекту № <?php echo $n_object;?></h3>
        </div>
    </div>

    <div class="row">

            <table class="table table-bordered table-hover table-striped border">
                <thead class="thead-dark">
                    <tr class="table-tr">
                        <th>№</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Дата начала</th>
                        <th>Срок выполнения</th>
                        <th>Дата факт окончания</th>
                        <th>Исполнитель</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($tasks as $item)
                        {

                            if (!empty($item['id_worker'])) { 

                                if (empty($item['date_fact']) or ($item['date_fact'] == "0000-00-00")) {
                                    

                                    echo '<tr style="background: red; color:white;" class="table-tr"><td>'.$item['n_task'].'</td>';
                                    echo '<td>'.$item['name_task'].'</td>';
                                    echo '<td>'.$item['description'].'</td>';
                                    echo '<td>'.$item['data_begin'].'</td>';
                                    echo '<td>'.$item['date_srok'].'</td>';
                                    echo '<td>'.$item['date_fact'].'</td>';
                                    echo '<td>'.$item['fio'].'</td>';
                                    echo '</tr>';

                                } 
                            
                                if (($item['date_fact'] != "0000-00-00") and (!empty($item['date_fact']))) {

                                    echo '<tr style="background: green; color: white;" class="table-tr"><td>'.$item['n_task'].'</td>';
                                    echo '<td>'.$item['name_task'].'</td>';
                                    echo '<td>'.$item['description'].'</td>';
                                    echo '<td>'.$item['data_begin'].'</td>';
                                    echo '<td>'.$item['date_srok'].'</td>';
                                    echo '<td>'.$item['date_fact'].'</td>';
                                    echo '<td>'.$item['fio'].'</td>';
                                    echo '</tr>';

                                } 
                            
                            }   else {

                                echo '<tr style="background: #808080; color: black;" class="table-tr"><td>'.$item['n_task'].'</td>';
                                echo '<td>'.$item['name_task'].'</td>';
                                echo '<td>'.$item['description'].'</td>';
                                echo '<td>'.$item['data_begin'].'</td>';
                                echo '<td>'.$item['date_srok'].'</td>';
                                echo '<td>'.$item['date_fact'].'</td>';
                                echo '<td> Исполнитель не назначен!</td>';
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
            <button class="btn btn-primary btn-block"><a href="<? echo base_url().'control/objects/'; ?>" class="no_decor">Назад к Объектам</a></button>
        </div>
        
    </div> 