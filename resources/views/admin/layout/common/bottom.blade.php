<script src="//code.jquery.com/jquery.js"></script>
<script src="{{asset('/template/metronic/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('/template/metronic/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('/template/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('/template/metronic/assets/app/js/dashboard.js')}}" type="text/javascript"></script>
<script src="{{asset('/template/metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
<script>
    @if(session('success'))
        swal('{{ session('success') }}', '', 'success');
    @endif
    @if(session('error'))
    swal('{{ session('error') }}', '', 'error');
    @endif
</script>