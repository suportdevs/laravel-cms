
<div
class="bs-toast toast toast-placement-ex m-2"
role="alert"
aria-live="assertive"
aria-atomic="true"
data-bs-delay="2000">
    <div class="toast-header">
    <i class="bx "></i>
    <div class="me-auto fw-medium ui-toasts-header-text">Bootstrap</div>
    <small class="ui-toasts-header-time"></small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <div class="message">
            Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.
        </div>
        <div class="toast-message-list"></div>
    </div>
</div>
<script>
    (function () {
  'use strict';

  const toastPlacementExample = document.querySelector('.toast-placement-ex');
  const singleMessage = toastPlacementExample.querySelector('.toast-body .message');
  const toastHeader = toastPlacementExample.querySelector('.toast-header .ui-toasts-header-text');
  const toastHeaderIcon = toastPlacementExample.querySelector('.toast-header i.bx');
  const toastHeaderTime = toastPlacementExample.querySelector('.toast-header .ui-toasts-header-time');
  const toastMessageList = toastPlacementExample.querySelector('.toast-message-list'); // The div where error list will be appended

  let toastPlacement;

  function toastDispose(toast) {
    if (toast && toast._element !== null) {
      toastPlacementExample.classList.remove(...toastPlacementExample.classList);
      toast.dispose();
    }
  }

  // Check for toast session data
  @if (session()->has('toast'))
    const toastData = @json(session('toast'));

    // Update toast header text
    if (toastHeader) {
      toastHeader.textContent = toastData.header ?? 'Notification';
    }

    // Update toast header icon class
    if (toastHeaderIcon) {
      toastHeaderIcon.className = `bx ${toastData.icon ?? 'bx-bell'} me-2`;
    }

    // Update toast header time
    if (toastHeaderTime) {
      toastHeaderTime.textContent = toastData.time ?? 'Just now';
    }

    // Update toast body content
    if (singleMessage) {
      singleMessage.textContent = toastData.message ?? '';
    }

    // Add toast classes for type and placement
    toastPlacementExample.classList.add(toastData.type ?? 'bg-primary', ...toastData.placement.split(' '));

    // Show the toast
    toastPlacement = new bootstrap.Toast(toastPlacementExample);
    toastPlacement.show();
  @endif

  // Check if there are validation errors
  @if ($errors->any())
    // Clear previous errors
    toastMessageList.innerHTML = '';

    // Loop through each validation error and append it to the toast's error list
    @foreach ($errors->all() as $error)
      {
        const errorItem = document.createElement('li'); // Declare the errorItem in each iteration
        errorItem.textContent = "{{ $error }}";
        toastMessageList.appendChild(errorItem);
      }
    @endforeach

    // Update toast header and body for validation errors
    toastHeader.textContent = "Validation Errors";
    singleMessage.textContent = ""; // Clear body text since errors will be listed below
    toastPlacementExample.classList.add('bg-danger', 'top-0', 'end-0'); // Set the toast's background color and position

    // Show the toast
    toastPlacement = new bootstrap.Toast(toastPlacementExample);
    toastPlacement.show();
  @endif

})();
</script>
