<?php
include('logincheck.php');
include('inc/header.php');
if(isset($_POST['submit'])){
    include('core/question.php');
    $question= new Question;
    $question->updateQuestion($_POST['title'], $_POST['details'], $_GET['q_id']);
}
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="title">Questions Title</label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        <div class="form-group mt-3">
                            <label for="details">Questions details</label>
                            <textarea class="form-control"  name="details" id="textarea" cols="30" rows="10"></textarea>
                        </div>
                        <input class="btn btn-primary mt-3" type="submit" name="submit" value="Add question">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
    selector: 'textarea'
    });
</script>
<?php
include('inc/footer.php');