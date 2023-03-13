<?php
include('inc/header.php');
include('core/question.php');
if(isset($_GET['q_id']))
{
    $question = new Question;
    $getOneQuestion = $question->getOneQuestion($_GET['q_id']);
    if(count($getOneQuestion)==1)
    {
        $getOneQuestion = $getOneQuestion[0];
    }else
    {
        echo "<div class='container'>";
        echo 'sometihnk wrong';
        echo "</div class='container'>";
        exit;
    }
}else
{
    echo 'invalid request';
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h5>Question details</h5>
                    <h6><?=$getOneQuestion['title']?></h6>
                </div>
                <div class="card-body">
                    <p><?=$getOneQuestion['description']?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end Question details -->
    <?php
    $getAnswer = new Question;
    $getAnswer = $getAnswer->getAnswer($_GET['q_id']);
    foreach($getAnswer as $key=> $a){
    ?>
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-success" >Answer <?=++$key?></h5>
                </div>
                <div class="card-body">
                    <p><?=$a['details']?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end answer -->
    <?php
    }
    if(isset($_SESSION['username'])){?>
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h6>Add Answer</h6>
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $question = new Question();
                        $question_id = $_GET['q_id'];
                        $user_id = $_SESSION['ID'];
                        $answer_text = $_POST['answer'];
                        $success = $question->addAnswer($question_id, $user_id, $answer_text);
                        if ($success) {
                            echo "<p class='text-success'>Answer added successfully.</p>";
                        } else {
                            echo "Failed to add answer.";
                        }
                    }
                    ?>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group mt-3">
                            <textarea class="form-control"  name="answer" id="textarea" cols="30" rows="10"></textarea>
                        </div>
                        <input class="btn btn-primary mt-3" type="submit" name="submit" value="Add answer">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<!-- end add answer -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
    selector: 'textarea'
    });
</script>
<?php
include('inc/footer.php');