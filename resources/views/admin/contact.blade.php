@extends('layouts.admin')

@section('content')

<div style="background:#0d0d0d; min-height:100vh; padding:20px; color:white;">

    <h2 style="color:gold;">📩 Customer Messages</h2>

    <!-- TOP BAR -->
    <div style="display:flex; justify-content:space-between; margin:15px 0;">

        <!-- ENTRIES -->
        <div>
            <label>Show</label>
            <select style="background:black; color:gold; border:1px solid gold; padding:5px;">
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select>
            <label>entries</label>
        </div>

        <!-- SEARCH -->
        <form method="GET" action="{{ route('admin.contact') }}">
            <input type="text" name="search" value="{{ $search ?? '' }}"
                   placeholder="Search..."
                   style="padding:6px; background:black; color:white; border:1px solid gold;">

            <button style="background:gold; color:black; padding:6px 10px; border:none;">
                Search
            </button>
        </form>

    </div>

    <!-- TABLE -->
    <table style="width:100%; border-collapse:collapse; background:black;">

        <thead>
            <tr style="background:gold; color:black;">
                <th style="padding:10px;">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($contacts as $contact)
            <tr style="border-bottom:1px solid #333;">
                <td style="padding:10px;">{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject ?? 'N/A' }}</td>
                <td>{{ \Illuminate\Support\Str::limit($contact->message, 40) }}</td>

                <td>
                    <!-- EDIT -->
                    <a href="{{ route('admin.contact.edit', $contact->id) }}"
                       style="background:gold; color:black; padding:5px 10px; text-decoration:none;">
                        Edit
                    </a>

                    <!-- DELETE -->
                    <a href="{{ route('admin.contact.delete', $contact->id) }}"
                       style="background:red; color:white; padding:5px 10px; text-decoration:none;"
                       onclick="return confirm('Delete this message?')">
                        Delete
                    </a>
                </td>
            </tr>

        @empty
            <tr>
                <td colspan="6" style="text-align:center; padding:20px;">
                    No data found 😢
                </td>
            </tr>
        @endforelse

        </tbody>

    </table>

</div>

@endsection