<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog {{ $size ?? '' }}">
        <div class="modal-content">

            <form action="{{ $action }}" method="POST">
                @csrf
                @if(isset($method))
                    @method($method)
                @endif

                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    {{ $slot }}
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Annuler
                    </button>

                    <button type="submit" class="btn btn-primary">
                        {{ $confirm ?? 'Valider' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
