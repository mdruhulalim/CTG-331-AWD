<?php
// include('logincheck.php');
include('inc/header.php');
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <?php
            include('core/question.php');
            $question = new Question();
            $questions = $question->getAllQuestions();
            foreach($questions as $q) {
            ?><div class="card mb-3 p-3">
                <h3><a class="link-secondary text-decoration-none" href="#"><?=$q['title']?></a></h3>
                <small>Question by: <?=$q['username'];?> || Created: <?=date('d M, y',strtotime($q['created_at']))?></small>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');