<?php
$questions = get_field('questions');
$text = get_field('heading');

if ($is_preview) {
    if (!$text) {
        $text = '<h2>Tilføj spørgsmål i højre side</h2>';
    }
    if (!$questions) {
        $questions = array(
            [
                'question' => 'Tekst baseret spørgsmål',
                'video' => 'https://vimeo.com/manage/videos/87110435',
                'contenttype' => 'text',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tellus justo, efficitur non ex et, feugiat euismod est. Cras non nibh malesuada, vestibulum nisl sit amet, ullamcorper ante'
            ],
            [
                'question' => 'Video baseret spørgsmål',
                'video' => 'https://vimeo.com/manage/videos/87110435',
                'contenttype' => 'video',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tellus justo, efficitur non ex et, feugiat euismod est. Cras non nibh malesuada, vestibulum nisl sit amet, ullamcorper ante'
            ],
        );
    }
}

?>

<section class="accordian">
    <div class="container">

        <div class="header">
            <?= $text ?>
        </div>
        <div class="questions">
            <?php foreach ($questions

                           as $q) { ?>
                <div class="single">
                    <div class="question">
                        <?= $q['question'] ?: 'Indtast spørgsmål' ?>
                    </div>
                    <div class="answercont">
                        <div class="answer">
                            <?php if ($q['contenttype'] === 'video') {


                                $offset = stripos($q['video'], 'https://vimeo.com/manage/videos/');
                                $offset += strlen('https://vimeo.com/manage/videos/');
                                $videoID = substr($q['video'], $offset);
                                ?>
                                <div style="padding:0;position:relative;">
                                    <iframe src="https://player.vimeo.com/video/<?= $videoID ?>?h=79c9884f1a&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                            allowfullscreen
                                            style="min-height: 250px;margin: 0;"
                                            title="Bev&amp;aelig;gelighed Instruktion2342"></iframe>
                                </div>
                                <script src="https://player.vimeo.com/api/player.js"></script>

                            <?php } ?>
                            <span class="text">
                        <?= $q['answer']; ?>
                    </span>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<script>
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