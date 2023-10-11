<header class="Header">
    <section class="flex justify-around items-center h-full">
        <a class="Header-logo" href="<?php echo e(home_url('/')); ?>">
            <img src="<?= \Roots\asset('images/nav-logo-dark.png'); ?>">
        </a>

        <?php if(has_nav_menu('primary_navigation')): ?>
            <nav class="nav-primary Header-navigation" aria-label="<?php echo e(wp_get_nav_menu_name('primary_navigation')); ?>">
                <?php echo wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'nav flex',
                        'echo' => false
                    ]
                  ); ?>

            </nav>
        <?php endif; ?>
    </section>
</header>
<?php /**PATH /Users/keith/Sites/com.nomadmystic2023/wp-content/themes/nomad-mystic/resources/views/sections/header.blade.php ENDPATH**/ ?>