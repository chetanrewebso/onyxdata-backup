<?php get_header(); ?>

<style>
    .webinar-container {
        display: flex;
        flex-wrap: wrap;
        max-width: 1000px;
        margin: auto;
        background: #fff;
        padding: 20px;
        padding-top: 75px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .webinar-sidebar {
        width: 30%;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
    }

    .webinar-info, .webinar-speakers {
        margin-bottom: 20px;
    }

    .webinar-speakers ul {
        list-style: none;
        padding: 0;
    }

    .webinar-speakers li {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .webinar-speakers img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .webinar-content {
        width: 70%;
        padding: 20px;
    }

    .webinar-description {
        font-size: 16px;
        line-height: 1.6;
    }

    .webinar-description ul {
        padding-left: 20px;
    }

    .webinar-info h3, .webinar-speakers h3 {
        font-size: 20px;
    }

    .webinar-info p {
        font-size: 16px;
    }

    /* ✅ Mobile Responsive: Sidebar content ke niche aayega */
    @media (max-width: 768px) {
        .webinar-container {
            flex-direction: column;
        }
        .webinar-sidebar, .webinar-content {
            width: 100%;
        }
        .webinar-content {
            padding-top: 20px;
        }
    }
</style>

<div class="webinar-container">
    <div class="webinar-sidebar">
        <div class="webinar-info">
            <h3>Date and time</h3>
            <p>📅 <?php echo get_field('webinar_date'); ?></p>
            <p>⏰ <?php echo get_field('webinar_time'); ?></p>
        </div>

        <div class="webinar-speakers">
            <h3>Speakers</h3>
            <?php if (have_rows('speakers')): ?>
                <ul>
                    <?php while (have_rows('speakers')): the_row(); ?>
                        <li>
                            <img src="<?php the_sub_field('speaker_image'); ?>" alt="<?php the_sub_field('speaker_name'); ?>">
                            <p><?php the_sub_field('speaker_name'); ?></p>
                            <span><?php the_sub_field('speaker_designation'); ?></span>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <div class="webinar-content">
        <div class="webinar-description">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
