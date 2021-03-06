<?= $this->flashSession->output() ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    Models List
                    <br/>
                    <small>All models that we managed to find</small>
                </h3>
                <div class="card-tools">
                    <?= $this->tag->linkTo([$webtools_uri . '/models/generate', 'Generate', 'class' => 'btn btn-primary pull-right']) ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Owner</th>
                        <th>Last modified</th>
                        <th width="10%">Actions</th>
                    </tr><?php if (empty($models_dir)) { ?><tr class="warning">
                            <td colspan="5">
                                <p class="text-center">
                                    Sorry, Phalcon WebTools doesn't know where the models directory is.<br>
                                    Please add the valid path for <code>modelsDir</code>
                                    in the <code>application</code> section.
                                </p>
                            </td>
                        </tr><?php } else { ?><?php foreach ($models as $model) { ?>
                            <tr>
                                <td><?= $model->name ?>
                                    <?php if ($model->is_writable == false) { ?><span class="label label-warning">ro</span><?php } ?></td>
                                <td><?= $model->size . ' b' ?></td>
                                <td><?= $model->owner ?></td>
                                <td><?= $model->modified_time ?></td>
                                <td>
                                    <?= $this->tag->linkTo([$webtools_uri . '//models/edit/' . rawurlencode($model->filename), '<i class="fas fa-pen-square"></i>', 'class' => 'btn btn-warning btn-sm']) ?>
                                </td>
                            </tr>
                        <?php } ?><?php } ?></table>
            </div>
        </div>
    </div>
</div>
