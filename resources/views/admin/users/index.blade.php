@extends('layouts.app')

@section('content')
<main class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar h-screen w-auto hidden sm:block shadow-xl px-2">
        <nav class="text-white text-base font-semibold pt-3">
            <a href="spots" class="flex items-center text-white py-4 pl-6 nav-item">
                <i class="fas fa-map-marker-alt mr-3"></i>
                Spots
            </a>
            <a href="users"
                class="flex items-center active-nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item px-2">
                <i class="fas fa-users mr-3"></i>
                Users
            </a>
            <a href="roles" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item px-2">
                <i class="fas fa-dice-d20 mr-3"></i>
                Roles
            </a>
            <a href="messages"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item px-2">
                <i class="far fa-comments mr-3"></i>
                Messages
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black mb-2">Users</h1>
                @can('user-create')
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-500"
                    href="{{ route('users.create') }}"> Create New User</a>
                @endcan
                <form class='inline-block' action="{{ url('/users') }}" method="GET">
                    <div class="pt-2 relative mx-auto text-gray-600 inline-block">
                        <input
                            class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                            type="search" name="search" placeholder="Search" value="{{$search ?? ''}}">
                        <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                xml:space="preserve" width="512px" height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                </form>

                <div class="w-full mt-2">
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full table-auto border-collapse border-2 border-blue-light">
                            <thead class="bg-gray-800 text-white uppercase">
                                <tr>
                                    <th class="border border-blue-light p-2">ID</th>
                                    <th class="border border-blue-light p-2">Name</th>
                                    <th class="border border-blue-light p-2">Email</th>
                                    <th class="border border-blue-light p-2">Email verified at
                                    </th>
                                    <th class="border border-blue-light p-2">Roles</th>
                                    <th class="border border-blue-light p-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="border border-blue-light p-2">{{$user->id}}</td>
                                    <td class="border border-blue-light p-2">{{$user->name}}</td>
                                    <td class="border border-blue-light p-2"><a class="hover:text-blue-500"
                                            href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                                    <td class="border border-blue-light p-2">{{$user->email_verified_at}}</td>
                                    <td class="border border-blue-light p-2">
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                        <label
                                            class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-green-500 text-white hover:green-600">{{ $v }}</label>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td class="border border-blue-light p-2">
                                        <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-600 text-white hover:bg-green-500"
                                            href="{{ route('users.show',$user->id) }}">Show</a>
                                        <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-500"
                                            href="{{ route('users.edit',$user->id) }}">Edit</a>
                                        <button
                                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-500"
                                            onclick="toggleModal('modal-{{$user->id}}')">Delete</button>
                                    </td>
                                </tr>
                                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                                    id="modal-{{$user->id}}">
                                    <div class="relative w-auto my-6 mx-auto max-w-3xl">
                                        <!--content-->
                                        <div
                                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                            <!--header-->
                                            <div
                                                class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                                                <h3 class="text-3xl font-semibold">
                                                    Delete User
                                                </h3>
                                                <button
                                                    class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                                    onclick="toggleModal('modal-{{$user->id}}')">
                                                    <span
                                                        class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                        ×
                                                    </span>
                                                </button>
                                            </div>
                                            <!--body-->
                                            <div class="relative p-6 flex-auto">
                                                <p class="my-4 text-gray-600 text-lg leading-relaxed">
                                                    Do you really want to delete this user?
                                                </p>
                                            </div>
                                            <!--footer-->
                                            <div
                                                class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                                                <button
                                                    class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                                    type="button" style="transition: all .15s ease"
                                                    onclick="toggleModal('modal-{{$user->id}}')">
                                                    Close
                                                </button>
                                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy',
                                                $user->id],'style'=>'display:inline']) !!}
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