<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Trebuchet MS';
        }

        main {
            margin: 20px auto;
            width: 1000px;
            text-align: center;
            section {
                display: inline-block;
                margin: 0 50px;
                padding-bottom: 15px;
                width: 400px;
                vertical-align: top;
                border: 2px solid black;
                box-shadow: 10px 10px 2px 0 black;
                border-radius: 0 20px 0 20px;
                h2 {
                    margin: 20px;
                    border-bottom: 2px dashed black;
                    text-transform: uppercase;
                }
                form {
                    text-align: left;
                    padding: 0 15px;
                }
            }
        }

        label {
            text-transform: uppercase;
        }

        input {
            display: block;
            margin-bottom: 15px;
            padding: 5px 10px;
            border: none;
            border-bottom: 2px dashed orange;
        }

        input:focus {
            outline: none;
        }

        input[type="submit"]
        {
            background: orange;
            border: none;
            padding: 10px 20px;
            font-weight: bolder;
            text-transform: uppercase;
            cursor: pointer;
            margin-left: auto;
            box-shadow: 3px 3px 2px 0 slategrey;
        }

        div.error-box {
            text-align: left;
            background: lightcoral;
            margin: 0 15px;
            padding: 10px 20px;
            box-shadow: 0px 3px 2px 3px firebrick;
        }

        p.error {
            color: firebrick;
            font-size: .9rem;
        }

        p.success {
            color: green;
            font-size: .9rem;
        }

    </style>
</head>
<body>
    <main>
        <section id="register-form">
            <h2>Register Form</h2>
<?php
            if ($this->session->flashdata("status")) {?>
            <p class="success"><?= $this->session->flashdata("status") ?></p>
<?php
            }?>

            <form action="<?=base_url()?>/users/register" method="post">
                <?= form_error("first_name") ?>
                <label>First Name: <input type="text" name="first_name" value=<?= set_value("first_name")  ?>></label>

                <?= form_error("last_name") ?>
                <label>Last Name: <input type="text" name="last_name" value=<?= set_value("last_name") ?>></label>

                <?= form_error("contact_register") ?>
                <label>Contact: <input type="tel" name="contact_register" value=<?= set_value("contact_register") ?>></label>

                <?= form_error("email") ?>
                <label>Email: <input type="email" name="email" value=<?= set_value("email") ?>></label>

                <?= form_error("password_register") ?>
                <label>Password: <input type="password" name="password_register" value=<?= set_value("password_register") ?>></label>

                <?= form_error("passconf") ?>
                <label>Confirm Password: <input type="password" name="passconf" value=<?= set_value("passconf") ?>></label>
                <input type="submit" value="Register">
            </form>
        </section><!--
    --><section id="login-form">
            <h2>Login Form</h2>

<?php
            if ($this->session->flashdata("error")) {?>
            <p class="error"><?= $this->session->flashdata("error") ?></p>
<?php
            }?>
            <form action="<?=base_url()?>/users/login" method="post">
                <?= form_error("contact") ?>
                <label>Contact Number: <input type="tel" name="contact" value=<?= set_value("contact")?>></label>

                <?= form_error("password_login") ?>
                <label>Password: <input type="password" name="password_login" value=<?= set_value("password_login")?>></label>
                <input type="submit" value="Login">
            </form>
        </section>
    </main>
</body>
</html>