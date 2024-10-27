<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;  
            margin-top: 20px; 
            max-width: 400px;
            margin-left: auto; 
            margin-right: auto; 
        }
        .form-label {
            font-weight: bold;
        }
        h2 {
            margin-bottom: 15px;
            color: #343a40;
            font-size: 1.5rem; 
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
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
                        <a class="nav-link" href="{{ route('compte.index') }}">Comptes Bancaires</a> <!-- Assurez-vous que cette route existe -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="form-container">
        <h2 class="text-center">Modifier le Client</h2>

      
        <form action="{{ route('compte.update', $compte->id) }}" method="POST" class="p-4 shadow-sm bg-light rounded">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="rib" class="form-label" style="font-weight: bold;">RIB:</label>
                <input type="text" class="form-control" id="rib" name="rib" value="{{ $compte->rib }}" required>
            </div>

            <div class="mb-3">
                <label for="solde" class="form-label" style="font-weight: bold;">Solde:</label>
                <input type="number" class="form-control" id="solde" name="solde" value="{{ $compte->solde }}" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
            <a href="{{ route('compte.index') }}" class="btn btn-secondary w-100 mt-2">Annuler</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
