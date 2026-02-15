<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="fs-4 text-white mb-0">
                <i class="fa-solid fa-gauge-high me-2 text-primary"></i>{{ __('Admin Dashboard') }}
            </h2>
            <span class="badge rounded-pill bg-primary px-3 py-2">
                {{ $totalMessages ?? 0 }} Total Messages
            </span>
        </div>
    </x-slot>

    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="glass-card p-4 border border-white/10 rounded-4 mb-3"
                    style="background: rgba(255,255,255,0.03); backdrop-filter: blur(10px);">
                    <div class="d-flex align-items-center">
                        <div class="icon-box bg-primary/20 p-3 rounded-3 me-3">
                            <i class="fa-solid fa-envelope-open-text fs-3 text-primary"></i>
                        </div>
                        <div>
                            <p class="text-white-50 small mb-0">Inbound Messages</p>
                            <h3 class="text-white fw-bold mb-0">{{ $totalMessages ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-card border border-white/10 rounded-4 overflow-hidden"
            style="background: rgba(255,255,255,0.03); backdrop-filter: blur(10px);">
            <div class="p-4 border-b border-white/10 d-flex justify-content-between align-items-center">
                <h5 class="text-white mb-0"><i class="fa-solid fa-list me-2"></i>Recent Inquiries</h5>
                @if (session('status'))
                    <div class="alert alert-success py-1 px-3 mb-0 small animate__animated animate__fadeIn">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-white">
                    <thead style="background: rgba(255,255,255,0.05);">
                        <tr>
                            <th class="ps-4 border-0 text-white-50 small uppercase">Date</th>
                            <th class="border-0 text-white-50 small uppercase">Sender</th>
                            <th class="border-0 text-white-50 small uppercase">Subject</th>
                            <th class="border-0 text-white-50 small uppercase">Message</th>
                            <th class="pe-4 border-0 text-center text-white-50 small uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $msg)
                            <tr class="border-white/5">
                                <td class="ps-4 small text-white-50">
                                    {{ $msg->created_at->format('d M Y, H:i') }}
                                </td>
                                <td>
                                    <div class="fw-bold text-white">{{ $msg->name }}</div>
                                    <div class="small text-white-50">{{ $msg->email }}</div>
                                </td>
                                <td><span
                                        class="badge bg-dark border border-white/10 text-info">{{ $msg->subject }}</span>
                                </td>
                                <td class="small" style="max-width: 300px;">
                                    <p class="mb-0 text-truncate" title="{{ $msg->message }}">
                                        {{ $msg->message }}
                                    </p>
                                </td>
                                <td class="pe-4 text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3"
                                            data-bs-toggle="modal" data-bs-target="#msgModal{{ $msg->id }}">
                                            View
                                        </button>

                                        <form action="{{ route('contact.destroy', $msg->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus pesan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="msgModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-dark border border-white/20 text-white"
                                        style="backdrop-filter: blur(20px);">
                                        <div class="modal-header border-white/10">
                                            <h5 class="modal-title">Message Detail</h5>
                                            <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="text-white-50 small">From</label>
                                                <p class="fw-bold mb-0">{{ $msg->name }} ({{ $msg->email }})</p>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-white-50 small">Subject</label>
                                                <p class="fw-bold mb-0 text-info">{{ $msg->subject }}</p>
                                            </div>
                                            <hr class="border-white/10">
                                            <div>
                                                <label class="text-white-50 small">Message Content</label>
                                                <p class="lh-base">{{ $msg->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-white-50">
                                    <i class="fa-solid fa-inbox fs-1 mb-3 d-block opacity-25"></i>
                                    No messages found yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($messages->hasPages())
                <div class="p-4 border-t border-white/10 custom-pagination">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>

    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
            transition: all 0.2s ease;
        }

        .uppercase {
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .bg-primary\/20 {
            background-color: rgba(59, 130, 246, 0.2);
        }

        /* Custom Pagination Style */
        .custom-pagination nav {
            display: flex;
            justify-content: center;
        }

        .custom-pagination svg {
            width: 20px;
        }
    </style>
</x-app-layout>
