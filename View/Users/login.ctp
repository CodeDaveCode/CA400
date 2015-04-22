    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
        <div class="login-container">
            <div id="output"></div>
            <div class="avatar"><img src="http://davidmchugh.ie/DCU_INTRA_Logo_Small.jpg"></div>
            <div class="form-box">
                <form action="" method="">
                    <?php echo $this->Form->input('username');?>
                    <?php echo $this->Form->input('password');?>
                    <?php echo $this->Form->end(__('Login')); ?>
                </form>
            </div>
        </div>


    <style>
        html,body{
            position: relative;
            height: 100%;
        }

        .login-container{
            position: relative;
            width: 300px;
            margin: 60px auto;
            padding: 5px 40px 40px;
            text-align: center;
            background: #fff;
        }


        .avatar{
            width: 160px;height: 150px;
            margin: 10px auto 30px;
            background-size: cover;
        }

    </style>