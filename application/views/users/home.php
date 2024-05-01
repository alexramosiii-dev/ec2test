

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
                padding: 20px 10px;
                width: 400px;
                vertical-align: top;
                border: 2px solid black;
                box-shadow: 10px 10px 2px 0 black;
                border-radius: 0 10px 0 10px;
                text-align: left;
                p {
                    margin: 20px;
                    border-bottom: 2px dashed black;
                    text-transform: uppercase;
                    span {
                        font-weight: bolder;
                    }
                }

                a {
                    margin-top: 50px;
                    display: block;
                    width: fit-content;
                    background: orange;
                    padding: 10px 20px;
                    font-weight: bolder;
                    text-transform: uppercase;
                    cursor: pointer;
                    margin-left: auto;
                    text-decoration: none;
                    color: black;
                    box-shadow: 3px 3px 2px 0 slategrey;
                }
            }
        }

    </style>
</head>
<body>
    <main>
        <section>
            <p><span>First Name: </span><?= $first_name ?></p>
            <p><span>Last Name: </span><?= $last_name ?></p>
            <p><span>Contact Number: </span><?= $contact ?></p>
            <p><span>Last Failed Login: </span><?= $updated_at ?></p>
            <a href="<?=base_url()?>/users/logout">Logout</a>
        </section>
    </main>
</body>
</html>