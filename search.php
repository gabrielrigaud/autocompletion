<?php
require_once 'db.php';

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = trim($_GET['search']);
    
    $stmt = $pdo->prepare('SELECT * FROM ville WHERE nom LIKE :search LIMIT 10');
    $stmt->execute(['search' => $search . '%']);
    
    $results = $stmt->fetchAll();
    
    if ($results) {
        foreach ($results as $ville) {
            echo '<a href="recherche.php?search=' . urlencode($ville['nom']) . '" class="flex justify-between items-baseline px-8 py-5 border-b border-black/5 hover:bg-[#1A1A1A] hover:text-[#F8F6F0] group transition-colors duration-200">';
            echo '<span class="font-serif text-3xl">' . htmlspecialchars($ville['nom']) . '</span>';
            echo '<span class="font-sans text-xs uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity">Voir l\'entrée ⟶</span>';
            echo '</a>';
        }
    } else {
        echo '<div class="px-8 py-6 text-black/40 font-serif italic text-2xl border-b border-black/5 cursor-default">Archive introuvable pour ce terme.</div>';
    }
}
?>