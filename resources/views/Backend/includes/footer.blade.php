<script src="{{asset('assets/Backend/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/Backend/js/feather.min.js')}}"></script>

<script src="{{asset('assets/Backend/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('assets/Backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/Backend/js/dataTables.bootstrap4.min.js')}}"></script>


<script src="{{asset('assets/Backend/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/Backend/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/Backend/plugins/toastr/toastr.js')}}"></script>

<script src="{{asset('assets/Backend/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/Backend/plugins/apexchart/chart-data.js')}}"></script>

<script src="{{asset('assets/Backend/plugins/fileupload/fileupload.min.js')}}"></script>

<script src="{{asset('assets/Backend/js/script.js')}}"></script>

<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif
</script>

