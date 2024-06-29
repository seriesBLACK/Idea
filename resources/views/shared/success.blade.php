<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Check if there's a popup message
      var popupMessage = document.getElementById('popup-message');

      if (popupMessage) {
          // Show the popup
          popupMessage.style.display = 'block';

          // Hide the popup after 2 seconds
          setTimeout(function() {
              popupMessage.style.display = 'none';
          }, 2000);
      }
  });
</script>

@if (session('flash'))
<div id="popup-message" class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('flash')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif