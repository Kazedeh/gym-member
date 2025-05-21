@extends('layouts.app')

@section('content')
<style>
    .welcome-container {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 0 20px;
        background: linear-gradient(to right, #1f2937, #4b5563);
        color: white;
        overflow: hidden;
    }

    .welcome-heading {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        opacity: 0;
        transform: translateY(50px);
        animation: slideUp 1s ease-out forwards;
    }

    .welcome-description {
        font-size: 1.2rem;
        max-width: 700px;
        margin-bottom: 30px;
        line-height: 1.6;
        opacity: 0;
        transform: translateY(50px);
        animation: slideUp 1s ease-out forwards 0.2s;
    }

    .features {
        font-size: 1rem;
        text-align: left;
        max-width: 600px;
        margin: 0 auto 30px auto;
        list-style: none;
        padding-left: 0;
        opacity: 0;
        transform: translateY(50px);
        animation: slideUp 1s ease-out forwards 0.4s;
    }

    .features li {
        margin-bottom: 10px;
        padding-left: 25px;
        position: relative;
    }

    .features li::before {
        content: "✔";
        position: absolute;
        left: 0;
        color: #10b981;
        font-weight: bold;
    }

    .join-btn {
        padding: 12px 28px;
        font-size: 1.2rem;
        font-weight: bold;
        color: white;
        background-color: #10b981;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        opacity: 0;
        transform: translateY(50px);
        animation: slideUp 1s ease-out forwards 0.6s;
        transition: background-color 0.3s ease;
    }

    .join-btn:hover {
        background-color: #059669;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="welcome-container">
    <div class="welcome-heading">Selamat Datang di GYM Ayam Berotot</div>
    <div class="welcome-description">
        Bergabunglah bersama komunitas kebugaran terbaik di kota! Dengan fasilitas lengkap dan pelatih profesional, kami siap bantu kamu menjadi versi terbaik dari dirimu.
    </div>
    <ul class="features">
        <li>Alat Gym Modern & Lengkap</li>
        <li>Pelatih Pribadi Bersertifikat</li>
        <li>Akses 24 Jam & Kelas Harian</li>
        <li>Suasana Nyaman & Komunitas Positif</li>
    </ul>
    <a href="{{ route('members.index') }}" class="join-btn">Gabung Sekarang</a>
</div>
@endsection
