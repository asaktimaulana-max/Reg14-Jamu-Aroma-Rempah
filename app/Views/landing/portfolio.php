<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jamu Aroma Rempah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary:#1abc9c; --secondary:#16a085; }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin:0; font-family:'Poppins',sans-serif; color:#fff; background:#000;
        }
        .hero {
            position:relative; min-height:100vh; display:flex; align-items:center; justify-content:center;
            text-align:center; padding:32px 20px; overflow:hidden;
            background:
                linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.65)),
                url('https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')
                center/cover no-repeat;
        }
        .hero::before{
            content:""; position:absolute; inset:0;
            background: radial-gradient(60rem 30rem at -10% -10%, rgba(26,188,156,.25), transparent 60%),
                        radial-gradient(40rem 20rem at 110% 110%, rgba(22,160,133,.25), transparent 60%);
            pointer-events:none;
        }
        .topbar{
            position:absolute; top:22px; right:28px; z-index:100;
            display:flex; align-items:center; gap:20px;
        }
        .nav-menu{
            display:flex; gap:25px; margin-right:15px;
        }
        .nav-link{
            color:rgba(255,255,255,.8); text-decoration:none; font-weight:500; font-size:0.95rem;
            transition: color .2s;
        }
        .nav-link:hover{ color:#fff; }
        .btn-login{
            display:inline-flex; align-items:center; gap:8px;
            background:rgba(255,255,255,.18); border:1px solid rgba(255,255,255,.35);
            color:#fff; padding:10px 18px; border-radius:12px; font-weight:600;
            backdrop-filter:blur(6px); text-decoration:none;
        }
        .btn-login:hover{ background:rgba(255,255,255,.28); }
        h1{ font-size: clamp(2.2rem,6vw,4.5rem); margin:0 0 12px; letter-spacing:-1px; font-weight:800; text-shadow:0 4px 20px rgba(0,0,0,.5); }
        p.lead{ font-size: clamp(1rem,2.2vw,1.35rem); opacity:.95; line-height:1.6; margin:0 0 26px; text-shadow:0 2px 10px rgba(0,0,0,.5); }
        .cta{
            background:linear-gradient(135deg,var(--primary),var(--secondary));
            color:#fff; padding:14px 26px; border-radius:14px; text-decoration:none; font-weight:700;
            box-shadow:0 10px 22px rgba(26,188,156,.35);
        }
        .cta:hover{ filter:brightness(1.05); }
        .wa{
            position:absolute; left:24px; bottom:24px; z-index:2;
        }
        .wa a{
            display:inline-flex; align-items:center; gap:10px; background:#25d366; color:#fff;
            padding:12px 22px; border-radius:50px; text-decoration:none; font-weight:600;
            box-shadow:0 10px 20px rgba(0,0,0,.2);
        }
        @media(max-width:768px){ 
            .topbar{ right:16px; top:15px; } 
            .nav-menu{ display:none; }
        }

        /* Sejarah Section */
        .section-sejarah{
            background: #1a4d40;
            padding: 100px 18px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .history-grid{
            display: flex;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }
        .history-content{
            flex: 1;
            min-width: 300px;
        }
        .history-image{
            flex: 1;
            min-width: 300px;
            position: relative;
        }
        .history-image img{
            width: 100%;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .history-image::after{
            content: "";
            position: absolute;
            inset: -15px;
            border: 2px solid rgba(26,188,156,0.3);
            border-radius: 30px;
            z-index: -1;
        }
        .section-sejarah h2{
            font-size: clamp(2rem,4vw,2.8rem);
            font-weight: 800;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }
        .section-sejarah h2::after{
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }
        .history-text p{
            font-size: 1.05rem;
            line-height: 1.8;
            opacity: 0.9;
            margin-bottom: 20px;
            text-align: justify;
        }
        .history-footer{
            margin-top: 35px;
            font-style: italic;
            font-weight: 600;
            color: var(--primary);
            font-size: 1.15rem;
        }
    </style>
    </head>
<body>
    <section class="hero">
        <div class="topbar">
            <a class="btn-login" href="<?= base_url('login') ?>">
                <i class="bi bi-box-arrow-in-right"></i> Login Mitra
            </a>
        </div>

        <div class="content">
            <h1>Miliki Bisnis Jamu Modern Bersama Kami!</h1>
            <p class="lead">Buka peluang sukses dengan franchise Jamu Aroma Rempah. Tradisi yang dibalut inovasi modern, siap menjadi primadona di kota Anda.</p>
            <div style="display:flex; justify-content:center; gap:15px; flex-wrap:wrap; margin-top:20px;">
                <a href="https://wa.me/628131554929" target="_blank" class="cta" style="background:#25d366; box-shadow:0 10px 22px rgba(37,211,102,.35);">
                    <i class="bi bi-whatsapp"></i> Daftar Franchise
                </a>
            </div>
        </div>

        <div class="wa" style="display:none;">
            <a href="https://wa.me/628131554929" target="_blank"><i class="bi bi-whatsapp"></i> Franchise: 08131554929</a>
        </div>
    </section>

    <section id="sejarah" class="section-sejarah">
        <div class="container">
            <div class="history-grid">
                <div class="history-content">
                    <h2>SEJARAH SINGKAT</h2>
                    <div class="history-text">
                        <p>Aroma Rempah lahir pada tahun 2025 dengan semangat untuk menghidupkan kembali minuman tradisional Indonesia dalam balutan yang lebih modern dan relevan. Kami percaya bahwa jamu bukan sekadar warisan budaya, tetapi juga bagian dari gaya hidup sehat yang bisa dinikmati oleh semua generasi.</p>
                        <p>Berangkat dari kecintaan terhadap kekayaan rempah Nusantara, Aroma Rempah menghadirkan inovasi baru tanpa meninggalkan nilai tradisionalnya. Kami mengolah jamu dengan sentuhan rasa yang lebih ringan, tampilan yang menarik, serta penyajian yang kekinian—sehingga lebih mudah diterima, terutama oleh generasi muda.</p>
                        <p>Menghapus stigma bahwa jamu hanya untuk kalangan tertentu, kami hadir membawa pengalaman baru: jamu yang sehat, nikmat, dan tetap autentik.</p>
                        <p>Tak hanya itu, Aroma Rempah juga mengusung konsep kedai modern yang terinspirasi dari coffee shop masa kini. Dengan suasana yang nyaman, estetik, dan santai, setiap pengunjung dapat menikmati momen berkualitas sambil merasakan kehangatan cita rasa rempah khas Indonesia.</p>
                    </div>
                    <div class="history-footer">
                        Aroma Rempah — Tradisi dalam Inovasi, Rasa dalam Cerita.
                    </div>
                </div>
                <div class="history-image">
                    <img src="https://images.unsplash.com/photo-1596040033229-a9821ebd058d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Foto Rempah Nusantara">
                </div>
            </div>
        </div>
    </section>
</body>
</html>
