<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script>
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable({
                "order": [[ 0, "desc" ]],
                responsive : true
                // "columnDefs" : [
                //     {
                //         "targets" : [0],
                //         "visible" : false
                //     }
                // ]
            });
        });
</script>