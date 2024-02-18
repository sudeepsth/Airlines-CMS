
<script type="text/javascript" src="{{ asset('cms/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('cms/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('cms/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('cms/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('cms/js/bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('cms/js/adminlte.min.js') }}"></script>
<script>
     $(function () {
        //Initialize Select2 Elements
    $('.select2').select2();
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

     });
</script>
</body>
</html>
