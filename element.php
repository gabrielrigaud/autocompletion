<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture - Atlas Français</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,800;1,400&display=swap" rel="stylesheet">
    <style>
        body { background-color: #F8F6F0; color: #1A1A1A; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased font-sans">
    <header>
        <?php include 'header.php';?>
    </header>

    <main class="max-w-4xl mx-auto px-6 py-16 mb-32">
        <article class="relative">
            <?php
            require_once 'db.php';

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                $stmt = $pdo->prepare('SELECT * FROM elements WHERE id = :id');
                $stmt->execute(['id' => $id]);
                $row = $stmt->fetch();
                
                if ($row) {
                    echo '<header class="mb-16 pb-12 border-b border-black/10 text-center md:text-left">';
                    echo '<p class="text-sm uppercase tracking-[0.3em] text-[#912d2d] font-medium mb-6">Édition Spéciale</p>';
                    echo '<h1 class="text-6xl md:text-8xl font-serif font-semibold tracking-tight text-[#1A1A1A] mb-8">'.htmlspecialchars($row['nom']).'</h1>';
                    echo '</header>';
                    
                    // Emulating an editorial multi-column or beautiful large text layout
                    echo '<div class="prose prose-xl prose-zinc max-w-none font-serif text-[#1A1A1A]/80 leading-[1.8] first-letter:text-7xl first-letter:font-bold first-letter:float-left first-letter:mr-3 first-letter:text-[#1A1A1A] md:columns-1">';
                    echo '<p>'.nl2br(htmlspecialchars($row['description'])).'</p>';
                    echo '</div>';
                    
                    echo '<div class="mt-24 pt-8 border-t border-black/10">';
                    echo '<a href="javascript:history.back()" class="inline-flex items-center text-sm font-sans uppercase tracking-widest text-black/60 hover:text-black transition-colors group">';
                    echo '<span class="mr-3 group-hover:-translate-x-2 transition-transform">←</span> Retour au recueil';
                    echo '</a>';
                    echo '</div>';
                } else {
                    echo '<div class="text-center py-24"><p class="text-4xl font-serif italic text-black/40">Article introuvable ou retiré de la collection.</p></div>';
                }
            } else {
                echo '<div class="text-center py-24"><p class="text-4xl font-serif italic text-black/40">Identifiant d\'article invalide.</p></div>';
            }
            ?>
        </article>
    </main>
</body>
</html>