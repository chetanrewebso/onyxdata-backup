<?php 
/**
 * Template Name: LEADERBOARD PAGE V2 
 */
get_header();
get_template_part('template-parts/header_v1');

$banner_image = get_field('banner_image');
$banner_heading = get_field('banner_heading');
$heading = get_field('heading');
?>
<style>
.leaderboard .player .avatar {
    width: 50px;
    height: 50px;
    background-size: cover;
    background-position: center;
    border-radius: 50%;
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
}
.leaderboard .player-info {
    display: flex;
    align-items: center;
}
.rank-1 { color: #FFD700; font-weight: bold; } /* Gold */
.rank-2 { color: #C0C0C0; font-weight: bold; } /* Silver */
.rank-3 { color: #CD7F32; font-weight: bold; } /* Bronze */
.player {
    display: grid;
    grid-template-columns: 0.5fr 2fr 1fr 1fr;
}
.leaderboard-header {   display: grid;
    grid-template-columns: 0.5fr 2fr 1fr 1fr;}
    
.name {
    color: #000;
}
.name:hover{color:#3b3737;}
.pagination{padding: 8px 0px;}
</style>
<!-- header end -->
<!-- header end -->
<section class="leaderboard-section" style="background-image:linear-gradient(to bottom, rgb(0 0 0 / 62%) 0%, rgb(0 0 0 / 78%) 100%), url(<?php echo esc_url($banner_image);?>);">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="leader-content">
                    <h2><?php echo esc_html($banner_heading); ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="lead-board mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h1><?php echo esc_html($heading ?: 'Challenge Leaderboard'); ?></h1>
                </div>
            </div>
        </div>
      



<div class="leaderboard mb-5">
    <div class="leaderboard-header">
        <div>Rank</div>
        <div>Contestant</div>
        <div>Points</div>
        <div>Wins</div>
    </div>

    <div id="leaderboard-content">
        <?php
        global $wpdb;

        // Step 1: Pull raw meta values in 1 query
        $raw_meta = $wpdb->get_results("
            SELECT user_id, meta_key, meta_value
            FROM {$wpdb->usermeta}
            WHERE meta_key IN ('datadna_total_points', 'datadna_participant_points')
        ");

        // Step 2: Group into map
        $points_map = [];
        foreach ($raw_meta as $row) {
            $user_id = $row->user_id;
            $key = $row->meta_key;
            $value = (int) $row->meta_value;

            if (!isset($points_map[$user_id])) {
                $points_map[$user_id] = [
                    'user_id' => $user_id,
                    'total' => 0,
                    'participant' => 0,
                ];
            }

            if ($key === 'datadna_total_points') {
                $points_map[$user_id]['total'] = $value;
            }

            if ($key === 'datadna_participant_points') {
                $points_map[$user_id]['participant'] = $value;
            }
        }

        // Step 3: Combine + filter
        $leaderboard = [];
        foreach ($points_map as $data) {
            $combined = $data['total'] + $data['participant'];
            if ($combined > 0) {
                $data['points'] = $combined;
                $leaderboard[] = $data;
            }
        }

        // Step 4: Sort by combined points desc
        usort($leaderboard, function ($a, $b) {
            return $b['points'] <=> $a['points'];
        });

        // Step 5: Limit to top 25
        $top_users = array_slice($leaderboard, 0, 25);

        // Step 6: Render HTML
        if (!empty($top_users)) {
            foreach ($top_users as $index => $user) {
                $rank = $index + 1;
                $user_id = $user['user_id'];
                $user_data = get_userdata($user_id);
                $user_name = $user_data ? $user_data->display_name : 'Unknown';
                $avatar = get_avatar_url($user_id, ['size' => 50]);

                // Profile URL
                $profile_url = 'https://datadna.onyxdata.co.uk/profile/?uwp_profile=' . urlencode(basename(uwp_build_profile_tab_url($user_id)));

                // Count "Winner" badges
                $badges = get_user_meta($user_id, 'datadna_user_badges', true) ?: [];
                $wins = array_count_values(array_values($badges))['Winner'] ?? 0;
                ?>
                <div class="player">
                    <div class="rank <?php echo $rank <= 3 ? 'rank-' . $rank : ''; ?>">
                        <?php echo $rank; ?>
                    </div>
                    <a href="<?php echo esc_url($profile_url); ?>" class="player-info" target="_blank" rel="noopener">
                        <div class="avatar" style="background-image: url(<?php echo esc_url($avatar); ?>);"></div>
                        <div class="name"><?php echo esc_html($user_name); ?></div>
                    </a>
                    <div class="points"><?php echo number_format($user['points']); ?></div>
                    <div class="wins"><?php echo esc_html($wins); ?></div>
                </div>
                <?php
            }
        } else {
            echo '<p>No leaderboard data available yet.</p>';
        }
        ?>
    </div>

  
    <div class="row mt-3">
        <div class="col-12">
            <nav aria-label="Leaderboard pagination">
                <ul class="pagination justify-content-center" id="leaderboard-pagination">
                   
                </ul>
            </nav>
        </div>
    </div>

    <div id="ajax-leaderboard-rows"></div>
    <div id="portfolio-loader" style="display: none;">
        <img decoding="async" src="https://datadna.onyxdata.co.uk/wp-content/themes/onyxdata-child/custom-function/images/Loading-icon-unscreen.gif" alt="Loading..." width="50">
    </div>
</div>



    </div>
</section>
 -->
<section class="lead-board mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h1><?php echo esc_html($heading ?: 'Challenge Leaderboard'); ?></h1>
                </div>
            </div>
        </div>

        <div class="leaderboard mb-5">
            <div class="leaderboard-header">
                <div>Rank</div>
                <div>Contestant</div>
                <div>Points</div>
                <div>Wins</div>
            </div>
<p class="total-users">Total Users: <?php echo esc_html(count($leaderboard)); ?></p>
            <div id="leaderboard-content">

                <?php
                global $wpdb;

                // Step 1: Pull raw meta values in 1 query
                $raw_meta = $wpdb->get_results("
                    SELECT user_id, meta_key, meta_value
                    FROM {$wpdb->usermeta}
                    WHERE meta_key IN ('datadna_total_points', 'datadna_participant_points')
                ");

                // Step 2: Group into map
                $points_map = [];
                foreach ($raw_meta as $row) {
                    $user_id = $row->user_id;
                    $key = $row->meta_key;
                    $value = (int) $row->meta_value;

                    if (!isset($points_map[$user_id])) {
                        $points_map[$user_id] = [
                            'user_id' => $user_id,
                            'total' => 0,
                            'participant' => 0,
                            'display_name' => get_userdata($user_id) ? get_userdata($user_id)->display_name : 'Unknown'
                        ];
                    }

                    if ($key === 'datadna_total_points') {
                        $points_map[$user_id]['total'] = $value;
                    }

                    if ($key === 'datadna_participant_points') {
                        $points_map[$user_id]['participant'] = $value;
                    }
                }

                // Step 3: Combine + filter
                $leaderboard = [];
                foreach ($points_map as $data) {
                    $combined = $data['total'] + $data['participant'];
                    if ($combined > 0) {
                        $data['points'] = $combined;
                        $leaderboard[] = $data;
                    }
                }

                // Step 4: Sort by points DESC, display_name ASC
                usort($leaderboard, function ($a, $b) {
                    if ($a['points'] !== $b['points']) {
                        return $b['points'] <=> $a['points']; // Points DESC
                    }
                    return strcmp($a['display_name'], $b['display_name']); // Name ASC
                });

                // Step 5: Limit to top 25
                $top_users = array_slice($leaderboard, 0, 25);

                // Step 6: Render HTML
                if (!empty($top_users)) {
                    foreach ($top_users as $index => $user) {
                        $rank = $index + 1;
                        $user_id = $user['user_id'];
                        $user_data = get_userdata($user_id);
                        $user_name = $user_data ? $user_data->display_name : 'Unknown';
                        $avatar = get_avatar_url($user_id, ['size' => 50]);

                        // Profile URL
                        $profile_url = 'https://datadna.onyxdata.co.uk/profile/?uwp_profile=' . urlencode(basename(uwp_build_profile_tab_url($user_id)));

                        // Count "Winner" badges
                        $badges = get_user_meta($user_id, 'datadna_user_badges', true) ?: [];
                        $wins = array_count_values(array_values($badges))['Winner'] ?? 0;
                        ?>
                        <div class="player">
                            <div class="rank <?php echo $rank <= 3 ? 'rank-' . $rank : ''; ?>">
                                <?php //echo $rank == 1 ? '🥇' : ($rank == 2 ? '🥈' : ($rank == 3 ? '🥉' : $rank)); ?>
                                <?php echo $rank ?>
                            </div>
                            <a href="<?php echo esc_url($profile_url); ?>" class="player-info" target="_blank" rel="noopener">
                                <div class="avatar" style="background-image: url(<?php echo esc_url($avatar); ?>);"></div>
                                <div class="name"><?php echo esc_html($user_name); ?></div>
                            </a>
                            <div class="points"><?php echo number_format($user['points']); ?></div>
                            <div class="wins"><?php echo esc_html($wins); ?></div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>No leaderboard data available yet.</p>';
                }
                ?>
            </div>

            <!-- Pagination -->
            <div class="row mt-3">
    <div class="col-12">
        <nav aria-label="Leaderboard pagination">
            <ul class="pagination justify-content-center" id="leaderboard-pagination">
                <?php
                // Initial pagination
                $per_page = 25;
                $total_pages = ceil(count($leaderboard) / $per_page);
                if ($total_pages > 1) {
                    echo '<li class="page-item disabled"><a href="#" class="page-link" data-page="0">« Prev</a></li>';
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active = $i === 1 ? ' active' : '';
                        echo '<li class="page-item' . $active . '"><a href="#" class="page-link" data-page="' . $i . '">' . $i . '</a></li>';
                    }
                    echo '<li class="page-item"><a href="#" class="page-link" data-page="2">Next »</a></li>';
                } else {
                    echo '<li class="page-item"><span class="page-link">No more pages</span></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

            <div id="portfolio-loader" style="display: none;text-align: center;">
                <img decoding="async" src="https://datadna.onyxdata.co.uk/wp-content/themes/onyxdata-child/custom-function/images/Loading-icon-unscreen.gif" alt="Loading..." width="100">
            </div>
        </div>
    </div>
</section>

<?php $badge_base_path = get_stylesheet_directory_uri() . '/custom-function/images/'; ?>

<style>
  .leaderboard-container {
    max-width: 960px;
    margin: 3rem auto;
    padding: 1rem;
    font-family: Arial, sans-serif;
    color: #333;
  }

  .leaderboard-container h2 {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 2rem;
  }

  .score-section {
    background: #f9f9f9;
    padding: 1.5rem 2rem;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    margin-bottom: 2.5rem;
  }

  .score-section h3,
  .certificate-section h3 {
    font-size: 1.5rem;
    margin-bottom: 1.2rem;
    display: flex;
    align-items: center;
  }

  .score-section h3 img,
  .certificate-section h3 img {
    height: 70px;
    margin-right: 8px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  table th,
  table td {
    padding: 0.75rem;
    text-align: left;
  }

  table th {
    font-weight: 600;
    background: #eaeaea;
  }

  table td img {
    height: 70px;
    vertical-align: middle;
    margin-right: 8px;
  }

  .certificate-section .card {
    background: #fff;
    border-left: 5px solid;
    border-radius: 8px;
    padding: 1rem 1.25rem;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
  }

  .certificate-section .card h4 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
  }

  .certificate-section .card h4 img {
    height: 70px;
    margin-right: 8px;
  }

  .certificate-section .card p {
    margin: 0;
  }

  .certificate-section .grid-section {
    display: grid;
    gap: 1.5rem;
  }

  .card.creative { border-color: #6c63ff; }
  .card.story { border-color: #f39c12; }
  .card.problem { border-color: #27ae60; }
  .card.accessibility { border-color: #e74c3c; }
  table tr:first-child td{
    height: auto;
    border-left: 0.5pt solid #ffbb09;
    background: #ffbb09;
    border-top: 0.5pt solid #ffbb09;
    color: #333333;
    font-weight: 500;}

table tr td:first-child {display: flex;align-items: center;width: 100%;margin: 0;}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #ffbb09;
    border-color: #ffbb09;
}
.page-link:focus {
color:#ffbb09;
}
a.page-link {color: #ffbb09;}
a.page-link:hover{color: #cda6428c;}


  @media (max-width: 768px) {
    table td img {
    height: 50px;
    }
    .score-section{padding:0px;}
     .leaderboard-container {
    margin: 0px auto;
    padding: 1rem;
  }


table tr td:nth-child(2) {
    width: 20%;
}

table tr td:first-child img {
    object-fit: contain;
}
.leaderboard {
    overflow-x: initial;
    }

}

</style>

<section class="leaderboard-container">
  <h2>Leaderboard Scoring & Certificate Criteria</h2>

  <!-- Scoring Table -->
  <div class="score-section">
    <h3><img src="<?php echo $badge_base_path . 'Participant-Icon.png'; ?>" alt="How Points Are Scored"> How Points Are Scored</h3>
    <table>
      <thead>
        <tr>
          <th>Award Category</th>
          <th style="text-align: right;">Points</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img src="<?php echo $badge_base_path . 'Winner-Icon.png'; ?>" alt="Winner"> Winner</td>
          <td style="text-align: right;">100</td>
        </tr>
        <tr>
          <td><img src="<?php echo $badge_base_path . 'RunnerUp-Icon.png'; ?>" alt="Runner Up"> Runner Up</td>
          <td style="text-align: right;">50</td>
        </tr>
        <tr>
          <td><img src="<?php echo $badge_base_path . 'ZoomCharts-Mini-Challenge-Winner-Icon.png'; ?>" alt="ZoomCharts Mini Challenge Winner"> ZoomCharts Mini Challenge - Winner</td>
          <td style="text-align: right;">100</td>
        </tr>
        <tr>
          <td><img src="<?php echo $badge_base_path . 'ZoomCharts-Top5.png'; ?>" alt="ZoomCharts Top 5"> ZoomCharts Mini Challenge - Top 5</td>
          <td style="text-align: right;">50</td>
        </tr>
        <tr>
          <td><img src="<?php echo $badge_base_path . 'TheCreativeHead-Icon.png'; ?>" alt="The Creative Head"> The Creative Head</td>
          <td style="text-align: right;">30</td>
        </tr>
        <tr>
          <td><img src="<?php echo $badge_base_path . 'Thestoryteller-Icon.png'; ?>" alt="The Storyteller"> The Storyteller</td>
          <td style="text-align: right;">30</td>
        </tr>
        <tr>
          <td><img src="<?php echo $badge_base_path . 'TheProblemSolver.png'; ?>" alt="The Problem Solver"> The Problem Solver</td>
          <td style="text-align: right;">30</td>
        </tr>
        <tr>
          <td><img src="<?php echo $badge_base_path . 'The-Accessibility-Icon.png'; ?>" alt="The Accessibility"> The Accessibility</td>
          <td style="text-align: right;">30</td>
        </tr>
         <tr>
          <td><img src="<?php echo $badge_base_path . 'Participant-Icon.png'; ?>" alt="The Participant"> The Participant</td>
          <td style="text-align: right;">10</td>
        </tr>
      </tbody>
    </table>
    <p style="margin-top: 1rem; font-size: 0.95rem; color: #555;">Points contribute to your total standing on the <strong>DataDNA global leaderboard</strong>.</p>
  </div>

  <!-- Certificate Criteria -->
  <div class="certificate-section">
    <h3><img src="<?php echo $badge_base_path . 'Participant-Icon.png'; ?>" alt="Certificate"> Certificate Award Criteria</h3>

    <div class="grid-section">
      <div class="card creative">
        <h4><img src="<?php echo $badge_base_path . 'TheCreativeHead-Icon.png'; ?>" alt="Creative Head"> The Creative Head</h4>
        <p>Awarded for the most visually creative and innovative dashboard. Judges look for originality, aesthetics, and the use of advanced design techniques that enhance the user experience.</p>
      </div>

      <div class="card story">
        <h4><img src="<?php echo $badge_base_path . 'Thestoryteller-Icon.png'; ?>" alt="Storyteller"> The Storyteller</h4>
        <p>Awarded for crafting a compelling narrative with data. This goes to the entry that clearly communicates insights with a clear story arc, flow, and purpose.</p>
      </div>

      <div class="card problem">
        <h4><img src="<?php echo $badge_base_path . 'TheProblemSolver.png'; ?>" alt="Problem Solver"> The Problem Solver</h4>
        <p>Awarded for analytical depth and meaningful insights. Entries should show excellent data wrangling, complex problem-solving, and actionable recommendations.</p>
      </div>

      <div class="card accessibility">
        <h4><img src="<?php echo $badge_base_path . 'The-Accessibility-Icon.png'; ?>" alt="Accessibility"> The Accessibility</h4>
        <p>Awarded for designing with inclusivity in mind. Dashboards must be accessible to all users, using readable fonts, high contrast, descriptive labels, and screen reader compatibility.</p>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>



<script>
jQuery(document).ready(function ($) {
    let currentPage = 1; 

    function loadMoreLeaderboard(page) {
        $('#portfolio-loader').show();
        console.log('Loading page:', page); // Debug: Check page number

        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                action: 'load_leaderboard_page',
                page: page
            },
            success: function (res) {
                $('#portfolio-loader').hide();
             
                if (res.success && res.data && res.data.html) {
                    $('#leaderboard-content').html(res.data.html);
                    $('#leaderboard-pagination').html(res.data.pagination || '<li class="page-item"><span class="page-link">No more pages</span></li>');
                    $('html, body').animate({ scrollTop: $('.lead-board').offset().top }, 500); // Scroll to top
                } else {
                    $('#leaderboard-content').html('<p>No more users to display.</p>');
                    $('#leaderboard-pagination').html('<li class="page-item"><span class="page-link">No more pages</span></li>');
                }
                currentPage = page;
            },
            error: function (xhr, status, error) {
                $('#portfolio-loader').hide();
                console.error('AJAX error:', status, error); // Debug: Log error
                $('#leaderboard-content').html('<p>Error loading leaderboard data.</p>');
                $('#leaderboard-pagination').html('<li class="page-item"><span class="page-link">Error</span></li>');
            }
        });
    }

    // Pagination click
    $(document).on('click', '#leaderboard-pagination .page-link', function (e) {
        e.preventDefault();
        const page = parseInt($(this).data('page'));
        console.log('Clicked page:', page); // Debug: Check clicked page
        if (page && page !== currentPage) {
            loadMoreLeaderboard(page);
        }
    });
});
</script>