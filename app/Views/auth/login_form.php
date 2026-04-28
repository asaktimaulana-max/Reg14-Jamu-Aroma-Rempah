<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Jamu Aroma Rempah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root { --primary:#1abc9c; --secondary:#16a085; }

        *{ box-sizing:border-box; }

        body{
            margin:0; 
            font-family:'Poppins',sans-serif; 
            min-height:100vh;

            background: url('/assets/images/jamu.jpg') center/cover no-repeat;
        }

        .overlay{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,0.5);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;
        }

        .card{
            width:450px;
            max-width:95vw;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius:20px;
            padding:35px;
            box-shadow:0 25px 50px rgba(0,0,0,0.4);
        }

        .brand{
            display:flex;
            align-items:center;
            gap:10px;
            margin-bottom:10px;
        }

        .brand img{
            width:45px;
            height:45px;
            border-radius:50%;
        }

        .brand h4{
            margin:0;
            font-weight:700;
        }

        .sub{
            color:#6c757d;
            margin-bottom:15px;
        }

        label{
            font-size:.8rem;
            font-weight:600;
            margin-bottom:5px;
            display:block;
        }

        .input-wrap{
            display:flex;
            align-items:center;
            border:1px solid #ddd;
            border-radius:10px;
            padding:10px;
            margin-bottom:12px;
            background:#f8f9fa;
        }

        .input-wrap input{
            border:none;
            outline:none;
            flex:1;
            background:transparent;
        }

        .btn{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            color:#fff;
            font-weight:bold;
            background:linear-gradient(135deg,var(--primary),var(--secondary));
        }

        .error{
            margin-top:10px;
            background:#ffdada;
            color:#dc3545;
            padding:10px;
            border-radius:8px;
        }
    </style>
</head>

<body>

<div class="overlay">
    <div class="card">

        <div class="brand">
            <img src="/assets/logo.png">
            <h4>Masuk ke Sistem</h4>
        </div>

        <p class="sub">Silakan isi username dan password Anda</p>

        <form action="<?= base_url('login/proses') ?>" method="post">

            <label>Username</label>
            <div class="input-wrap">
                <i class="bi bi-person"></i>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>

            <label>Password</label>
            <div class="input-wrap">
                <i class="bi bi-lock"></i>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button class="btn">LOGIN SEKARANG</button>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="error">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

        </form>

    </div>
</div>

</body>
</html>