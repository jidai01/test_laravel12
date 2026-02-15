<x-app-layout>
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
            --primary-glow: #3b82f6;
            --accent-color: #60a5fa;
            --danger-color: #ef4444;
            --text-dim: rgba(248, 250, 252, 0.5);
            --text-bright: #f8fafc;
            --bg-dark: #0f172a;
        }

        /* Container Smoothness */
        .dashboard-wrapper {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Glass Header & Stats */
        .header-title {
            font-weight: 700;
            letter-spacing: -0.025em;
            color: var(--text-bright);
        }

        .stats-badge {
            background: rgba(59, 130, 246, 0.2);
            color: var(--accent-color);
            border: 1px solid rgba(59, 130, 246, 0.3);
            padding: 0.5rem 1rem;
            font-weight: 600;
        }

        .glass-stat-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            padding: 1.5rem;
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .glass-stat-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-glow);
        }

        .stat-icon-wrapper {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(37, 99, 235, 0.1));
            color: var(--accent-color);
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            margin-right: 1.25rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .stat-label {
            color: var(--text-dim);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-value {
            color: var(--text-bright);
            font-size: 1.75rem;
            font-weight: 800;
            margin: 0;
        }

        /* Main Table Card */
        .glass-data-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .card-header-custom {
            padding: 1.5rem 2rem;
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid var(--glass-border);
        }

        .card-title-text {
            font-weight: 700;
            color: var(--text-bright);
        }

        /* Table Styling */
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .data-table thead {
            background: rgba(0, 0, 0, 0.2);
        }

        .data-table th {
            padding: 1rem 1.5rem;
            text-transform: uppercase;
            font-size: 0.75rem;
            color: var(--text-dim);
            letter-spacing: 0.1em;
            font-weight: 600;
        }

        .data-row {
            transition: all 0.2s;
            border-bottom: 1px solid var(--glass-border);
        }

        .data-row:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .data-table td {
            padding: 1.25rem 1.5rem;
            vertical-align: middle;
        }

        .sender-name {
            font-weight: 600;
            color: var(--text-bright);
        }

        .sender-email {
            color: var(--text-dim);
            font-size: 0.85rem;
        }

        .preview-text {
            color: var(--text-dim);
            font-size: 0.9rem;
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin: 0;
        }

        /* Buttons & Actions */
        .action-group {
            display: flex;
            gap: 0.75rem;
        }

        .btn-action {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.75rem;
            transition: all 0.2s;
            border: 1px solid var(--glass-border);
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-bright);
        }

        .btn-action.view:hover {
            background: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
        }

        .btn-action.delete:hover {
            background: var(--danger-color);
            color: white;
            border-color: var(--danger-color);
        }

        /* Modal Beauty */
        .glass-modal .modal-content {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(25px);
            border: 1px solid var(--glass-border);
            border-radius: 1.5rem;
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
            transition: 0.3s;
        }

        .btn-close-custom:hover {
            color: white;
            transform: rotate(90deg);
        }

        .content-box {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 1rem;
            padding: 1.25rem;
            border: 1px solid var(--glass-border);
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Alert Custom */
        .alert-custom-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #10b981;
            border-radius: 0.75rem;
            padding: 0.5rem 1rem;
        }

        /* Responsiveness Fixes */
        @media (max-width: 768px) {
            .data-table thead {
                display: none;
            }

            .data-row {
                display: block;
                padding: 1.5rem;
                position: relative;
            }

            .data-table td {
                display: block;
                padding: 0.25rem 0 !important;
                width: 100%;
            }

            .cell-actions {
                position: absolute;
                top: 1.5rem;
                right: 1.5rem;
                width: auto !important;
            }

            .preview-text {
                max-width: 100%;
                white-space: normal;
                margin-top: 1rem;
            }

            .cell-date {
                font-size: 0.8rem;
                color: var(--accent-color);
                margin-bottom: 0.5rem;
            }
        }
    </style>

    <x-slot name="header">
        <div
            class="header-container d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3">
            <h2 class="header-title mb-0">
                <i class="fa-solid fa-solar-panel me-2 text-primary"></i>{{ __('Admin Dashboard') }}
            </h2>
            <span class="badge rounded-pill stats-badge px-3 py-2">
                <i class="fa-solid fa-circle-info me-1"></i> {{ $totalMessages ?? 0 }} Total Messages
            </span>
        </div>
    </x-slot>

    <div class="dashboard-wrapper container-fluid py-4">
        <div class="row g-4 mb-5">
            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                <div class="glass-stat-card">
                    <div class="stat-icon-wrapper">
                        <i class="fa-solid fa-paper-plane fs-4"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-label">Messages</span>
                        <h3 class="stat-value">{{ $totalMessages ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-data-card">
            <div
                class="card-header-custom d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                <h5 class="card-title-text mb-0">
                    <i class="fa-solid fa-receipt me-2 text-primary"></i>Recent Inquiries
                </h5>
                @if (session('status'))
                    <div class="alert alert-custom-success animate__animated animate__fadeIn mb-0">
                        <i class="fa-solid fa-check-circle me-1"></i> {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Received Date</th>
                            <th>Sender Information</th>
                            <th class="d-none d-lg-table-cell">Message Preview</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $msg)
                            <tr class="data-row">
                                <td class="cell-date">
                                    <i class="fa-regular fa-calendar-check me-1 d-lg-none"></i>
                                    {{ $msg->created_at->format('d M Y') }}
                                    <span
                                        class="text-dim d-block d-lg-inline ms-lg-2 small">{{ $msg->created_at->format('H:i') }}</span>
                                </td>
                                <td class="cell-sender">
                                    <div class="sender-name">{{ $msg->name }}</div>
                                    <div class="sender-email text-truncate">{{ $msg->email }}</div>
                                </td>
                                <td class="cell-preview d-none d-lg-table-cell">
                                    <p class="preview-text">{{ $msg->message }}</p>
                                </td>
                                <td class="cell-actions">
                                    <div class="action-group justify-content-end">
                                        <button class="btn-action view" title="View Message" data-bs-toggle="modal"
                                            data-bs-target="#msgModal{{ $msg->id }}">
                                            <i class="fa-solid fa-expand"></i>
                                        </button>
                                        <form action="{{ route('contact.destroy', $msg->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus pesan permanen?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-action delete" title="Delete">
                                                <i class="fa-solid fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fa-solid fa-folder-open fs-1 text-dim mb-3"></i>
                                        <p class="text-dim">Your inbox is currently empty.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($messages->hasPages())
                <div class="pagination-container p-4 d-flex justify-content-center border-top border-white-5">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>

    @foreach ($messages as $msg)
        <div class="modal fade glass-modal" id="msgModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header-custom">
                        <h5 class="modal-title fw-bold text-white">Message Inquiry</h5>
                        <button type="button" class="btn-close-custom" data-bs-dismiss="modal"><i
                                class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-4">
                            <label class="text-dim small text-uppercase fw-bold mb-1">From</label>
                            <h6 class="text-white mb-0">{{ $msg->name }}</h6>
                            <span class="text-primary small">{{ $msg->email }}</span>
                        </div>
                        <div class="mb-4">
                            <label class="text-dim small text-uppercase fw-bold mb-2">Message</label>
                            <div class="content-box">
                                {{ $msg->message }}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label class="text-dim small text-uppercase fw-bold mb-0 d-block">Received On</label>
                                <span class="small text-white">{{ $msg->created_at->format('l, d F Y') }}</span>
                            </div>
                            <span
                                class="badge bg-dark border border-secondary">{{ $msg->created_at->format('H:i') }}</span>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-4 pt-0">
                        <button type="button" class="btn btn-secondary w-100 rounded-3 py-2"
                            data-bs-dismiss="modal">Close Inquiry</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
