<?php
// Path to the INI file
$iniFilePath = 'ini/faq.ini';

// Create FAQs using the factory
$faqs = FAQFactory::createFAQsFromIni($iniFilePath);
?>
<div class="container">
            <div class="section-header text-center">
                <p>Frequently Asked Question</p>
                <h2>You May Ask</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="accordion-1">
                        <?php $delay = 0.1; ?>
                        <?php foreach (array_slice($faqs, 0, 5) as $faq): ?>
                            <div class="card wow fadeInLeft" data-wow-delay="<?php echo $delay; ?>s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#<?php echo htmlspecialchars($faq->getId()); ?>">
                                        <?php echo htmlspecialchars($faq->getQuestion()); ?>
                                    </a>
                                </div>
                                <div id="<?php echo htmlspecialchars($faq->getId()); ?>" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        <?php echo htmlspecialchars($faq->getAnswer()); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $delay += 0.1; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="accordion-2">
                        <?php $delay = 0.1; ?>
                        <?php foreach (array_slice($faqs, 5) as $faq): ?>
                            <div class="card wow fadeInRight" data-wow-delay="<?php echo $delay; ?>s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#<?php echo htmlspecialchars($faq->getId()); ?>">
                                        <?php echo htmlspecialchars($faq->getQuestion()); ?>
                                    </a>
                                </div>
                                <div id="<?php echo htmlspecialchars($faq->getId()); ?>" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        <?php echo htmlspecialchars($faq->getAnswer()); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $delay += 0.1; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>