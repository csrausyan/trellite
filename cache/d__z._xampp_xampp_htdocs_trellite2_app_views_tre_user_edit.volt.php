<!-- <?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?> -->

<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(["tre_user", "Back"]) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Edit tre_user</h1>
</div>

<?php echo $this->getContent(); ?>

<form action="<?php echo "/tre_user/save/" . $tre_note['note_id'] ?>" class="form-horizontal" method="post">
    <div class="form-group">
        <label for="name">Name</label>
            <?php echo $this->tag->textField([
                "note_description",
                "class" => "form-control",
                "placeholder"=> "Enter your note here"
            ]); ?>
    </div>

    <?php echo $this->tag->hiddenField("note_id") ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(["Save", "class" => "btn btn-default"]) ?>
        </div>
    </div>
</form>

<h2>Edit Tim</h2>
<hr>
<div class="container" width="10px">
<?= $this->tag->form(['tre_user/save/' . $tre_note->note_id, 'method' => 'post']) ?>
    
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <?= $this->tag->textArea(['deskripsi', 'class' => 'form-control', 'placeholder' => 'Masukkan deskripsi yang dibutuhkan', 'value' => $tims->deskripsi]) ?>
    </div>

    <div class="form-group">
        <?= $this->tag->submitButton(['Edit Tim', 'class' => 'btn btn-primary']) ?>
    </div>

<?= $this->tag->endForm() ?>
</div>