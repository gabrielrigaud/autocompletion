<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de Recherche</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,600;0,800;1,400&display=swap" rel="stylesheet">
    <style>
        body { background-color: #F8F6F0; color: #1A1A1A; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased font-sans">
    <header>
        <?php include 'header.php'?>
    </header>
    
    <main class="max-w-5xl mx-auto px-6 py-12 mb-24">
        <div class="border-t border-black/20 pt-16">
            <?php
            require_once 'db.php';

            if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
                $search = trim($_GET['search']);
                echo "<p class=".'"'."text-sm uppercase tracking-widest text-[#912d2d] mb-4".'"'.">Index des résultats</p>";
                echo "<h2 class='text-5xl md:text-7xl font-serif italic mb-16'>«&nbsp;".htmlspecialchars($search)."&nbsp;»</h2>";
                
                $stmt = $pdo->prepare('SELECT * FROM ville WHERE nom LIKE :search');
                $stmt->execute(['search' => '%' . $search . '%']);
                $results = $stmt->fetchAll();
                
                if (count($results) > 0) {
                    echo '<div class="space-y-0">';
                    foreach ($results as $row) {
                        echo '<a href="element.php?id='.$row['id'].'" class="group flex items-center justify-between py-6 border-b border-black/10 hover:border-black transition-colors">';
                        echo '<h3 class="font-serif text-3xl group-hover:italic transition-all">'.htmlspecialchars($row['nom']).'</h3>';
                        echo '<span class="text-xs font-sans tracking-widest uppercase text-black/30 group-hover:text-black transition-colors">Lire le dossier</span>';
                        echo '</a>';
                    }
                    echo '</div>';
                } else {
                    echo '<div class="py-24 text-center border-y border-black/10"><p class="text-3xl font-serif text-black/40 italic">Aucune archive ne correspond à cette requête.</p></div>';
                }
            } else {
                echo '<div class="py-24 text-center border-y border-black/10"><p class="text-3xl font-serif text-black/40 italic">La requête est vide.</p></div>';
            }
            ?>
        </div>
    </main>
</body>
</html>