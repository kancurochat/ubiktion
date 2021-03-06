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
            <a href="messages"
                class="flex items-center active-nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
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
                        <table class="min-w-full table-auto border-collapse border-2 border-blue-light">
                            <thead class="bg-gray-800 text-white uppercase">
                                <tr>
                                    <th class="border border-blue-light p-2">ID</th>
                                    <th class="border border-blue-light p-2">Name</th>
                                    <th class="border border-blue-light p-2">Email</th>
                                    <th class="border border-blue-light p-2">Message
                                    </th>
                                    <th class="border border-blue-light p-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    <td class="border border-blue-light p-2">{{$message->id}}</td>
                                    <td class="border border-blue-light p-2">{{$message->name}}</td>
                                    <td class="border border-blue-light p-2"><a class="hover:text-blue-500"
                                            href="mailto:{{$message->email}}">{{$message->email}}</a></td>
                                    <td class="border border-blue-light p-2">{{$message->message}}</td>
                                    <td class="border border-blue-light p-2">
                                        <button
                                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-500"
                                            onclick="toggleModal('modal-{{$message->id}}')">Delete</button>
                                    </td>
                                </tr>
                                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                                    id="modal-{{$message->id}}">
                                    <div class="relative w-auto my-6 mx-auto max-w-3xl">
                                        <!--content-->
                                        <div
                                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                            <!--header-->
                                            <div
                                                class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                                                <h3 class="text-3xl font-semibold">
                                                    Delete Message
                                                </h3>
                                                <button
                                                    class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                                    onclick="toggleModal('modal-{{$message->id}}')">
                                                    <span
                                                        class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                        ×
                                                    </span>
                                                </button>
                                            </div>
                                            <!--body-->
                                            <div class="relative p-6 flex-auto">
                                                <p class="my-4 text-gray-600 text-lg leading-relaxed">
                                                    Do you really want to delete this message?
                                                </p>
                                            </div>
                                            <!--footer-->
                                            <div
                                                class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                                                <button
                                                    class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                                    type="button" style="transition: all .15s ease"
                                                    onclick="toggleModal('modal-{{$message->id}}')">
                                                    Close
                                                </button>
                                                {!! Form::open(['method' => 'DELETE','route' => ['messages.destroy',
                                                $message->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'bg-red-500 text-white
                                                active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded shadow
                                                hover:shadow-lg outline-none focus:outline-none mr-1 mb-1
                                                cursor-pointer']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                                <script type="text/javascript">
                                    function toggleModal(modalID){
                                          document.getElementById(modalID).classList.toggle("hidden");
                                          document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                                          document.getElementById(modalID).classList.toggle("flex");
                                          document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                                        }
                                </script>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

    </div>
</main>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
@endsection