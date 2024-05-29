<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/change_password.css')}}">
</head>
<body>
    <div class="card">
        <div class="card-header">
            <div class="position">Profil > Ubah Kata Sandi</div>
            <div class="row">
                <div class="col"><a href="#">&lt;</a></div>
                <div class="col">Kembali ke Profil</div>
            </div>
            <h3 class="mb-0">Ubah Kata Sandi</h3>
        </div>
        <div class="card-body">
            <form class="form" role="form" autocomplete="off">
                <div class="form-group">
                    <label for="inputPasswordOld">Current Password</label>
                    <input type="password" class="form-control" id="inputPasswordOld" required="">
                </div>
                <div class="form-group">
                    <label for="inputPasswordNew">New Password</label>
                    <input type="password" class="form-control" id="inputPasswordNew" required="">
                    <span class="form-text small text-muted">
                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                        </span>
                </div>
                <div class="form-group">
                    <label for="inputPasswordNewVerify">Verify</label>
                    <input type="password" class="form-control" id="inputPasswordNewVerify" required="">
                    <span class="form-text small text-muted">
                            To confirm, type the new password again.
                        </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
