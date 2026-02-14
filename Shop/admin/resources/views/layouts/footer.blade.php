      <!--begin::Footer-->
      <footer class="app-footer">
          <!--begin::To the end-->
          <div class="float-end d-none d-sm-inline"></div>
          <!--end::To the end-->
          <!--begin::Copyright-->
          <strong>
              Copyright &copy; {{ date('Y') }}
              <a href="#" class="text-decoration-none"></a>.
          </strong>
          All rights reserved.
          <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
      </div>
      <!--end::App Wrapper-->
      <!--begin::Script-->
      <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
      <!--begin::Third Party Plugin(OverlayScrollbars)-->
      <script src="{{ asset('backend/plugins/overlayscrollbars/overlayscrollbars.browser.es6.min.js') }}"></script>
      <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
      <script src="{{ asset('backend/plugins/bootstrap/popper.min.js') }}"></script>
      <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
      <script src="{{ asset('backend/plugins/bootstrap/bootstrap.min.js') }}"></script>
      <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
      <script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
      <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->

      {{-- Select 2 --}}
      <script src="{{ asset('backend/plugins/select2/dist/js/select2.js') }}"></script>
      <script>
          const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
          const Default = {
              scrollbarTheme: 'os-theme-light',
              scrollbarAutoHide: 'leave',
              scrollbarClickScroll: true,
          };
          document.addEventListener('DOMContentLoaded', function() {
              const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
              if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
                  OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                      scrollbars: {
                          theme: Default.scrollbarTheme,
                          autoHide: Default.scrollbarAutoHide,
                          clickScroll: Default.scrollbarClickScroll,
                      },
                  });
              }
          });
      </script>
      <!--end::OverlayScrollbars Configure-->
      <!-- OPTIONAL SCRIPTS -->
      <!-- sortablejs -->
      <script src="{{ asset('backend/plugins/Sortable/Sortable.min.js') }}"></script>
      <!-- sortablejs -->

      <!-- apexcharts -->
      <script src="{{ asset('backend/plugins/apexcharts/apexcharts.min.js') }}"></script>

      <!-- jsvectormap -->
      <script src="{{ asset('backend/plugins/jsvectormap/jsvectormap.min.js') }}"></script>
      <script src="{{ asset('backend/plugins/jsvectormap/world.js') }}"></script>
      <!-- jsvectormap -->

      @include('admin::layouts.script')
   
      @stack('script')

      </body>
      <!--end::Body-->

      </html>
