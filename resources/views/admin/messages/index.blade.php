@extends('layouts.app')

@section('content')
<main class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <nav class="text-white text-base font-semibold pt-3">
            <a href="spots" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-map-marker-alt mr-3"></i>
                Spots
            </a>
            <a href="users" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-users mr-3"></i>
                Users
            </a>
            <a href="roles" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-dice-d20 mr-3"></i>
                Roles
            </a>
            <a href="messages" class="flex items-center active-nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="far fa-comments mr-3"></i>
                Messages
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black mb-2">Messages</h1>
                <div class="w-full mt-2">
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                    <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                    <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                    <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                    <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                    <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                    <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                    <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                    <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
</main>
</div>
</main>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
@endsection