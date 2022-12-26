<style>
    @charset "utf-8";
    @import url(http://weloveiconfonts.com/api/?family=fontawesome);

    [class*="fontawesome-"]:before {
        font-family: 'FontAwesome', sans-serif;
    }

    body {
        background: #2c3338;
        color: #606468;
        font: 87.5%/1.5em 'Open Sans', sans-serif;
        margin: 0;
    }

    input {
        border: none;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5em;
        padding: 0;
        -webkit-appearance: none;
    }

    p {
        line-height: 1.5em;
    }

    after {
        clear: both;
    }

    #login {
        margin: 50px auto;
        width: 360px;
        margin-top: 10%;
    }

    #login form {
        margin: auto;
        padding: 22px 22px 22px 22px;
        width: 100%;
        border-radius: 5px;
        background: #282e33;
        border-top: 3px solid #434a52;
        border-bottom: 3px solid #434a52;
    }

    #login form span {
        background-color: #363b41;
        border-radius: 3px 0px 0px 3px;
        border-right: 3px solid #434a52;
        color: #606468;
        display: block;
        float: left;
        line-height: 50px;
        text-align: center;
        width: 50px;
        height: 50px;
    }

    #login form input[type="text"] {
        background-color: #3b4148;
        border-radius: 0px 3px 3px 0px;
        color: #a9a9a9;
        margin-bottom: 1em;
        padding: 0 16px;
        width: 260px;
        height: 50px;
    }

    #login form input[type="password"] {
        background-color: #3b4148;
        border-radius: 0px 3px 3px 0px;
        color: #a9a9a9;
        margin-bottom: 1em;
        padding: 0 16px;
        width: 260px;
        height: 50px;
    }

    #login form input[type="submit"] {
        background: #16aa56;
        border: 0;
        width: 100%;
        height: 40px;
        border-radius: 3px;
        color: white;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    #login form input[type="submit"]:hover {
        background: #b5cd60;
    }

    #login p {
        color: #fff;
    }

    #login p a {
        color: gray;
        margin-top: 10px;
        /* text-decoration: none; */

    }

    #error {
        color: red;
    }
</style>

<body>
    <div id="login">
        <form name='form-login' action="<?php echo site_url('atdsys/login_validation') ?>" method="POST">
            <span class="fontawesome-user"></span>
            <input type="text" id="user" name="user" placeholder="User" required>

            <span class="fontawesome-lock"></span>
            <input type="password" id="pass" name="password" placeholder="Password" required>


            <input type="submit" name="submit" value="Login">
            <p><a href="forgotpass.php">forgot password!</a></p>


        </form>
        <p id="error"> <?php echo $this->session->flashdata("error"); ?></p>

</body>