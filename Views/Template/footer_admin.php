          <div class="bs-component ">
            <ol class="breadcrumb bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Derechos Reservados © <script> document.write(new Date().getFullYear()); </script> - UES FMP
                </span>
                <br>
                <span><b><a href="https://www.ues.edu.sv/" target="_blank">Universidad De El Salvador</a></b>
                </span>
              </div>
            </div>
            </ol>
          </div>
    
      </main>
   <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work-->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="<?= media(); ?>/js/plugins/jquery-3.5.1.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <script src="<?= media();?>/js/fontawesome.js"></script>
    <script src="<?= media(); ?>/js/functions_admin.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="<?= media(); ?>/js/plugins/sweetalert.min.js" aria-hidden="true"></script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media();?>/js/plugins/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?= media();?>/js/plugins/loader.js"></script>
    
    <script src="<?= media(); ?>/js/plugins/jquery.mask.js"></script>
    <script type="text/javascript" src="<?= media();?>/js/functions_admin.js"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
    <script src="<?= media(); ?>/js/plugins/jquery.maskedinput.js"></script>
  </body>
</html>