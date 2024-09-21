<section class="hero <?= is_front_page() ? 'hero--full' : 'hero--half' ?>">
    <div class="hero__container">
        <?php if(is_front_page()) : ?>
            <h1 class="hero__heading"><?php bloginfo('name'); ?></h1>
            <p class="hero__tagline"><?php bloginfo('description'); ?></p>
        <?php else : ?>
            <h1 class="hero__heading"><?php the_title(); ?></h1>
        <?php endif; ?>
    </div>
</section>