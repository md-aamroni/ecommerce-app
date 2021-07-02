$(document).ready(function () {
	// Datatable Init
	$(".datatable").DataTable({
		responsive: true
	});

	var table = $('#datatable-buttons').DataTable({
		lengthChange: false,
		responsive: true,
		buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
	});
	table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});
