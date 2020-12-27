<!-- <div class="mplayer">
    <div id="jp_container_N" class="bg-dark">
        <div class="jp-type-playlist">
            <div id="jplayer_N" class="jp-jplayer hide"></div>
            <div class="jp-gui">
                <div class="jp-interface">
                    <div class="jp-controls">
                        <div><a class="jp-previous"><i class="fa fa-step-backward"></i></a></div>
                        <div>
                            <a class="jp-play"><i class="fa fa-play-circle fa-2x"></i></a>
                            <a class="jp-pause"><i class="fa fa-pause-circle fa-2x"></i></a>
                        </div>
                        <div><a class="jp-next"><i class="fa fa-step-forward"></i></a></div>
                        <div class="jp-progress hidden-xs">
                            <div class="jp-seek-bar">
                                <div class="jp-play-bar play-progress">
                                </div>
                                <div class="jp-current-time current-time text-white"></div>
                                <div class="jp-title text-white">
                                    <ul>
                                        <li></li>
                                    </ul>
                                </div>
                                <div class="jp-duration duration text-white"></div>
                            </div>
                        </div>
                        <div class="hidden-xs hidden-sm">
                            <a class="jp-mute" title="mute"><i class="fa fa-volume-up"></i></a>
                            <a class="jp-unmute" title="unmute"><i class="fa fa-volume-off"></i></a>
                        </div>
                        <div class="jp-volume hidden-xs hidden-sm">
                            <div class="jp-volume-bar bg-muted">
                                <div class="jp-volume-bar-value"></div>
                            </div>
                        </div>
                        <div><a class="" data-toggle="dropdown" data-target="#playlist"><i class="fa fa-bars"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="jp-playlist dropup" id="playlist">
                <ul class="dropdown-menu bg-inverse m-b-0">
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="jp-no-solution hide">
                <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
            </div>
        </div>
    </div>
</div> -->
        <footer class="footer">
            © 2020 Technomancy by <a href="https://technomancy.in">Technomancy</a>
        </footer>
    </div>
    <script src="<?php echo base_url('assets/admin/');?>dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url('assets/admin/');?>dist/js/waves.js"></script>
    <script src="<?php echo base_url('assets/admin/');?>dist/js/sidebarmenu.js"></script>
    
<script type="text/javascript" src="<?php echo base_url('assets/admin/');?>dist/js/jPlayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/');?>dist/js/jPlayer/add-on/jplayer.playlist.min.js"></script>
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