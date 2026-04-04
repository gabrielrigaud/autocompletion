<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Atlas Français</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Playfair Display for editorial look, Inter for readable UI -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,600;0,800;1,400&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #F8F6F0;
            color: #1A1A1A;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-sans {
            font-family: 'Inter', sans-serif;
        }

        ::selection {
            background-color: #1A1A1A;
            color: #F8F6F0;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #F8F6F0;
        }

        ::-webkit-scrollbar-thumb {
            background: #E0DDD5;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #1A1A1A;
        }
    </style>
</head>

<body class="antialiased overflow-x-hidden font-sans selection:bg-black selection:text-white">
    <header>
        <?php include 'header.php'; ?>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-16 mb-24">

        <div class="mb-20">
            <p class="text-sm uppercase tracking-widest text-black/50 mb-4">Collection Sélectionnée</p>
            <h2 class="text-4xl md:text-6xl font-serif font-semibold tracking-tight leading-tight">L'âme des
                métropoles,<br><span class="italic font-light">saisie en une poignée d'images.</span></h2>
        </div>

        <!-- Masonry-like brutalist editorial grid -->
        <div class="columns-1 md:columns-2 lg:columns-3 gap-10 space-y-10">
            <?php
            $cities = [
                ['nom' => 'Paris', 'desc' => 'Capitale intemporelle', 'img' => 'https://upload.wikimedia.org/wikipedia/commons/4/4b/La_Tour_Eiffel_vue_de_la_Tour_Saint-Jacques%2C_Paris_ao%C3%BBt_2014_%282%29.jpg'],
                ['nom' => 'Marseille', 'desc' => 'Le carrefour de la Méditerranée', 'img' => 'https://media.timeout.com/images/105489547/image.jpg'],
                ['nom' => 'Lyon', 'desc' => 'La ville des lumières', 'img' => 'https://www.larousse.fr/encyclopedie/data/images/1314872-Lyon.jpg'],
                ['nom' => 'Toulouse', 'desc' => 'La ville rose', 'img' => 'https://www.guide-toulouse-pyrenees.com/_bibli/articlesPage/162/images/toulouse-adobestock-saiko3p.jpg'],
                ['nom' => 'Nice', 'desc' => 'Perle de la Côte d\'Azur', 'img' => 'https://www.nice.fr/wp-content/uploads/2025/06/vue-nice.jpg'],
                ['nom' => 'Nantes', 'desc' => 'L\'innovation créative', 'img' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/33/f7/3a/nantes.jpg?w=700&h=500&s=1'],
                ['nom' => 'Strasbourg', 'desc' => 'Le cœur battant de l\'Europe', 'img' => 'https://upload.wikimedia.org/wikipedia/commons/0/0e/Strasbourg_vue_a%C3%A9rienne_vers_la_cath%C3%A9drale_septembre_2015.jpg'],
                ['nom' => 'Montpellier', 'desc' => 'L\'effervescence du Sud', 'img' => 'https://upload.wikimedia.org/wikipedia/commons/8/8a/Place_de_la_Com%C3%A9die_%282377437375%29.jpg'],
                ['nom' => 'Bordeaux', 'desc' => 'Garde ses lettres de noblesse', 'img' => 'https://a.travel-assets.com/findyours-php/viewfinder/images/res70/481000/481844-Bordeaux.jpg'],
                ['nom' => 'Lille', 'desc' => 'Chaleur des Hauts-de-France', 'img' => 'https://images.france.fr/zeaejvyq9bhj/4lykvx2hoI6YksIo0YOiwe/9958cc7c0b4ca3d4efb16b8e7f49fbac/Grand_Place__OTCL_Lille_-_Laurent_Ghesqui__re.jpg']
            ];

            foreach ($cities as $city): ?>
                <div class="break-inside-avoid relative group">
                    <a href="recherche.php?search=<?= urlencode($city['nom']) ?>"
                        class="block overflow-hidden relative group">
                        <!-- We drop the rounded borders and the drop shadows for a purely sharp editorial look -->
                        <img src="<?= $city['img'] ?>" alt="<?= $city['nom'] ?>"
                            class="w-full h-auto object-cover grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700 ease-out transform group-hover:scale-105">
                    </a>
                    <div class="mt-4 flex justify-between items-baseline border-b border-black/10 pb-4">
                        <div>
                            <h3 class="text-3xl font-serif text-[#1A1A1A] group-hover:italic transition-all duration-300">
                                <?= $city['nom'] ?>
                            </h3>
                            <p class="text-sm font-sans text-black/60 mt-1"><?= $city['desc'] ?></p>
                        </div>
                        <a href="recherche.php?search=<?= urlencode($city['nom']) ?>"
                            class="text-xs uppercase font-medium tracking-widest text-[#1A1A1A] hover:text-[#912d2d] transition-colors relative before:content-[''] before:absolute before:w-full before:h-px before:bottom-0 before:bg-[#912d2d] before:scale-x-0 hover:before:scale-x-100 before:transition-transform before:origin-right hover:before:origin-left">Ouvrir</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>