<?php
header('Content-Type: application/json');

$endpoint = $_GET['endpoint'] ?? '';

switch ($endpoint) {
  case 'academie':
    $nom = strtolower($_GET['nom'] ?? '');
    $data = [
      'paris' => ['id' => 1, 'nom' => 'Paris', 'nb_lycees' => 38],
      'lyon' => ['id' => 2, 'nom' => 'Lyon', 'nb_lycees' => 26],
      'marseille' => ['id' => 3, 'nom' => 'Marseille', 'nb_lycees' => 29],
    ];
    echo isset($data[$nom]) ? json_encode($data[$nom]) : json_encode(['error' => 'Académie inconnue']);
    break;

  case 'lycee':
    $id = $_GET['id'] ?? '';
    $lycees = [
      '101' => ['id' => 101, 'nom' => 'Lycée Voltaire', 'ville' => 'Paris', 'filières' => ['S', 'ES', 'L']],
      '102' => ['id' => 102, 'nom' => 'Lycée Lumière', 'ville' => 'Lyon', 'filières' => ['STI2D', 'STMG']],
    ];
    echo isset($lycees[$id]) ? json_encode($lycees[$id]) : json_encode(['error' => 'Lycée non trouvé']);
    break;

  case 'eleve':
    $id = $_GET['id'] ?? '';
    $eleves = [
      '2024_001' => [
        'id' => '2024_001',
        'prenom' => 'Lucas',
        'nom' => 'Martin',
        'date_naissance' => '2006-02-13',
        'lycee' => 'Lycée Voltaire',
        'filiere' => 'S',
        'note' => 15.8,
        'mention' => 'Bien'
      ]
    ];
    echo isset($eleves[$id]) ? json_encode($eleves[$id]) : json_encode(['error' => 'Élève introuvable']);
    break;

  default:
    http_response_code(403);
    echo json_encode(['error' => 'Endpoint interdit']);
}
?>
