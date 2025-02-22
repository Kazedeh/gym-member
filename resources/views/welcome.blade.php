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
        overflow: hidden;
    }
    .welcome-text {
        font-size: 2rem;
        font-weight: bold;
        opacity: 0;
        transform: translateY(50px);
        animation: slideUp 1s ease-out forwards;
    }
    .join-btn {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 1.2rem;
        font-weight: bold;
        color: white;
        background-color:rgb(56, 61, 66);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        opacity: 0;
        transform: translateY(50px);
        animation: slideUp 1s ease-out forwards 0.5s;
    }
    .join-btn:hover {
        background-color:rgb(30, 46, 63);
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
    <div class="welcome-text">Join Membership GYM Ayam Berotot</div>
    <a href="{{ route('members.index') }}" class="join-btn">Join</a>

@endsection
