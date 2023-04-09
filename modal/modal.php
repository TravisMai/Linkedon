<div id="Modal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel"></h5>
        <button type="button" class="btn btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div class="container text-center">
      <div>
        <p class="my-3 text-center" id="Message"></p>
      </div>
    </div>
  </div>
</div>

<script>
        // Get the modal
        var modal = document.getElementById("Modal");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // Get the error message from the URL query string (if present)
        // If there is an error message, display it in the modal
        if (<?php echo isset($_SESSION['message']) ? 1 : 0 ?>) {
            document.getElementById("Message").innerHTML =
                "<?php
                echo (isset($_SESSION['message']) ? $_SESSION['message'] : '') . ' ' . (isset($_SESSION['username']) ? $_SESSION['username'] : '');
                ?>";    
            document.getElementById("ModalLabel").innerHTML = "<?php echo (isset($_SESSION['label']) ? $_SESSION['label'] : ''); ?>";
            modal.style.display = "block";
            <?php
            unset($_SESSION["message"]);
            unset($_SESSION["label"]);
            ?>
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
</script>