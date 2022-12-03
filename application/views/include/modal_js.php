<script>
	$(function() {
		
		$(function () {
          $('#formEditUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var display_name = button.data('display_name'); // Extract info from data-* attributes
            var username = button.data('username');
            var email = button.data('email');
            var role = button.data('role');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('#id').val(id);
            modal.find('#display_name').val(display_name);
            modal.find('#username').val(username);
            modal.find('#email').val(email);
            modal.find('#role').val(role);
          });
        });

        $(function () {
          $('#formEditMLO').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var nama = button.data('nama'); // Extract info from data-* attributes
            var alamat = button.data('alamat');
            var telp = button.data('telp');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.id').val(id);
            modal.find('.nama').val(nama);
            modal.find('.alamat').val(alamat);
            modal.find('.telp').val(telp);
          });
        });

        $(function () {
          $('#formEditEMKL').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var nama = button.data('nama'); // Extract info from data-* attributes
            var alamat = button.data('alamat');
            var telp = button.data('telp');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.id').val(id);
            modal.find('.nama').val(nama);
            modal.find('.alamat').val(alamat);
            modal.find('.telp').val(telp);
          });
        });

        $(function () {
          $('#formEditVessel').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var nama = button.data('nama'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.id').val(id);
            modal.find('.nama').val(nama);
          });
        });

	});
</script>