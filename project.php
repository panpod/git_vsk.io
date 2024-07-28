<?php
// Ensure the ProjectData instance is properly initialized
$projectData = ProjectData::getInstance();

// Get random projects; handle cases with fewer projects
$randomProjects = $projectData->getRandomProjects(3);
?>
<div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <h2>Projects We're Proud Of</h2>
        </div>
        <div class="row">
            <?php if (!empty($randomProjects)) { ?>
                <?php foreach ($randomProjects as $project) { ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="<?= htmlspecialchars($project['img'], ENT_QUOTES, 'UTF-8') ?>" alt="Image">
                            </div>
                            <div class="blog-title">
                                <h3><?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                                <a class="btn" href="#">+</a>
                            </div>
                            <!-- Optional meta section (commented out in your example) -->
                            <!-- <div class="blog-meta">
                                <p>By<a href="#">Admin</a></p>
                                <p>In<a href="#">Construction</a></p>
                            </div> -->
                            <div class="blog-text">
                                <p><?= htmlspecialchars($project['summary'], ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>No projects available.</p>
            <?php } ?>
        </div>
    </div>
</div>