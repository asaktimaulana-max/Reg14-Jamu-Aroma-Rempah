<!DOCTYPE html>
<html>
<head>
    <title>Login - Jamu Aroma Rempah</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #1abc9c;
            --secondary-color: #16a085;
            --accent-color: #f1c40f;
            --dark-color: #2c3e50;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            overflow: hidden;
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            width: 100%;
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
            overflow: hidden;
        }
        .hero-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(60rem 30rem at -10% -10%, rgba(26,188,156,0.25), transparent 60%),
                        radial-gradient(40rem 20rem at 110% 110%, rgba(22,160,133,0.25), transparent 60%);
            pointer-events: none;
        }
        .hero-section::after {
            content: "";
            position: absolute;
            width: 1200px;
            height: 1200px;
            right: -450px;
            top: -450px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 60%);
            filter: blur(4px);
            pointer-events: none;
        }

        .hero-content {
            max-width: 850px;
            z-index: 10;
            animation: fadeIn 1.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 1.4rem;
            opacity: 0.9;
            margin-bottom: 40px;
            font-weight: 300;
            line-height: 1.6;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }

        /* Floating Login Area */
        .login-floating {
            position: absolute;
            top: 30px;
            right: 30px;
            width: 320px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            z-index: 100;
            transition: all 0.3s ease;
        }

        .login-floating:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(0,0,0,0.3);
        }

        .login-floating .logo-small {
            width: 50px;
            margin-bottom: 15px;
            filter: drop-shadow(0 2px 5px rgba(0,0,0,0.2));
        }

        .login-floating h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: white;
        }

        .login-floating p {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 20px;
            color: white;
        }

        .form-label-small {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.7);
            margin-bottom: 5px;
            display: block;
        }

        .form-control-small {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 10px 15px;
            color: white;
            font-size: 0.9rem;
            width: 100%;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .form-control-small::placeholder {
            color: rgba(255,255,255,0.4);
        }

        .form-control-small:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 10px rgba(26, 188, 156, 0.3);
        }

        .btn-login-small {
            background: var(--primary-color);
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-login-small:hover {
            background: var(--secondary-color);
            transform: scale(1.02);
        }

        .error-small {
            font-size: 0.8rem;
            color: #ff6b6b;
            margin-top: 10px;
            text-align: center;
            background: rgba(255, 107, 107, 0.1);
            padding: 8px;
            border-radius: 8px;
        }

        /* Hide branding features on floating login for compactness */
        .wa-floating {
            position: absolute;
            bottom: 30px;
            left: 30px;
            z-index: 10;
        }

        .wa-btn {
            background: #25d366;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .wa-btn:hover {
            transform: scale(1.05);
            background: #128c7e;
        }

        /* Top-right Login Button */
        .top-login {
            position: absolute;
            top: 22px;
            right: 30px;
            z-index: 160;
        }
        .btn-open-login {
            background: linear-gradient(135deg, rgba(255,255,255,0.18), rgba(255,255,255,0.10));
            color: #fff;
            border: 1px solid rgba(255,255,255,0.35);
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 600;
            backdrop-filter: blur(6px);
            transition: all .2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-open-login:hover {
            background: linear-gradient(135deg, rgba(255,255,255,0.28), rgba(255,255,255,0.18));
            transform: translateY(-1px);
        }

        /* Modal Login */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.6);
            z-index: 200;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .modal-overlay.show {
            display: flex;
        }
        .modal-card {
            width: 360px;
            max-width: 95vw;
            background: #ffffff;
            border: 1px solid rgba(0,0,0,0.08);
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            color: #222;
            padding: 22px;
            position: relative;
        }
        .modal-close {
            position: absolute;
            top: 8px;
            right: 12px;
            background: transparent;
            border: none;
            color: #666;
            font-size: 28px;
            line-height: 1;
            cursor: pointer;
        }
        .modal-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0 0 4px 0;
            color: #2c3e50;
        }
        .modal-subtitle {
            font-size: .85rem;
            color: #6c757d;
            margin-bottom: 14px;
        }
        .modal-header-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: linear-gradient(135deg, #1abc9c, #16a085);
            color: #fff;
            border-radius: 12px;
            margin-bottom: 14px;
        }
        .logo-badge {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: grid;
            place-items: center;
            overflow: hidden;
        }
        .logo-badge img { width: 34px; height: 34px; object-fit: contain; filter: drop-shadow(0 1px 2px rgba(0,0,0,.15)); }

        .input-wrap {
            display: flex;
            align-items: center;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 10px 12px;
            transition: box-shadow .2s ease, border-color .2s ease;
            background: #f8f9fa;
        }
        .input-wrap:focus-within {
            border-color: #1abc9c;
            box-shadow: 0 0 0 4px rgba(26, 188, 156, .12);
            background: #fff;
        }
        .input-wrap i { color: #6c757d; margin-right: 10px; font-size: 1rem; }
        .input-wrap input {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
            font-size: .95rem;
            color: #212529;
        }
        .toggle-pass {
            background: transparent;
            border: none;
            color: #6c757d;
            font-size: 1rem;
            cursor: pointer;
            padding: 0 2px 0 8px;
        }
        .btn-login-small {
            background: linear-gradient(135deg, #1abc9c, #16a085);
            color: #fff;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: transform .15s ease, box-shadow .2s ease;
            margin-top: 12px;
            box-shadow: 0 10px 20px rgba(26, 188, 156, .25);
            letter-spacing: .3px;
        }
        .btn-login-small:hover { transform: translateY(-1px); box-shadow: 0 14px 26px rgba(26, 188, 156, .32); }

        @media (max-width: 768px) {
            .hero-title { font-size: 2.8rem; }
            .hero-subtitle { font-size: 1.1rem; }
            .hero-section {
                flex-direction: column;
                height: auto;
                min-height: 100vh;
                padding: 60px 20px;
            }
            .wa-floating {
                position: relative;
                bottom: auto;
                left: auto;
                margin-top: 30px;
            }
            .modal-card { width: 100%; padding: 18px; }
        }
    </style>
</head>

<body>

<section class="hero-section">
    <!-- Top-right trigger -->
    <div class="top-login">
        <button id="openLogin" class="btn-open-login">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </button>
    </div>

    <!-- Hero Content -->
    <div class="hero-content">
        <h1 class="hero-title">Jamu Aroma Rempah</h1>
        <p class="hero-subtitle">
            Warisan Tradisi untuk Kesehatan Modern. Menghadirkan keajaiban rempah asli Indonesia 
            dalam setiap tegukan untuk menjaga daya tahan tubuh Anda secara alami.
        </p>
    </div>

    <!-- WhatsApp Floating -->
    <div class="wa-floating">
        <a href="https://wa.me/628131554929" class="wa-btn" target="_blank">
            <i class="bi bi-whatsapp"></i> Franchise: 08131554929
        </a>
    </div>
</section>

<!-- Modal Login (appears after click) -->
<div id="loginModal" class="modal-overlay" aria-hidden="true">
    <div class="modal-card">
        <button class="modal-close" id="closeLogin" aria-label="Close">&times;</button>
        <div class="modal-header-custom">
            <div class="logo-badge">
                <img src="/assets/logo.png" alt="Logo">
            </div>
            <div>
                <h5 class="modal-title">Masuk ke Sistem</h5>
                <div class="modal-subtitle">Silakan isi username dan password Anda</div>
            </div>
        </div>
        <form action="<?= base_url('login/proses') ?>" method="post">
            <div style="margin-bottom: 12px;">
                <label class="form-label-small" style="color:#495057">Username</label>
                <div class="input-wrap">
                    <i class="bi bi-person"></i>
                    <input type="text" name="username" placeholder="Masukkan username" required>
                </div>
            </div>
            <div style="margin-bottom: 6px;">
                <label class="form-label-small" style="color:#495057">Password</label>
                <div class="input-wrap">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" id="passwordField" placeholder="Masukkan password" required>
                    <button type="button" class="toggle-pass" id="togglePass" aria-label="Tampilkan password"><i class="bi bi-eye"></i></button>
                </div>
            </div>
            <button type="submit" class="btn-login-small">LOGIN SEKARANG</button>
        </form>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="error-small mt-2" style="background: rgba(220,53,69,.1); color:#dc3545">
                <i class="bi bi-exclamation-circle"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    (function() {
        var openBtn = document.getElementById('openLogin');
        var closeBtn = document.getElementById('closeLogin');
        var modal = document.getElementById('loginModal');
        var toggle = document.getElementById('togglePass');
        var pwd = document.getElementById('passwordField');
        if (openBtn && modal) {
            openBtn.addEventListener('click', function() {
                modal.classList.add('show');
                modal.setAttribute('aria-hidden', 'false');
            });
        }
        if (closeBtn && modal) {
            closeBtn.addEventListener('click', function() {
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden', 'true');
            });
        }
        if (toggle && pwd) {
            toggle.addEventListener('click', function() {
                var visible = pwd.getAttribute('type') === 'text';
                pwd.setAttribute('type', visible ? 'password' : 'text');
                this.innerHTML = visible ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
            });
        }
        // Close when clicking outside card
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('show');
                    modal.setAttribute('aria-hidden', 'true');
                }
            });
        }
        // Escape key to close
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal && modal.classList.contains('show')) {
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden', 'true');
            }
        });
    })();
</script>

</body>
</html>
