@extends('layouts.admin')

@section('content')

<h1 class="page-title">Dashboard Admin</h1>

<div class="stats-grid">
    <div class="stat-card approved">
        <span>Total Postingan</span>
        <p>{{ $totalItems }}</p>
    </div>

    <div class="stat-card users">
        <span>Total User</span>
        <p>{{ $totalUsers }}</p>
    </div>
</div>

<div class="table-card">
    <h2>Item Terbaru</h2>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestItems as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>
                    <span class="badge {{ $item->status }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
