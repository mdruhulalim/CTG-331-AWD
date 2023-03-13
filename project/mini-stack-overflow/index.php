<?php
// include('logincheck.php');
include('inc/header.php');
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10">
            <?php
            include('core/question.php');
            $question = new Question();
            $questions = $question->getAllQuestions();
            // echo "<pre>";
            // print_r($questions);
            // echo "</pre>";
            foreach($questions as $q) {
                $link = "questiondetails.php?q_id=".$q['ID'];
                $linku = "updatequestion.php?q_id=".$q['ID'];
            ?>
            <div class="card mb-3 p-3">
                <div class="col-lg-8">
                    <h3><a class="link-secondary text-decoration-none" href="<?=$link?>"><?=$q['title']?></a></h3>
                    <small>Question by: <?=$q['username'];?> || Created: <?=date('d M, y',strtotime($q['created_at']))?></small>
                </div>
                <?php
                if(isset($_SESSION['ID']) && $q['user_id'] == $_SESSION['ID']){
                ?>
                <div class="col-lg-4">
                    <a class="text-decoration-none text-success" href="<?=$linku?>">Edite</a>
                    <a class="text-decoration-none text-danger" href="">Delete</a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');