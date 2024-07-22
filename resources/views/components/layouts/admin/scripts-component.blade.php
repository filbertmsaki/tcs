 <!-- base js -->
 <script src="{{ asset('assets/js/app.js') }}"></script>
 <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
 <!-- end base js -->
 <!-- plugin js -->
 <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
 <!-- end plugin js -->


 <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- plugin js -->
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <!-- end plugin js -->
 <!-- common js -->
 <script src="{{ asset('assets/js/template.js') }}"></script>
 <!-- end common js -->
 <script src="{{ asset('assets/js/dashboard.js') }}"></script>
 <script>
     $(document).ready(function() {

         $('.modal').on('hidden.bs.modal', function() {
             var form = $(this).find('form')[0];
             $(form).trigger("reset");
         });

     });
 </script>
 <!--app JS-->
 @stack('scripts')
