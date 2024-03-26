@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Elenco dei portafogli</h1>

        <a href="{{ route('dashboard.wallets.create') }}" class="btn btn-primary col-12 m-3 ">Inserisci un nuovo Progetto</a>

        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Immagine</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wallets as $wallet)
                    <tr>
                        <td>{{ $wallet->id }}</td>

                        <td class="text-center">
                            <a href="{{ route('dashboard.wallets.show', ['wallet' => $wallet['id']]) }}" class="text-uppercase ">
                                {{ $wallet->title }}
                            </a>
                        </td>

                        <td>{{ $wallet->description }}</td>
                        <td class="text-center">
                            <img src="{{ $wallet->image }}" alt="Immagine del portafoglio" width="100">
                        </td>

                        <td class="text-center d-flex gap-2 align-items-end">
                                <a type="submit" class="btn btn-primary ">Edit</a>

                                <form action="{{ route('dashboard.wallets.destroy', $wallet->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ">Delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
