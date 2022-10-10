<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
{{-- @dd('c'); --}}
      <div class="modal-content">
        @if(isset($form_action) && isset($form_method))
        <form class="needs-validation" action="{{ $form_action }}" method="post">
            @method( $form_method )
            @csrf
        @endif

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="modal-footer">
            @if(!isset($hide_confirm))
               <button class="btn btn-danger" type="submit">{{ isset($confirm_text) ? $confirm_text : "Conferma"}}</button>
            @endif
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
        </div>
        @if (isset($form_action) && isset($form_method))
        </form>
        @endif
      </div>
    </div>
  </div>
