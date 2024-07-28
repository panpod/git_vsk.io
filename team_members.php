<?php
$iniArray = parse_ini_file('ini/team_members.ini', true);

$teamMembers = [];

foreach ($iniArray as $section => $data) {
    $teamMembers[] = TeamMemberFactory::createTeamMember(
        $data['name'],
        $data['title'],
        $data['image_url'],
        [
            'twitter' => $data['twitter'],
            'facebook' => $data['facebook'],
            'linkedin' => $data['linkedin'],
            'instagram' => $data['instagram']
        ]
    );
}

?>


    <div class="container">
        <div class="section-header text-center">
            <p>Our Team</p>
            <h2>Meet Our Engineer</h2>
        </div>
        <div class="row">
            <?php foreach ($teamMembers as $teamMember): ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="<?php echo htmlspecialchars($teamMember->getImageUrl()); ?>" alt="Team Image">
                        </div>
                        <div class="team-text">
                            <h2><?php echo htmlspecialchars($teamMember->getName()); ?></h2>
                            <p><?php echo htmlspecialchars($teamMember->getTitle()); ?></p>
                        </div>
                        <div class="team-social">
                            <?php foreach ($teamMember->getSocialLinks() as $platform => $link): ?>
                                <?php if (!empty($link)): ?>
                                    <a class="social-<?php echo htmlspecialchars($platform); ?>" href="<?php echo htmlspecialchars($link); ?>">
                                        <i class="fab fa-<?php echo htmlspecialchars($platform); ?>"></i>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
