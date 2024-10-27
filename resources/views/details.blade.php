<!-- resources/views/clients/details.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="container my-4">
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

    <div class="card mb-4">
        <div class="card-body">
            <h5>Nom : {{ $client->nom }}</h5>
            <h5>Prénom : {{ $client->prénom }}</h5>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Numéro de Compte</th>
                <th>Solde</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($client->comptes as $compte)
                <tr>
                    <td>{{ $compte->rib }}</td>
                    <td>{{ $compte->solde }}</td>
                    <td>
                        <!-- Bouton Modifier avec icône -->
                        <a href="{{ route('compte.edit', $compte->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <!-- Bouton Supprimer avec icône -->
                        <form action="{{ route('compte.destroy', $compte->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?')">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
