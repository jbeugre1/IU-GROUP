<!DOCTYPE html>
<html>
<head>
    <!-- <meta charset='utf-8'> -->
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <title>Login and registration</title>
    <!-- <meta name='viewport' content='width=device-width, initial-scale=1'> -->
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'> -->
    <!-- <script src='main.js'></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="signIn-box">
            <div class="row">
                <div class="col-md-6">
                    <h2> Sign In</h2>
                    <form action="authenticate.php" method="post">
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2> Register</h2>
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>