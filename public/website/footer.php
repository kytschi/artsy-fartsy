            <footer>
                <div class="row">
                    <div class="col">
                        <p>
                            &copy; <?= date('Y'); ?> Artsy-Fartsy. All Rights Reserved.<br>
                            powered by <a href="https://github.com/kytschi/dumb-dog" target="_blank">dumb dog</a>
                        </p>
                    </div>
                    <div class="col">
                        <div class="float-right">
                            <p>
                                <a href="/sitemap">Sitemap</a>
                                <a href="/privacy">Privacy</a>
                                <?php
                                foreach ($DUMBDOG->menu->footer as $item) {
                                    ?>
                                    <a href="<?= $item->url; ?>" title="<?= $item->name; ?>">
                                        <?= $item->name; ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </body>
    <script type="text/javascript">
        $(function() {
            
        });
    </script>
</html>