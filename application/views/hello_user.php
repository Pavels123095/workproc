<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <img src="<? echo base_url().'/assets/img/user.jpg';?>" class="align-self-center mr-3 img-user" alt="user">
                <strong>Добро пожаловать пользователь: <?php echo $_SESSION['username']; ?>!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

