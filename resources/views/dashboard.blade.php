<x-app-layout>
    <x-slot name="header">
        <div
            class="header-container d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2">
            <h2 class="header-title mb-0">
                <i class="fa-solid fa-gauge-high me-2 text-primary"></i>{{ __('Admin Dashboard') }}
            </h2>
            <span class="badge rounded-pill stats-badge">
                {{ $totalMessages ?? 0 }} Total Messages
            </span>
        </div>
    </x-slot>

    <div class="dashboard-wrapper container-fluid py-3 py-md-4">
        <div class="row mb-4">
            <div class="col-12 col-sm-6 col-md-4">
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
            <div
                class="card-header-custom d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                <h5 class="card-title-text"><i class="fa-solid fa-list me-2"></i>Recent Inquiries</h5>
                @if (session('status'))
                    <div class="alert alert-custom-success animate__animated animate__fadeIn mb-0 w-100 w-md-auto">
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
                            <th class="col-message d-none d-lg-table-cell">Message Preview</th>
                            <th class="col-actions text-end text-md-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $msg)
                            <tr class="data-row">
                                <td class="cell-date">
                                    <span class="d-lg-none text-dim small d-block">Date:</span>
                                    {{ $msg->created_at->format('d M y, H:i') }}
                                </td>
                                <td class="cell-sender">
                                    <span class="d-lg-none text-dim small d-block">From:</span>
                                    <div class="sender-name">{{ $msg->name }}</div>
                                    <div class="sender-email text-truncate" style="max-width: 150px;">
                                        {{ $msg->email }}</div>
                                </td>
                                <td class="cell-preview d-none d-lg-table-cell">
                                    <p class="preview-text">{{ $msg->message }}</p>
                                </td>
                                <td class="cell-actions text-end text-md-center">
                                    <div class="action-group justify-content-end justify-content-md-center">
                                        <button class="btn-action view" data-bs-toggle="modal"
                                            data-bs-target="#msgModal{{ $msg->id }}">
                                            <i class="fa-solid fa-eye"></i> <span
                                                class="d-none d-sm-inline ms-1">View</span>
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
                                <td colspan="4" class="empty-state text-center py-5">
                                    <div class="empty-content text-dim">
                                        <i class="fa-solid fa-inbox fs-1 mb-2"></i>
                                        <p>No messages found yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($messages->hasPages())
                <div class="pagination-container px-3">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>

    @foreach ($messages as $msg)
        <div class="modal fade glass-modal" id="msgModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header-custom">
                        <h5 class="modal-title"><i class="fa-solid fa-envelope me-2"></i>Details</h5>
                        <button type="button" class="btn-close-custom" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body-custom">
                        <div class="info-section">
                            <label>From</label>
                            <p class="text-break">{{ $msg->name }} <br><span
                                    class="small text-primary">{{ $msg->email }}</span></p>
                        </div>
                        <div class="info-section divider">
                            <label>Message Content</label>
                            <div class="content-box">
                                {{ $msg->message }}
                            </div>
                        </div>
                        <div class="info-section mt-3">
                            <label>Received At</label>
                            <p class="timestamp small">{{ $msg->created_at->format('l, d F Y - H:i') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer-custom">
                        <button type="button" class="btn-modal-close w-100 w-sm-auto"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <style>
        /* ... CSS SEBELUMNYA ... */

        /* MOBILE OPTIMIZATIONS */
        @media (max-width: 768px) {
            .dashboard-wrapper {
                padding: 1rem 0.5rem;
            }

            .header-title {
                font-size: 1.1rem;
            }

            .glass-stat-card {
                padding: 1rem;
            }

            .stat-icon-wrapper {
                padding: 0.75rem;
                margin-right: 0.75rem;
            }

            .data-table thead {
                display: none;
            }

            /* Sembunyikan header tabel di mobile */

            .data-row {
                display: flex;
                flex-wrap: wrap;
                padding: 1rem 0.5rem;
                border-bottom: 2px solid var(--glass-border);
            }

            .data-table td {
                display: block;
                width: 100%;
                padding: 0.4rem 0.5rem !important;
                border: none;
            }

            .cell-date {
                order: 1;
                width: 50% !important;
                font-size: 0.8rem;
            }

            .cell-actions {
                order: 2;
                width: 50% !important;
            }

            .cell-sender {
                order: 3;
                width: 100% !important;
                margin-top: 0.5rem;
            }

            .sender-email {
                max-width: 100% !important;
            }

            .modal-fullscreen-sm-down .modal-content {
                border-radius: 0;
                min-height: 100vh;
            }
        }

        /* Utility Helper */
        .text-dim {
            color: var(--text-dim);
        }

        .text-break {
            word-break: break-all;
        }
    </style>
</x-app-layout>
