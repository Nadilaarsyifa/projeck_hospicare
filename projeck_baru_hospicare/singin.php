<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>HospiCare - Sign Up</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            padding: 1rem;
        }

        .form-signin {
            max-width: 300px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
        }

        .form-signin input[type="text"],
        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            border-radius: 0.375rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .form-check-label {
            margin-left: 0.25rem;
        }

        .form-check {
            margin-bottom: 1rem;
        }

        .form-check-input:checked~.form-check-label {
            color: #007bff;
        }

        .form-signin p {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .text-center {
            margin-bottom: 1rem;
        }

        .form-label {
            font-size: 0.875rem;
        }

        .form-control {
            font-size: 0.875rem;
        }

        .btn {
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="bg-light">
    <div class="center-content">
        <main class="form-signin w-100 m-auto">
            <h1 class="h4 mb-3 fw-normal text-center">Sign Up</h1>
            <form class="needs-validation" novalidate action="proses/proses_singin.php" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                    <div class="invalid-feedback">
                        Masukkan Nama Lengkap Anda
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" required>
                    <div class="invalid-feedback">
                        Masukkan No HP
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                    <div class="invalid-feedback">
                        Masukkan Alamat
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="email" class="form-control" id="username" name="username" required>
                    <div class="invalid-feedback">
                        Masukkan Email
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <div class="invalid-feedback">
                        Masukkan Password
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background-color: rgb(2, 139, 44)">Sign Up</button>
            </form>
            <p class="mt-3 text-center">Sudah memiliki akun? <a href="login.php">Login di sini</a></p>
        </main>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>