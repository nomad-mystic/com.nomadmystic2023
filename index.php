<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Ubuntu&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>


<?php

$google_analytics_tag = 'G-EC8J6TE56P'; // Default not production

if (!empty($_SERVER) && !empty($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'nomadmystic.com') {
    $google_analytics_tag = 'G-T307SL3RSD';
}

?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $google_analytics_tag; ?>"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    const googleTag = "<?php echo $google_analytics_tag; ?>";

    gtag('config', googleTag);
</script>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action('get_header'); ?>

<div id="app">
    <page>
        <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </page>
</div>

<?php do_action('get_footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
