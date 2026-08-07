<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">
    <title>Ma Tontine- Profil</title>
</head>
<body class="text-slate-950 min-h-dvh pt-6">

    <?php include_once('../includes/profil_header.php') ?>

   <main>
    <div class="max-w-6xl mx-auto px-6 xl:px-0">
        <div class="flex flex-col md:flex-row gap-x-24">
            <div class="py-12 h-full md:sticky md:top-6">
                <?php include('../includes/sidebar.php'); ?>
            </div>
            
            <section class="py-12 flex-1">
                <h2 class="text-2xl mb-6">Liste des membres</h2>

                <div class="flex items-center justify-end mb-4">
                    <a 
                        href="./add_member.php"
                        class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer flex items-center gap-2">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            width="24" 
                            height="24" 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            class="lucide lucide-plus-icon lucide-plus">
                            <path d="M5 12h14"/><path d="M12 5v14"/>
                        </svg>
                        Ajouter un membre
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Photo</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Nom</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Telephone</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Role</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-200">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-slate-700">
                                    <figure>
                                        <svg 
                                            xmlns="http://www.w3.org/2000/svg" 
                                            width="24" 
                                            height="24" 
                                            viewBox="0 0 24 24" 
                                            fill="none" 
                                            stroke="currentColor" 
                                            stroke-width="2" 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round" 
                                            class="lucide lucide-circle-user-round-icon lucide-circle-user-round size-12 text-purple-800">
                                            <path d="M17.925 20.056a6 6 0 0 0-11.851.001"/><circle cx="12" cy="11" r="4"/>
                                            <circle cx="12" cy="12" r="10"/>
                                        </svg>
                                    </figure>
                                </td>
                                <td class="px-6 py-4 text-slate-600">Sanfo Youssouf</td>
                                <td class="px-6 py-4 text-slate-600">0799999999</td>
                                <td class="px-6 py-4 text-slate-600">Admin</td>
                                <td class="px-6 py-4 flex items-center flex-wrap gap-6">
                                    <a href="" class="underline text-blue-600">Voir</a>
                                    <a href="" class="underline text-red-600">Supprimé</a>
                                    <a href="" class="underline text-yellow-600">Modifier</a>
                                </td>
                            </tr>

                             <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-slate-700">
                                    <figure>
                                        <svg 
                                            xmlns="http://www.w3.org/2000/svg" 
                                            width="24" 
                                            height="24" 
                                            viewBox="0 0 24 24" 
                                            fill="none" 
                                            stroke="currentColor" 
                                            stroke-width="2" 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round" 
                                            class="lucide lucide-circle-user-round-icon lucide-circle-user-round size-12 text-purple-800">
                                            <path d="M17.925 20.056a6 6 0 0 0-11.851.001"/><circle cx="12" cy="11" r="4"/>
                                            <circle cx="12" cy="12" r="10"/>
                                        </svg>
                                    </figure>
                                </td>
                                <td class="px-6 py-4 text-slate-600">Sanfo Youssouf</td>
                                <td class="px-6 py-4 text-slate-600">0799999999</td>
                                <td class="px-6 py-4 text-slate-600">Admin</td>
                                <td class="px-6 py-4 flex items-center flex-wrap gap-6">
                                    <a href="" class="underline text-blue-600">Voir</a>
                                    <a href="" class="underline text-red-600">Supprimé</a>
                                    <a href="" class="underline text-yellow-600">Modifier</a>
                                </td>
                            </tr>

                             <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-slate-700">
                                    <figure>
                                        <svg 
                                            xmlns="http://www.w3.org/2000/svg" 
                                            width="24" 
                                            height="24" 
                                            viewBox="0 0 24 24" 
                                            fill="none" 
                                            stroke="currentColor" 
                                            stroke-width="2" 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round" 
                                            class="lucide lucide-circle-user-round-icon lucide-circle-user-round size-12 text-purple-800">
                                            <path d="M17.925 20.056a6 6 0 0 0-11.851.001"/><circle cx="12" cy="11" r="4"/>
                                            <circle cx="12" cy="12" r="10"/>
                                        </svg>
                                    </figure>
                                </td>
                                <td class="px-6 py-4 text-slate-600">Sanfo Youssouf</td>
                                <td class="px-6 py-4 text-slate-600">0799999999</td>
                                <td class="px-6 py-4 text-slate-600">Admin</td>
                                <td class="px-6 py-4 flex items-center flex-wrap gap-6">
                                    <a href="" class="underline text-blue-600">Voir</a>
                                    <a href="" class="underline text-red-600">Supprimé</a>
                                    <a href="" class="underline text-yellow-600">Modifier</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
   </main>

   <?php include_once('../includes/footer.php'); ?>
    
</body>
</html>