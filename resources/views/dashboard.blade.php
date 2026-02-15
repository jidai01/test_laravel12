<x-app-layout>
    <x-slot name="header">
        <div class="header-container d-flex align-items-center justify-content-between">
            <h2 class="header-title">
                <i class="fa-solid fa-gauge-high me-2 text-primary"></i>{{ __('Admin Dashboard') }}
            </h2>
            <span class="badge rounded-pill stats-badge">
                {{ $totalMessages ?? 0 }} Total Messages
            </span>
        </div>
    </x-slot>

    <div class="dashboard-wrapper container-fluid py-4">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="glass-stat-card">
                    <div class="stat-icon-wrapper">
                        <i class="fa-solid fa-envelope-open-text fs-3"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-label">Inbound Messages</span>
                        <h3 class="stat-value">{{ $totalMessages ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-data-card">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <h5 class="card-title-text"><i class="fa-solid fa-list me-2"></i>Recent Inquiries</h5>
                @if (session('status'))
                    <div class="alert alert-custom-success animate__animated animate__fadeIn">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="table-responsive-custom">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th class="col-date">Date</th>
                            <th class="col-sender">Sender</th>
                            {{-- <th class="col-subject">Subject</th> --}}
                            <th class="col-message">Message Preview</th>
                            <th class="col-actions text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $msg)
                            <tr class="data-row">
                                <td class="cell-date">{{ $msg->created_at->format('d M Y, H:i') }}</td>
                                <td class="cell-sender">
                                    <div class="sender-name">{{ $msg->name }}</div>
                                    <div class="sender-email">{{ $msg->email }}</div>
                                </td>
                                {{-- <td class="cell-subject">
                                    <span class="subject-badge">{{ $msg->subject }}</span>
                                </td> --}}
                                <td class="cell-preview">
                                    <p class="preview-text">{{ $msg->message }}</p>
                                </td>
                                <td class="cell-actions text-center">
                                    <div class="action-group">
                                        <button class="btn-action view" data-bs-toggle="modal"
                                            data-bs-target="#msgModal{{ $msg->id }}">
                                            <i class="fa-solid fa-eye me-1"></i> View
                                        </button>

                                        <form action="{{ route('contact.destroy', $msg->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus pesan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    <div class="empty-content">
                                        <i class="fa-solid fa-inbox"></i>
                                        <p>No messages found yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($messages->hasPages())
                <div class="pagination-container">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>

    @foreach ($messages as $msg)
        <div class="modal fade glass-modal" id="msgModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header-custom">
                        <h5 class="modal-title"><i class="fa-solid fa-envelope me-2"></i>Message Details</h5>
                        <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body-custom">
                        <div class="info-section">
                            <label>From</label>
                            <p>{{ $msg->name }} <span>&lt;{{ $msg->email }}&gt;</span></p>
                        </div>
                        {{-- <div class="info-section">
                            <label>Subject</label>
                            <p class="subject-text">{{ $msg->subject }}</p>
                        </div> --}}
                        <div class="info-section divider">
                            <label>Message Content</label>
                            <div class="content-box">
                                {{ $msg->message }}
                            </div>
                        </div>
                        <div class="info-section mt-3">
                            <label>Received At</label>
                            <p class="timestamp">{{ $msg->created_at->format('l, d F Y - H:i') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer-custom">
                        <button type="button" class="btn-modal-close" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <style>
        /* BASE THEME COLORS */
        :root {
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
            --primary-glow: #3b82f6;
            --text-dim: rgba(248, 250, 252, 0.6);
            --text-bright: #f8fafc;
        }

        /* HEADER & STATS */
        .header-title {
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--text-bright);
        }

        .stats-badge {
            background: var(--primary-glow);
            color: white;
            border: none;
        }

        .glass-stat-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            padding: 1.5rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
        }

        .stat-icon-wrapper {
            background: rgba(59, 130, 246, 0.15);
            color: var(--primary-glow);
            padding: 1rem;
            border-radius: 0.75rem;
            margin-right: 1.25rem;
        }

        .stat-label {
            color: var(--text-dim);
            font-size: 0.875rem;
            display: block;
        }

        .stat-value {
            color: var(--text-bright);
            font-weight: 700;
            margin: 0;
        }

        /* DATA CARD & TABLE */
        .glass-data-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 1rem;
            overflow: hidden;
        }

        .card-header-custom {
            padding: 1.5rem;
            border-bottom: 1px solid var(--glass-border);
        }

        .card-title-text {
            color: var(--text-bright);
            font-weight: 600;
            margin: 0;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            color: var(--text-bright);
        }

        .data-table thead {
            background: rgba(255, 255, 255, 0.05);
        }

        .data-table th {
            padding: 1rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-dim);
            border: none;
        }

        .data-row {
            border-bottom: 1px solid var(--glass-border);
            transition: 0.3s;
        }

        .data-row:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .data-table td {
            padding: 1.25rem 1rem;
        }

        .sender-name {
            font-weight: 600;
            color: var(--text-bright);
        }

        .sender-email {
            font-size: 0.8rem;
            color: var(--text-dim);
        }

        .subject-badge {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--glass-border);
            color: #60a5fa;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.8rem;
        }

        .preview-text {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: var(--text-dim);
            font-size: 0.875rem;
            margin: 0;
        }

        /* ACTIONS */
        .action-group {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        .btn-action {
            border: 1px solid var(--glass-border);
            background: transparent;
            border-radius: 2rem;
            padding: 0.4rem 1rem;
            font-size: 0.8rem;
            transition: 0.3s;
        }

        .btn-action.view {
            color: #60a5fa;
        }

        .btn-action.view:hover {
            background: #60a5fa;
            color: white;
        }

        .btn-action.delete {
            color: #ef4444;
        }

        .btn-action.delete:hover {
            background: #ef4444;
            color: white;
        }

        /* MODAL CUSTOM STYLING */
        .glass-modal .modal-content {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 1.25rem;
            color: var(--text-bright);
        }

        .modal-header-custom {
            padding: 1.5rem;
            border-bottom: 1px solid var(--glass-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-close-custom {
            background: none;
            border: none;
            color: var(--text-dim);
            font-size: 1.25rem;
        }

        .modal-body-custom {
            padding: 1.5rem;
        }

        .info-section {
            margin-bottom: 1.25rem;
        }

        .info-section label {
            display: block;
            color: var(--text-dim);
            font-size: 0.75rem;
            text-transform: uppercase;
            margin-bottom: 0.25rem;
        }

        .info-section p {
            margin: 0;
            font-size: 1rem;
        }

        .info-section p span {
            color: var(--text-dim);
            font-weight: normal;
        }

        .subject-text {
            color: #60a5fa;
            font-weight: 600;
        }

        .content-box {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 0.75rem;
            padding: 1rem;
            margin-top: 0.5rem;
            border: 1px solid var(--glass-border);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .modal-footer-custom {
            padding: 1rem 1.5rem 1.5rem;
            border: none;
            text-align: right;
        }

        .btn-modal-close {
            background: var(--glass-border);
            border: none;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            transition: 0.3s;
        }

        .btn-modal-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* PAGINATION */
        .pagination-container {
            padding: 1.5rem;
            display: flex;
            justify-content: center;
            border-top: 1px solid var(--glass-border);
        }
    </style>
</x-app-layout>
