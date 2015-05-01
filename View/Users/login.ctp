    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
        <div class="login-container">
            <div id="output"></div>
            <div class="form-box">
                <form action="" method="">
                    <?php echo $this->Form->input('username');?>
                    <?php echo $this->Form->input('password');?>
                    <?php echo $this->Form->end(__('Login')); ?>
                </form>
                <a class="btn btn-primary"<?php echo $this->html->link('Register',array('action'=>'add_student')); ?></a>
            </div>
        </div>


    <style>
        body{background: #eee ;}
        html,body{
            position: relative;
            height: 100%;
        }

        .login-container{
            position: relative;
            width: 300px;
            margin: 80px auto;
            padding: 20px 40px 40px;
            text-align: center;
            background: #fff;
            border: 1px solid #ccc;
        }

        #output{
            position: absolute;
            width: 300px;
            top: -75px;
            left: 0;
            color: #fff;
        }

        #output.alert-success{
            background: rgb(25, 204, 25);
        }

        #output.alert-danger{
            background: rgb(228, 105, 105);
        }


        .login-container::before,.login-container::after{
            content: "";
            position: absolute;
            width: 100%;height: 100%;
            top: 3.5px;left: 0;
            background: #fff;
            z-index: -1;


            border: 1px solid #ccc;

        }


        .avatar{
            width: 100px;height: 100px;
            margin: 10px auto 30px;
            border-radius: 100%;
            border: 2px solid #aaa;
            background-size: cover;
        }

        .form-box input{
            width: 100%;
            padding: 10px;
            text-align: center;
            height:40px;
            border: 1px solid #ccc;;
            background: #fafafa;
            transition:0.2s ease-in-out;

        }

        .form-box input:focus{
            outline: 0;
            background: #eee;
        }

        .form-box input[type="text"]{
            border-radius: 5px 5px 0 0;
            text-transform: lowercase;
        }

        .form-box input[type="password"]{
            border-radius: 0 0 5px 5px;
            border-top: 0;
        }

        .form-box button.login{
            margin-top:15px;
            padding: 10px 20px;
        }




        .fadeInUp {
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }


    </style>