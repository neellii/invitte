<style>
  .alert-error {
    text-align: center;
    width: 100%;
    height: 100%;
    background-color: #fff;
    padding: 10px;
    z-index: 500;
    animation-name: fadeOut;
    animation-delay: 4s;
    animation-duration: 1s;
    animation-fill-mode: forwards;
    color: #c12324;
  }

  @keyframes fadeOut {
    from {opacity: 1; z-index: 500;}
    to {opacity: 0; z-index: -10;}
  }
</style>

<div class="alert-error">
  <?= $_SESSION['error'] ?>
</div>