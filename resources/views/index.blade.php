<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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


    <div>
        <a href="{{ route('client.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Ajouter  Client
        </a>
    </div>
    
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->prénom }}</td>
                        <td>
                            <!-- Bouton Modifier -->
                            <a href="{{ route('client.edit', $client->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <!-- Bouton Supprimer -->
                            <form action="{{ route('client.destroy', $client->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                            <!-- Bouton Ajouter Compte -->
                            <a href="{{ route('client.accounts.create', $client->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-plus-circle"></i> Ajouter Compte
                            </a>
                            <!-- Bouton Détails -->
                            <a href="{{ route('details', $client->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-info-circle"></i> Détails
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
