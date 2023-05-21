<!DOCTYPE html>
<html lang='en'>
    <head>
        <title><?= ucwords($DUMBDOG->page->name); ?> | <?= ucwords($DUMBDOG->site->name); ?></title>
        <link rel="icon" type="image/png" sizes="64x64" href="<?= $DUMBDOG->site->theme_folder; ?>/favicon.png">
        <link rel="stylesheet" type="text/css" href="<?= $DUMBDOG->site->theme . '?t=' . time(); ?>">
        <link rel="canonical" href="<?= (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . '/' . ltrim($DUMBDOG->page->url, '/');?>">
        <script src="/assets/jquery.min.js"></script>
        <meta name="description" content="<?= $DUMBDOG->page->meta_description ? str_replace(["\r", "\n", "\r\n"], " ", $DUMBDOG->page->meta_description) : $DUMBDOG->site->meta_description; ?>">
        <meta name="keywords" content="<?= $DUMBDOG->page->meta_keywords ? $DUMBDOG->page->meta_keywords : $DUMBDOG->site->meta_keywords; ?>">
        <meta name="author" content="<?= $DUMBDOG->page->meta_author ? $DUMBDOG->page->meta_author : $DUMBDOG->site->meta_author; ?>">
    </head>
    <body>
        <main>
            <header>
                <div id="header">
                    <nav>
                        <span class="nav-item">
                            <a href="/" title="Go to Home">
                                Home
                            </a>
                        </span>
                    </nav>
                </div>
            </header>