
<div align="center" id="modalSupp" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        <p>Voulez-vous vraiment supprimer ce genre ?</p>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-primary" id="supp">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne pas supprimer</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<script type="text/javascript">

document.querySelectorAll('a[data-supp]').forEach(link => {
    link.addEventListener('click', function(){
        const lien = this.getAttribute('data-supp');
        const message = this.getAttribute('data-message');
        document.getElementById('supp').href = lien;
        document.getElementById('modal-body').innerHTML = message;
    });
});

</script>
</body>
</html> 