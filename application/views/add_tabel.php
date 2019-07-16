<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-3 add_worker">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Добавить Запись
        </button>
            
            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModalCenter" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalCenterTitle">Запись в табель</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="tabels" method="POST" role="form">
                            
                                <div class="form-group">
                                    <label>Выберите Сотрудника</label>
                                    <select name="id_worker" class="form-control">
                                        <?php 
                                        foreach ($workers as $item){
                                        echo '<option value="'.$item['id_worker'].'">'.$item['fio'].'</option>'; }?>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <input type="date" name="date_b" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="date" name="date_ex" class="form-control">
                                </div>

                                <div class="form-group">
                                    <select name="status" class="form-control">
                                        <option value="Р">Работал</option>
                                        <option value="Н">Неявка</option>
                                        <option value="Б">Болел</option>
                                        <option value="О">Отпуск</option>                        
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Записать</button>
                                <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Закрыть</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>