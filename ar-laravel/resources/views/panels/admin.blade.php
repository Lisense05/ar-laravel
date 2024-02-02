<x-app-layout>
    
    <h1 class="text-3xl font-bold mt-4 mb-2 text-gray-800 dark:text-white flex justify-center">Admin Dashboard</h1>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <div>
                <form id="AdminDelete_button" action="{{ route('delete.user', ['user' => '0'])  }}" method="POST">
                    <button data-modal-target="createUserModal" data-modal-show="createUserModal" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                        Create
                    </button>
                
                    @csrf
                    @method('DELETE')
                    <button id="admin_deletebutton" onclick="handleDeleteButtonClick()" class="mx-3 inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="submit" style="display: none;">
                        Delete
                    </button>
                </form>
            </div>

            
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        IsAdmin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search" data-id="{{$user->id }}" type="checkbox" class="user-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-base font-semibold">{{ $user->id }}</div>
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        
                        <div class="ps-3">
                            
                            <div class="text-base font-semibold user-name">{{ $user->name }}</div>
                            <div class="font-normal text-gray-500 user-email">{{ $user->email }}</div>
                            
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        @if($user->is_admin)
                            <span class="inline-block w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                        @else
                            <span class="inline-block w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" data-user-name="{{ $user->name }}" data-user-email="{{ $user->email }}" data-user-is_admin="{{ $user->is_admin }}" data-user-id="{{ $user->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1em" viewBox="0 0 640 512">
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg></a>
                        

                    </td>
                </tr>

                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Modals -->
        @include('panels.components.user-edit-modal') 
        @include('panels.components.user-create-modal')
        
    </div>


    <script>

        function handleDeleteButtonClick() {
            const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
            
            if(selectedCheckboxes.length > 0) {
                const selectedUserIds = [];
                selectedCheckboxes.forEach(checkbox => {
                    
                    const userId = checkbox.getAttribute('data-id');
                    selectedUserIds.push(userId);
                });
                const deleteForm = document.getElementById('AdminDelete_button');
                deleteForm.action = '{{ route("delete.user") }}';

                const userIdsInput = document.createElement('input');
                userIdsInput.type = 'hidden';
                userIdsInput.name = 'user_ids';
                userIdsInput.value = selectedUserIds.join(',');
                deleteForm.appendChild(userIdsInput);
                deleteForm.submit();

            } else {
                alert('Please select at least one user to delete.');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('admin_deletebutton');
            const checkboxes = document.querySelectorAll('.user-checkbox');
            const searchInput = document.getElementById('table-search-users');

            searchInput.addEventListener('input', handleSearch);

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const anyCheckboxChecked = document.querySelector('.user-checkbox:checked');
                    deleteButton.style.display = anyCheckboxChecked ? 'inline-flex' : 'none';
                });
            });

            const editUserLinks = document.querySelectorAll('[data-modal-show="editUserModal"]');
            
            editUserLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const modal = document.getElementById('editUserModal');
                    const userName = link.getAttribute('data-user-name');
                    const editForm = modal.querySelector('#edit-user-form');
                    const userEmail = link.getAttribute('data-user-email');
                    const isadmin = link.getAttribute('data-user-is_admin');
                    const userId = link.getAttribute('data-user-id');
                    
                    
                    const userNameInput = modal.querySelector('#name');
                    const userEmailInput = modal.querySelector('#email');
                    const isAdminInput = modal.querySelector('#is_admin');
                    
                    isAdminInput.checked = isadmin ? isadmin == 1 : false;
                    userNameInput.value = userName;
                    userEmailInput.value = userEmail;
                    editForm.action = '{{ route("update.user", ["user" => ":userId"]) }}'.replace(':userId', userId);
                    

                });
            });

            function handleSearch() {
                const searchTerm = searchInput.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const name = row.querySelector('.user-name').textContent.toLowerCase();
                    const email = row.querySelector('.user-email').textContent.toLowerCase();

                    
                    if (name.includes(searchTerm) || email.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none'; 
                    }
                });
            }

        });
    </script>

</x-app-layout>