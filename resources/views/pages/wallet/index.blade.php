@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Elenco dei portafogli</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Immagine</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wallets as $wallet)
                    <tr>
                        <td>{{ $wallet->id }}</td>
                        <td>{{ $wallet->title }}</td>
                        <td>{{ $wallet->description }}</td>
                        <td>
                            <img src="{{ $wallet->image }}" alt="Immagine del portafoglio" width="100">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
