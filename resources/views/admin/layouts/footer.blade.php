<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
      <div
        class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
        <div class="text-body">
            @if(isset($settings->general['copy_right']))
                {{$settings->general['copy_right']}}
            @else
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
            @endif
          <a href="https://github.com/suportdevs" target="_blank" class="footer-link">Md. Mamunur Rashid</a>
        </div>
        <div class="d-none d-lg-inline-block">
          <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
          <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

          <a
            href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
            target="_blank"
            class="footer-link me-4"
            >Documentation</a
          >

          <a
            href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
            target="_blank"
            class="footer-link"
            >Support</a
          >
        </div>
      </div>
    </div>
  </footer>
