<?php
$testimonials = TestimonialFactory::createTestimonialFromIni('ini/testimonials.ini');
?>
<div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider-nav">
                        <?php foreach ($testimonials as $testimonial): ?>
                            <div class="slider-nav">
                                <img src="<?php echo htmlspecialchars($testimonial->getImage()); ?>" alt="Testimonial">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider">
                        <?php foreach ($testimonials as $testimonial): ?>
                            <div class="slider-item">
                                <h3><?php echo htmlspecialchars($testimonial->getName()); ?></h3>
                                <h4><?php echo htmlspecialchars($testimonial->getProfession()); ?></h4>
                                <p><?php echo htmlspecialchars($testimonial->getFeedback()); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>