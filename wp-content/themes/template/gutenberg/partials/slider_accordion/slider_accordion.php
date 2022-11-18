<?php
$header   = get_field( 'blue_header' );
$subjects = get_field( 'heading' );

if ( ! $header ) {
	$header = '<h4>Indtast blå overskrift og emne samt tilhørende spørgsmål</h4>';
}
?>

<section class="sliderAccordion">
    <div class="container">
        <h3 class="header"><?= $header ?></h3>
        <div class="wrapper">
            <div class="swiper-pagination list"></div>
            <div class="swiper slider">
                <div class="swiper-wrapper slides">
					<?php
					if ( $subjects ) {
						$i = 1;

						foreach ( $subjects as $subject ) { ?>
                            <div data-index="0<?= $i ?>." data-title="<?= $subject['subject'] ?>" class="swiper-slide">
								<?php foreach ( $subject['questions'] as $question ) {
									?>
                                    <div class="single">
                                        <h5 class="question"><?= $question['header'] ?></h5>
                                        <div class="answercont">
                                            <div class="answer"><?= $question['answer'] ?></div>
											<?php if ( $question['if_table'] === 'table' ) {
												if ( ! empty ( $question['table'] ) ) { ?>
                                                    <div class="table">
														<?php foreach ( $question['table']['body'] as $tr ) { ?>
                                                            <div class="row">
																<?php foreach ( $tr as $td ) { ?>
                                                                    <div class="data"><?= nl2br($td['c']) ?></div>
																<?php } ?>
                                                            </div>
														<?php } ?>
                                                    </div>
												<?php }
											} ?>
                                        </div>
                                    </div>
								<?php } ?>
                            </div>

							<?php
							$i ++;
						}
					} ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let titles = document.querySelectorAll('.slider .swiper-slide');
    let title = [];
    let bulletIndex = [];
    titles.forEach(function (element) {
        title.push(element.dataset.title);
        bulletIndex.push(element.dataset.index);
    });

    var swiper = new Swiper(".slider", {
        slidesPerView: 1,
        allowTouchMove: false,
        loop: true,
        pagination: {
            el: ".swiper-pagination.list",
            clickable: true,
            renderBullet: function (index, className) {
                return '<div class="subjectTitle ' + className + '">' + '<p>' + bulletIndex[index] + '</p>' + '<h4>' + title[index] + '</h4>' + "</div>";
            },
        },
    });

    let question = document.querySelectorAll('.question');

    question.forEach(question => {
        question.addEventListener("click", event => {
            const active = document.querySelector(".question.active");
            if (active && active !== question) {
                active.classList.toggle("active");
                active.nextElementSibling.style.maxHeight = 0;
            }
            question.classList.toggle("active");
            const answer = question.nextElementSibling;
            if (question.classList.contains("active")) {
                answer.style.maxHeight = answer.scrollHeight + "px";
            } else {
                answer.style.maxHeight = 0;
            }
        })
    })
</script>