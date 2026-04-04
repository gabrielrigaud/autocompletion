<div class="border-b border-black/10">
    <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row md:items-end justify-between">
        <h1 class="text-3xl font-serif text-[#1A1A1A] tracking-tight mb-4 md:mb-0">
            <a href="." class="hover:italic transition-all duration-300 inline-block">L'Atlas Français</a>
        </h1>
        <div class="text-xs font-sans text-black/40 uppercase tracking-[0.2em]">Archive Documentaire • Édition 2026</div>
    </div>
</div>

<div class="max-w-5xl mx-auto px-6 py-16 relative z-50">
    <form action="recherche.php" method="GET" class="relative group w-full">
        <div class="flex items-end border-b-2 border-black/20 group-focus-within:border-black transition-colors duration-500 pb-2">
            <span class="text-3xl md:text-5xl font-serif text-black/20 mr-4 mb-2">Q.</span>
            <input type="text" name="search" id="search" placeholder="Nom de ville..." autocomplete="off" 
                   class="w-full bg-transparent text-[#1A1A1A] text-4xl md:text-7xl font-serif placeholder-black/10 focus:outline-none focus:ring-0 rounded-none mb-1">
            <button type="submit" class="opacity-0 w-0">Chercher</button>
        </div>
        
        <!-- Container des résultats AJAX (Style "Dictionnaire") -->
        <div id="results" class="hidden absolute top-full left-12 right-0 bg-[#F8F6F0] shadow-[0_30px_60px_rgba(0,0,0,0.1)] border-b border-x border-black/5 z-50"></div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#search").on("input", function() {
            var search = $(this).val();
            if (search.length >= 1) {
                $.ajax({
                    type: "GET",
                    url: "search.php",
                    data: { search: search },
                    success: function(response) {
                        $("#results").html(response).slideDown(300);
                    }
                });
            } else {
                $("#results").empty().slideUp(200);
            }
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('form').length) {
                $("#results").slideUp(200);
            }
        });
        
        $("#search").click(function() {
            if ($("#results").children().length > 0) {
                $("#results").slideDown(300);
            }
        });
    });
</script>
