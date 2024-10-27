<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Comptes Bancaires</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Menu de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.index') }}">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('compte.index') }}">Comptes Bancaires</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bouton Ajouter un Compte -->
   
    <h2 class="text-center">Liste des Comptes Bancaires</h2>

    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>RIB</th>
                    <th>Solde</th>
                    <th>Client</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comptes as $compte)
                    <tr>
                        <td>{{ $compte->rib }}</td>
                        <td>{{ $compte->solde }} €</td>
                        <td>{{ $compte->client->nom }} {{ $compte->client->prénom }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
