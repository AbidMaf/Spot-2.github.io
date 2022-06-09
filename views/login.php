<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Sistem Pembelajaran Online Terpadu</title>
    
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="body">
    <?php
        if (isset($_SESSION["error"])) {
            unset($_SESSION["error"]);
    ?>
    <div class="alert alert-danger alert-dismissable fade show" role="alert">
        <div class="text">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            Username atau Password salah
        </div>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>
    <div class="container center bg-light col-lg-6 shadow">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-5 col-md mx-5">
                <h1><span class="text-warning">SPOT</span> <br>
                Sistem Pembelajaran Online Terpadu</h1>
            </div>
            <div class="col-lg-5 col-md p-5">
                <form action="/loginAction" method="POST">
                    <div class="mb-3">
                        <label for="username" class="col-form-label">NIM:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
                        <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg mt-3" value="Login">
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
