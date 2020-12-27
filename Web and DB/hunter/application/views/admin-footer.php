
        <footer class="footer">
            © 2020 Technomancy by <a href="https://technomancy.in">Technomancy</a>
        </footer>
    </div>
    <script src="<?php echo base_url('assets/admin/');?>dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url('assets/admin/');?>dist/js/waves.js"></script>
    <script src="<?php echo base_url('assets/admin/');?>dist/js/sidebarmenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin/');?>dist/js/jPlayer/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin/');?>dist/js/jPlayer/add-on/jplayer.playlist.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin/');?>dist/js/jPlayer/init.js"></script>
    <script src="<?php echo base_url('assets/admin/');?>dist/js/custom.min.js"></script>

    <script src="<?php echo base_url('assets/admin/');?>assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin/');?>assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript">
         $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
    </script>
</body>

</html>