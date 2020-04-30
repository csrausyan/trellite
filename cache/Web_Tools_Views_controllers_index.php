<?= $this->flashSession->output() ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    Controllers List<br />
                    <small>All controllers that we managed to find</small>
                </h3>
                <div class="card-tools">
                    <?= $this->tag->linkTo([$webtools_uri . '/controllers/generate', 'Generate', 'class' => 'btn btn-primary']) ?>
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
                    </tr><?php if (empty($controllers_dir)) { ?><tr class="warning">
                            <td colspan="5">
                                <p class="text-center">
                                    Sorry, Phalcon WebTools doesn't know where the controllers directory is.<br>
                                    Please add the valid path for <code>controllersDir</code>
                                    in the <code>application</code> section.
                                </p>
                            </td>
                        </tr><?php } else { ?><?php foreach ($controllers as $controller) { ?>
                            <tr>
                                <td><?= $controller->name ?>
                                    <?php if ($controller->is_writable == false) { ?><span class="label label-warning">ro</span><?php } ?></td>
                                <td><?= $controller->size . ' b' ?></td>
                                <td><?= $controller->owner ?></td>
                                <td><?= $controller->modified_time ?></td>
                                <td>
                                    <?= $this->tag->linkTo([$webtools_uri . '/controllers/edit/' . rawurlencode($controller->filename), '<i class="fas fa-pen-square"></i>', 'class' => 'btn btn-warning btn-sm']) ?>
                                </td>
                            </tr>
                        <?php } ?><?php } ?></table>
            </div>
        </div>
    </div>
</div>
