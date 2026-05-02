<x-app-layout>

<div class="min-h-screen w-full bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            📩 Customer Messages
        </h1>

        <div class="text-sm text-gray-500">
            Total Messages: {{ count($contacts) }}
        </div>
    </div>

    <!-- STATS BOXES -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-white rounded-2xl shadow p-5 border-l-4 border-indigo-500">
            <h2 class="text-gray-500">Total Messages</h2>
            <p class="text-2xl font-bold">{{ count($contacts) }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-5 border-l-4 border-green-500">
            <h2 class="text-gray-500">Latest Message</h2>
            <p class="text-sm font-semibold">
                {{ $contacts->first()->name ?? 'No Data' }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow p-5 border-l-4 border-pink-500">
            <h2 class="text-gray-500">System Status</h2>
            <p class="text-green-600 font-bold">Active</p>
        </div>

    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- SEARCH -->
        <div class="p-4 border-b flex justify-between items-center">
            <input type="text" id="search"
                   placeholder="🔍 Search customers..."
                   class="w-1/3 p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400">

            <span class="text-sm text-gray-500">Manage all messages</span>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-700 border-b">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Message</th>
                        <th class="p-3">Created At</th>
                        <th class="p-3">Action</th>
                    </tr>
                </thead>

                <tbody id="tableBody">

                    @forelse($contacts as $contact)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="p-3 font-bold">{{ $contact->id }}</td>

                            <td class="p-3">{{ $contact->name }}</td>

                            <td class="p-3 text-blue-600">{{ $contact->email }}</td>

                            <td class="p-3">
                                <span class="bg-gray-100 px-2 py-1 rounded">
                                    {{ $contact->message }}
                                </span>
                            </td>

                            <td class="p-3 text-gray-500">
                                {{ $contact->created_at }}
                            </td>

                            <td class="p-3">

                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg">
                                    Delete
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center p-6 text-gray-500">
                                No messages found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- SEARCH SCRIPT -->
<script>
document.getElementById('search').addEventListener('keyup', function () {

    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#tableBody tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });

});
</script>

</x-app-layout>