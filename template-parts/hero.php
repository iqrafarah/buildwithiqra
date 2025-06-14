<?php

$hero_group = get_field('hero_group', get_the_ID());

?>
<section id="hero" class="container">
    <h1>
        Freelance web developer & <span class="designer">Designer</span>
    </h1>
    <?php if (!empty($hero_group['description'])): ?>
        <p class="paragraph">
            <?php echo esc_html($hero_group['description']); ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($hero_group['button_group']['button_text'])): ?>
        <a href="<?php echo esc_url($hero_group['button_group']['button_link']); ?>" class="btn btn-primary">
            <span>
                <?php echo esc_html($hero_group['button_group']['button_text']); ?>
            </span>
        </a>
    <?php endif; ?>
</section>