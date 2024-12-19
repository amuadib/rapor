<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Aplikasi e-rapor untuk Madrasah Diniyah" />
    <meta name="author" content="Madrasah Diniyah" />
    <title>Aplikasi e-Rapor Madrasah Diniyah</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Hero Section */
        .hero {
            background-color: #48c060;
            color: white;
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .cta-button {
            background-color: #f9a01e;
            color: white;
            padding: 12px 30px;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #e68900;
        }

        /* Features Section */
        .features {
            display: flex;
            justify-content: space-around;
            padding: 60px 20px;
            background-color: #ffffff;
        }

        .feature {
            text-align: center;
            max-width: 250px;
        }

        .feature h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #009688;
        }

        .feature p {
            font-size: 1rem;
            color: #666;
        }

        .feature img {
            max-width: 100px;
            margin-bottom: 20px;
        }

        /* Call to Action Section */
        .cta {
            background-color: #48c060;
            color: white;
            text-align: center;
            padding: 50px 20px;
        }

        .cta h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
        }

        footer p {
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .features {
                flex-direction: column;
                align-items: center;
            }

            .cta h2 {
                font-size: 1.5rem;
            }

            .cta p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero">
        <h1>Aplikasi e-Rapor Madrasah Diniyah</h1>
        <p>
            Solusi digital untuk memudahkan pengelolaan rapor dan prestasi
            siswa Madrasah Diniyah.
        </p>
        @auth
            <a href="{{ url('/admin') }}" class="cta-button">Dasbor</a>
        @else
            <a href="{{ url('/admin/login') }}" class="cta-button">Masuk</a>
        @endauth
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="feature">
            <img src="{{ asset('1.png') }}" alt="Icon 1" />
            <h3>Pengelolaan Nilai</h3>
            <p>Rekap nilai siswa secara mudah dan terorganisir.</p>
        </div>
        <div class="feature">
            <img src="{{ asset('2.png') }}" alt="Icon 2" />
            <h3>Proses Penilaian Cepat</h3>
            <p>
                Mempercepat proses input nilai dan laporan hasil belajar
                siswa.
            </p>
        </div>
        <div class="feature">
            <img src="{{ asset('3.png') }}" alt="Icon 3" />
            <h3>Data Siswa Terintegrasi</h3>
            <p>Integrasi data siswa yang mudah dipantau dan dikelola.</p>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta" id="cta">
        <h2>Siap Bergabung?</h2>
        <p>
            Daftarkan madrasah Anda dan nikmati kemudahan dalam pengelolaan
            rapor siswa!
        </p>
        <a href="#" class="cta-button">Daftar Sekarang</a>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>
            &copy; 2024 Aplikasi e-Rapor Madrasah Diniyah | Semua Hak Cipta
            Dilindungi
        </p>
    </footer>
    <a href="https://www.flaticon.com/free-icons/" title="icons" style="display:none">Flaticon</a>
</body>

</html>
